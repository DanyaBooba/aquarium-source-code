const drawer = document.getElementById('drawer');
let startY = 0;
let startTime = 0;

drawer.addEventListener('touchstart', (e) => {
    startY = e.touches[0].clientY;
    startTime = Date.now();
});

drawer.addEventListener('touchmove', (e) => {
    const currentY = e.touches[0].clientY;
    const deltaY = currentY - startY;

    if (deltaY < 0) {
        // Swiping up
        drawer.style.transform = `translateY(${deltaY}px)`;
    } else if (deltaY > 0) {
        // Swiping down
        drawer.style.transform = `translateY(${deltaY}px)`;
    }
});

drawer.addEventListener('touchend', (e) => {
    const endY = e.changedTouches[0].clientY;
    const deltaY = endY - startY;
    const deltaTime = Date.now() - startTime;

    const swipeDistanceThreshold = 100; // Minimum distance to consider it a swipe
    const swipeSpeedThreshold = 0.3; // Minimum speed to consider it a swipe

    const swipeDistance = Math.abs(deltaY);
    const swipeSpeed = swipeDistance / deltaTime;

    if (swipeDistance > swipeDistanceThreshold && swipeSpeed > swipeSpeedThreshold) {
        if (deltaY < 0) {
            // Swiped up
            drawer.classList.add('fullscreen');
            drawer.classList.add('open');
        } else {
            // Swiped down
            drawer.classList.remove('fullscreen');
            drawer.classList.remove('open');
        }
    } else {
        // Reset to initial state
        drawer.classList.remove('fullscreen');
        drawer.classList.remove('open');
    }

    // Reset transform
    drawer.style.transform = '';
});
