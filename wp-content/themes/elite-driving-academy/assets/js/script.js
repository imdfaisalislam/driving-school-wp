// Premium Loader
window.addEventListener('load', function() {
    setTimeout(() => {
        document.querySelector('.loader-wrapper').classList.add('hidden');
    }, 1500);
});

// Header Scroll Effect
window.addEventListener('scroll', function() {
    const header = document.querySelector('.header');
    const scrollTop = window.pageYOffset;

    if (scrollTop > 100) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});

// Active Navigation Link
const sections = document.querySelectorAll('section[id]');
const navLinks = document.querySelectorAll('.nav-link');

window.addEventListener('scroll', () => {
    let current = '';
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        if (scrollY >= sectionTop - 100) {
            current = section.getAttribute('id');
        }
    });

    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href').slice(1) === current) {
            link.classList.add('active');
        }
    });
});

// Mobile Navigation
const hamburger = document.querySelector('.hamburger');
const navMenu = document.querySelector('.nav-menu');

hamburger.addEventListener('click', function() {
    hamburger.classList.toggle('active');
    navMenu.classList.toggle('active');
});

// Close mobile menu on link click
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', () => {
        hamburger.classList.remove('active');
        navMenu.classList.remove('active');
    });
});

// Smooth Scrolling
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            const headerOffset = 80;
            const elementPosition = target.offsetTop;
            const offsetPosition = elementPosition - headerOffset;

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        }
    });
});

// Number Counter Animation
function animateValue(element, start, end, duration) {
    if (element.dataset.animated === 'true') return;

    let startTimestamp = null;
    const isDecimal = end % 1 !== 0;
    const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        const current = progress * (end - start) + start;

        if (isDecimal) {
            element.textContent = current.toFixed(1);
        } else {
            element.textContent = Math.floor(current);
        }

        if (element.textContent.includes('98')) {
            element.textContent = element.textContent + '%';
        } else if (element.textContent.includes('5000')) {
            element.textContent = element.textContent + '+';
        }

        if (progress < 1) {
            window.requestAnimationFrame(step);
        }
    };
    window.requestAnimationFrame(step);
    element.dataset.animated = 'true';
}

// Intersection Observer for Animations
const observerOptions = {
    threshold: 0.2,
    rootMargin: '0px 0px -50px 0px'
};

const animationObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            // Animate counters
            if (entry.target.classList.contains('stat-number')) {
                const endValue = parseFloat(entry.target.dataset.count);
                animateValue(entry.target, 0, endValue, 2000);
            }

            // Fade in animations
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Apply animations to elements
document.addEventListener('DOMContentLoaded', function() {
    // Counter animations
    document.querySelectorAll('.stat-number').forEach(counter => {
        animationObserver.observe(counter);
    });

    // Card animations
    const animatedElements = document.querySelectorAll('.feature-card, .pricing-card, .instructor-card, .info-card');
    animatedElements.forEach((element, index) => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(30px)';
        element.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
        animationObserver.observe(element);
    });
});

// Pricing Toggle
const pricingToggle = document.getElementById('pricing-toggle');
const monthlyPrices = document.querySelectorAll('.monthly-price');
const packagePrices = document.querySelectorAll('.package-price');
const periods = document.querySelectorAll('.period');

pricingToggle?.addEventListener('change', function() {
    if (this.checked) {
        monthlyPrices.forEach(price => price.style.display = 'none');
        packagePrices.forEach(price => price.style.display = 'block');
        periods.forEach(period => period.textContent = '/package');
    } else {
        monthlyPrices.forEach(price => price.style.display = 'block');
        packagePrices.forEach(price => price.style.display = 'none');
        periods.forEach(period => period.textContent = '/month');
    }
});

// Testimonial Slider
let currentSlide = 0;
const testimonialSlides = document.querySelectorAll('.testimonial-slide');
const dots = document.querySelectorAll('.dot');

function showSlide(index) {
    testimonialSlides.forEach(slide => slide.classList.remove('active'));
    dots.forEach(dot => dot.classList.remove('active'));

    if (testimonialSlides[index]) {
        testimonialSlides[index].classList.add('active');
    }
    if (dots[index]) {
        dots[index].classList.add('active');
    }
}

dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        currentSlide = index;
        showSlide(currentSlide);
    });
});

// Auto-rotate testimonials
if (testimonialSlides.length > 1) {
    setInterval(() => {
        currentSlide = (currentSlide + 1) % testimonialSlides.length;
        showSlide(currentSlide);
    }, 5000);
}

// Form Handling
const contactForm = document.querySelector('.premium-form');
contactForm?.addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const data = Object.fromEntries(formData);

    // Form validation
    let isValid = true;
    const requiredFields = ['firstName', 'lastName', 'email', 'phone', 'package'];

    requiredFields.forEach(field => {
        const input = document.getElementById(field);
        if (!data[field] || data[field].trim() === '') {
            input.style.borderColor = '#ef4444';
            isValid = false;
        } else {
            input.style.borderColor = '#e2e8f0';
        }
    });

    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const emailInput = document.getElementById('email');
    if (!emailRegex.test(data.email)) {
        emailInput.style.borderColor = '#ef4444';
        isValid = false;
    }

    if (isValid) {
        const button = this.querySelector('button[type="submit"]');
        const originalContent = button.innerHTML;

        button.innerHTML = '<span>Sending...</span> <i class="fas fa-spinner fa-spin"></i>';
        button.disabled = true;

        // Simulate form submission
        setTimeout(() => {
            button.innerHTML = '<span>Message Sent!</span> <i class="fas fa-check"></i>';
            button.style.background = 'linear-gradient(135deg, #10b981 0%, #059669 100%)';

            setTimeout(() => {
                button.innerHTML = originalContent;
                button.disabled = false;
                button.style.background = '';
                this.reset();

                // Show success notification
                showNotification('Success! We\'ll contact you within 24 hours.', 'success');
            }, 2000);
        }, 1500);
    } else {
        showNotification('Please fill in all required fields correctly.', 'error');
    }
});

// Notification System
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
        <span>${message}</span>
    `;

    document.body.appendChild(notification);

    // Add styles
    const style = document.createElement('style');
    style.textContent = `
        .notification {
            position: fixed;
            top: 100px;
            right: 20px;
            background: white;
            padding: 1rem 1.5rem;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            gap: 1rem;
            z-index: 10000;
            animation: slideInRight 0.3s ease;
        }
        .notification-success { border-left: 4px solid #10b981; }
        .notification-error { border-left: 4px solid #ef4444; }
        .notification i { font-size: 1.2rem; }
        .notification-success i { color: #10b981; }
        .notification-error i { color: #ef4444; }
    `;
    document.head.appendChild(style);

    setTimeout(() => {
        notification.style.animation = 'slideOutRight 0.3s ease';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// Back to Top Button
const backToTop = document.querySelector('.back-to-top');

window.addEventListener('scroll', () => {
    if (window.pageYOffset > 300) {
        backToTop.classList.add('show');
    } else {
        backToTop.classList.remove('show');
    }
});

backToTop?.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

// Parallax Effect for Hero Section
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const heroBackground = document.querySelector('.hero-background');
    const floatingElements = document.querySelectorAll('.float-element');

    if (heroBackground) {
        heroBackground.style.transform = `translateY(${scrolled * 0.5}px)`;
    }

    floatingElements.forEach((element, index) => {
        const speed = 0.5 + (index * 0.1);
        element.style.transform = `translateY(${scrolled * speed}px)`;
    });
});

// Pricing Card Click Animation
document.querySelectorAll('.pricing-card button').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();

        const card = this.closest('.pricing-card');
        const packageTitle = card.querySelector('.card-title').textContent;

        // Ripple effect
        const ripple = document.createElement('span');
        ripple.classList.add('ripple');
        this.appendChild(ripple);

        setTimeout(() => ripple.remove(), 600);

        // Navigate to contact form
        const packageSelect = document.getElementById('package');
        if (packageSelect) {
            const options = packageSelect.querySelectorAll('option');
            options.forEach(option => {
                if (option.textContent.toLowerCase().includes(packageTitle.toLowerCase())) {
                    packageSelect.value = option.value;
                }
            });
        }

        document.querySelector('#contact').scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    });
});

// Add ripple effect styles
const rippleStyle = document.createElement('style');
rippleStyle.textContent = `
    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        transform: scale(0);
        animation: ripple 0.6s ease-out;
        pointer-events: none;
    }
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
    button {
        position: relative;
        overflow: hidden;
    }
`;
document.head.appendChild(rippleStyle);

// Enhanced scroll animations
const scrollElements = document.querySelectorAll('.section-header, .cta-content');

const elementInView = (el, dividend = 1) => {
    const elementTop = el.getBoundingClientRect().top;
    return (
        elementTop <=
        (window.innerHeight || document.documentElement.clientHeight) / dividend
    );
};

const displayScrollElement = (element) => {
    element.classList.add('scrolled');
};

const handleScrollAnimation = () => {
    scrollElements.forEach((el) => {
        if (elementInView(el, 1.25)) {
            displayScrollElement(el);
        }
    });
};

window.addEventListener('scroll', () => {
    handleScrollAnimation();
});

// Initialize on load
handleScrollAnimation();

// Add animation styles
const animationStyle = document.createElement('style');
animationStyle.textContent = `
    .section-header, .cta-content {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }
    .section-header.scrolled, .cta-content.scrolled {
        opacity: 1;
        transform: translateY(0);
    }
    @keyframes slideOutRight {
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
`;
document.head.appendChild(animationStyle);