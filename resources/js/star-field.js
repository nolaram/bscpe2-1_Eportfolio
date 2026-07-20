/**
 * Auth header star field
 * -----------------------------------------------------------------------
 * Purely decorative canvas animation: small dots drift slowly, and any
 * two dots close enough together get a thin connecting line drawn
 * between them — a constellation look.
 *
 * Does nothing on pages without a [data-star-field] canvas.
 */

function initStarField() {
    const canvas = document.querySelector('[data-star-field]');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');

    const STAR_COUNT_DENSITY = 14000; // lower number = more stars
    const MAX_STARS = 45;             // hard cap even on very wide headers
    const MAX_LINE_DISTANCE = 90;     // px — stars closer than this get connected
    const STAR_SPEED = 0.15;          // px per frame — kept slow for a calm drift

    let stars = [];
    let width = 0;
    let height = 0;

    function resize() {
        // Read the canvas's current on-page size fresh every time this
        // runs — never cache it — so a stale early measurement can't
        // permanently lock the canvas to the wrong size.
        const rect = canvas.getBoundingClientRect();
        const dpr = window.devicePixelRatio || 1;

        width = rect.width;
        height = rect.height;

        // Only the bitmap resolution is set here, for crisp rendering on
        // high-DPI screens. The element's on-page box size is controlled
        // purely by CSS (absolute inset-0 in the Blade file) — this way
        // there's no inline style fighting with it.
        canvas.width = width * dpr;
        canvas.height = height * dpr;
        ctx.setTransform(dpr, 0, 0, dpr, 0, 0);

        createStars();
    }

    function createStars() {
        const count = Math.min(
            MAX_STARS,
            Math.max(18, Math.floor((width * height) / STAR_COUNT_DENSITY))
        );

        stars = Array.from({ length: count }, () => ({
            x: Math.random() * width,
            y: Math.random() * height,
            vx: (Math.random() - 0.5) * STAR_SPEED,
            vy: (Math.random() - 0.5) * STAR_SPEED,
            radius: Math.random() * 1.2 + 0.8,
        }));
    }

    function step() {
        ctx.clearRect(0, 0, width, height);

        // Move each star, gently bouncing off the header's edges so they
        // stay within view instead of drifting off and disappearing.
        stars.forEach((star) => {
            star.x += star.vx;
            star.y += star.vy;

            if (star.x <= 0 || star.x >= width) star.vx *= -1;
            if (star.y <= 0 || star.y >= height) star.vy *= -1;
        });

        // Connecting lines are drawn first so the dots sit on top of them.
        // Most pairs are farther apart than MAX_LINE_DISTANCE at any given
        // moment, so only occasional nearby pairs light up — not a
        // constant all-connected mesh.
        for (let i = 0; i < stars.length; i++) {
            for (let j = i + 1; j < stars.length; j++) {
                const dx = stars[i].x - stars[j].x;
                const dy = stars[i].y - stars[j].y;
                const distance = Math.sqrt(dx * dx + dy * dy);

                if (distance < MAX_LINE_DISTANCE) {
                    const opacity = 1 - distance / MAX_LINE_DISTANCE;
                    ctx.strokeStyle = `rgba(255, 199, 44, ${opacity * 0.5})`;
                    ctx.lineWidth = 1;
                    ctx.beginPath();
                    ctx.moveTo(stars[i].x, stars[i].y);
                    ctx.lineTo(stars[j].x, stars[j].y);
                    ctx.stroke();
                }
            }
        }

        stars.forEach((star) => {
            ctx.beginPath();
            ctx.arc(star.x, star.y, star.radius, 0, Math.PI * 2);
            ctx.fillStyle = 'rgba(255, 255, 255, 0.85)';
            ctx.fill();
        });

        requestAnimationFrame(step);
    }

    resize();
    step();

    // ResizeObserver reacts to ANY size change of the canvas itself —
    // window resizes, but also things a window-resize listener would
    // miss, like a web font swapping in and nudging the header's height.
    new ResizeObserver(resize).observe(canvas);
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initStarField);
} else {
    initStarField();
}
