/**
 * Admin Dashboard animations
 * -----------------------------------------------------------------------
 * Purely presentational / additive script. It does not touch routing,
 * data, or any Laravel logic — it only toggles CSS classes / uses GSAP
 * so elements fade/slide into view as the page loads and as the user
 * scrolls, and so the feature cards stack on top of each other like
 * GitHub's homepage does.
 *
 * Safe to import globally: every selector is scoped and the script
 * simply does nothing on pages that don't contain these elements.
 */

import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

function initStatCardEntrance() {
    const cards = document.querySelectorAll('[data-animate="stat-card"]');
    if (!cards.length) return;

    cards.forEach((card, index) => {
        // Staggered entrance: each card appears ~90ms after the previous one.
        card.style.transitionDelay = `${index * 90}ms`;

        // Defer to the next frame so the initial "hidden" state paints first,
        // which lets the CSS transition actually animate.
        requestAnimationFrame(() => {
            requestAnimationFrame(() => {
                card.classList.remove('opacity-0', 'translate-y-6');
                card.classList.add('opacity-100', 'translate-y-0');
            });
        });
    });
}

function initRevealOnScroll() {
    const cards = document.querySelectorAll('[data-animate="reveal-card"]');
    if (!cards.length) return;

    const activate = (card) => {
        card.classList.remove('opacity-0', 'translate-y-10');
        card.classList.add('opacity-100', 'translate-y-0');
    };

    if (!('IntersectionObserver' in window)) {
        // Fallback for very old browsers: just show everything.
        cards.forEach(activate);
        return;
    }

    const observer = new IntersectionObserver(
        (entries, obs) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    activate(entry.target);
                    // Each card only needs to animate in once.
                    obs.unobserve(entry.target);
                }
            });
        },
        {
            threshold: 0.15,
            rootMargin: '0px 0px -10% 0px',
        }
    );

    cards.forEach((card) => observer.observe(card));
}

function initCardStack() {
    const cards = gsap.utils.toArray('[data-animate="reveal-card"]');
    if (cards.length < 2) return; // nothing to stack

    // Later cards get a higher z-index so they visually sit
    // on top of earlier ones once they start overlapping.
    cards.forEach((card, index) => {
        card.style.zIndex = index + 1;
    });

    // Pin every card except the last one to the top of the viewport.
    // As the user keeps scrolling, the next card slides up and covers it —
    // this is the GitHub-style stacking effect from the video.
    //
    // NOTE: if your layout has a fixed/sticky navbar, cards will pin
    // flush at the very top and slide under it. If that happens, change
    // 'top top' to something like 'top top+=64' (64 = navbar height in px).
    cards.slice(0, -1).forEach((card) => {
        ScrollTrigger.create({
            trigger: card,
            start: 'top top',
            endTrigger: cards[cards.length - 1],
            end: 'top top',
            pin: true,
            pinSpacing: false,
        });
    });
}

function initDashboardAnimations() {
    initStatCardEntrance();
    initRevealOnScroll();
    initCardStack();
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initDashboardAnimations);
} else {
    initDashboardAnimations();
}

// Recalculate pin positions once all images/fonts have fully loaded,
// so the stack trigger points line up with the final page layout.
window.addEventListener('load', () => ScrollTrigger.refresh());