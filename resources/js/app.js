import '../css/app.css';
import './bootstrap';
import 'flowbite/dist/flowbite.min.js';

// Import all images
const images = import.meta.glob([
    '../images/**',
    '/public/images/**',
    '/storage/images/**'
], { eager: true });

// Make images available to the window object
window.images = images;

// Any custom JS can go here
document.addEventListener('DOMContentLoaded', function() {
    console.log('Kids Learning app loaded');
});

// Highlight elements on click example
window.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.highlight-on-click').forEach(el => {
        el.addEventListener('click', function() {
            this.classList.toggle('highlight');
        });
    });
});
