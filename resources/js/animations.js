// Add animation classes to elements when they come into view
document.addEventListener('DOMContentLoaded', () => {
    // Add floating animation to cards
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        card.classList.add('floating-element');
    });

    // Add bounce animation to buttons
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(button => {
        button.addEventListener('mouseover', () => {
            button.classList.add('animated-icon');
        });
        button.addEventListener('mouseout', () => {
            button.classList.remove('animated-icon');
        });
    });

    // Add pulse animation to important elements
    const importantElements = document.querySelectorAll('.important');
    importantElements.forEach(element => {
        element.classList.add('pulsing-element');
    });

    // Smooth scroll for navigation links
    const navLinks = document.querySelectorAll('a[href^="#"]');
    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const targetId = link.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    // Add hover effects to interactive elements
    const interactiveElements = document.querySelectorAll('.interactive');
    interactiveElements.forEach(element => {
        element.addEventListener('mouseover', () => {
            element.style.transform = 'scale(1.05)';
            element.style.transition = 'transform 0.3s ease';
        });
        element.addEventListener('mouseout', () => {
            element.style.transform = 'scale(1)';
        });
    });

    // Add loading animation
    const loadingElements = document.querySelectorAll('.loading');
    loadingElements.forEach(element => {
        element.innerHTML = '<div class="loading-spinner"></div>';
    });

    // Add success message animation
    function showSuccessMessage(message) {
        const successDiv = document.createElement('div');
        successDiv.className = 'success-message';
        successDiv.textContent = message;
        document.body.appendChild(successDiv);
        setTimeout(() => {
            successDiv.remove();
        }, 3000);
    }

    // Add error message animation
    function showErrorMessage(message) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-message';
        errorDiv.textContent = message;
        document.body.appendChild(errorDiv);
        setTimeout(() => {
            errorDiv.remove();
        }, 3000);
    }

    // Make these functions available globally
    window.showSuccessMessage = showSuccessMessage;
    window.showErrorMessage = showErrorMessage;
}); 