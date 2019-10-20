import lax from 'lax.js';

window.onload = function() {
    lax.setup();

    const updateLax = () => {
        lax.update(window.scrollY);
        window.requestAnimationFrame(updateLax);
    }

    window.requestAnimationFrame(updateLax);
}