
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

function initStatCardEntrance() {
    const cards = document.querySelectorAll('[data-animate="stat-card"]');
    if (!cards.length) return;

    cards.forEach((card, index) => {

        card.style.transitionDelay = `${index * 90}ms`;

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

        card.addEventListener(
            'transitionend',
            () => {
                card.classList.remove('transition-all', 'duration-1000', 'ease-out');
                ScrollTrigger.refresh();
            },
            { once: true }
        );
    };

    if (!('IntersectionObserver' in window)) {

        cards.forEach(activate);
        return;
    }

    const observer = new IntersectionObserver(
        (entries, obs) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    activate(entry.target);

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

    cards.forEach((card, index) => {
        card.style.zIndex = index + 1;
    });

    cards.slice(0, -1).forEach((card) => {
        ScrollTrigger.create({
            trigger: card,
            start: 'top top',
            endTrigger: cards[cards.length - 1],
            end: 'top top',
            pin: true,
            pinSpacing: false,

            anticipatePin: 1,
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

window.addEventListener('load', () => ScrollTrigger.refresh());