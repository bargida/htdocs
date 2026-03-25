// Preloader
window.addEventListener('load', () => {
    const preloader = document.getElementById('preloader');
    if (preloader) {
        setTimeout(() => preloader.classList.add('hidden'), 500);
    }
});

// Header scroll effect
const header = document.getElementById('header');
window.addEventListener('scroll', () => {
    if (window.scrollY > 80) {
        header?.classList.add('scrolled');
    } else {
        header?.classList.remove('scrolled');
    }
});

// Mobile menu toggle
const mobileToggle = document.getElementById('mobileToggle');
const nav = document.getElementById('nav');
mobileToggle?.addEventListener('click', () => {
    nav.classList.toggle('active');
    mobileToggle.classList.toggle('active');
});

// Close mobile menu on link click
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', () => {
        nav?.classList.remove('active');
        mobileToggle?.classList.remove('active');
    });
});

// Back to top
const backToTop = document.getElementById('backToTop');
window.addEventListener('scroll', () => {
    if (window.scrollY > 400) {
        backToTop?.classList.add('visible');
    } else {
        backToTop?.classList.remove('visible');
    }
});

// Skill bars animation
const animateSkillBars = () => {
    document.querySelectorAll('.skill-progress, .skill-bar-fill').forEach(bar => {
        const rect = bar.getBoundingClientRect();
        if (rect.top < window.innerHeight - 50) {
            const width = bar.dataset.width;
            bar.style.width = width + '%';
        }
    });
};
window.addEventListener('scroll', animateSkillBars);
window.addEventListener('load', animateSkillBars);

// Counter animation
const animateCounters = () => {
    document.querySelectorAll('.stat-number').forEach(counter => {
        if (counter.dataset.animated) return;
        const rect = counter.getBoundingClientRect();
        if (rect.top < window.innerHeight - 50) {
            counter.dataset.animated = 'true';
            const target = parseInt(counter.dataset.count);
            let current = 0;
            const increment = target / 40;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    counter.textContent = target;
                    clearInterval(timer);
                } else {
                    counter.textContent = Math.floor(current);
                }
            }, 40);
        }
    });
};
window.addEventListener('scroll', animateCounters);
window.addEventListener('load', animateCounters);

// Simple fade-in on scroll (data-aos replacement)
const observerOptions = { threshold: 0.1, rootMargin: '0px 0px -50px 0px' };
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-aos]').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
});
