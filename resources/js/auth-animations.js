/**
 * Auth page animations (login, register, etc.)
 * -----------------------------------------------------------------------
 * Purely presentational / additive script. It does not touch routing,
 * validation, or any Laravel auth logic.
 *
 * Safe to import globally: every selector is scoped and the script
 * simply does nothing on pages that don't contain these elements.
 */

import { gsap } from 'gsap';

function initAuthEntrance() {
    const header = document.querySelector('[data-auth-header]');
    const card = document.querySelector('[data-auth-card]');
    if (!header || !card) return; // not an auth page

    const logo = header.querySelector('[data-auth-logo]');
    const headings = header.querySelectorAll('[data-auth-heading]');
    const fields = card.querySelectorAll('[data-auth-field]');

    const timeline = gsap.timeline({ defaults: { ease: 'power2.out' } });

    if (logo) {
        timeline.from(logo, { y: -16, opacity: 0, duration: 0.6 });
    }

    if (headings.length) {
        timeline.from(
            headings,
            { y: 12, opacity: 0, duration: 0.5, stagger: 0.08 },
            '-=0.3'
        );
    }

    timeline.from(card, { y: 20, opacity: 0, duration: 0.6 }, '-=0.2');

    if (fields.length) {
        timeline.from(
            fields,
            { y: 10, opacity: 0, duration: 0.4, stagger: 0.07 },
            '-=0.3'
        );
    }
}

// Small burst of dots that spreads out from the login button on click.
// The colors alternate between the two brand colors for a bit of variety.
function spawnBurst(button) {
    const colors = ['#FFC72C', '#800000'];
    const dotCount = 10;
    const originX = button.clientWidth / 2;
    const originY = button.clientHeight / 2;

    for (let i = 0; i < dotCount; i++) {
        const dot = document.createElement('span');
        dot.className = 'login-burst-dot';
        dot.style.backgroundColor = colors[i % colors.length];
        button.appendChild(dot);

        const angle = (Math.PI * 2 * i) / dotCount;
        const distance = 46 + Math.random() * 18;

        gsap.set(dot, { x: originX, y: originY, opacity: 1, scale: 0 });

        gsap.to(dot, {
            x: originX + Math.cos(angle) * distance,
            y: originY + Math.sin(angle) * distance,
            scale: 1,
            opacity: 0,
            duration: 0.55,
            ease: 'power2.out',
            onComplete: () => dot.remove(),
        });
    }
}

function initLoginBurst() {
    const form = document.querySelector('[data-login-form]');
    const button = document.querySelector('[data-login-button]');
    if (!form || !button) return; // not the login page

    let hasPlayed = false;

    button.addEventListener('click', (event) => {
        // If required fields are empty/invalid, let the browser show its
        // normal validation message immediately — no burst, no delay.
        if (!form.checkValidity()) return;

        if (hasPlayed) return; // let the real, delayed submit go through
        event.preventDefault();
        hasPlayed = true;

        spawnBurst(button);

        // Give the burst a moment to be visible before the real submit —
        // same route, same validation, just ~280ms later.
        window.setTimeout(() => {
            if (form.requestSubmit) {
                form.requestSubmit(button);
            } else {
                form.submit();
            }
        }, 280);
    });
}

function initAuthAnimations() {
    initAuthEntrance();
    initLoginBurst();
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initAuthAnimations);
} else {
    initAuthAnimations();
}
