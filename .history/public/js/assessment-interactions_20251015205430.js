// Assessment Page Interactive Features
document.addEventListener('DOMContentLoaded', function() {
    
    // Initialize AOS with custom settings
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 100
        });
    }

    // Add sparkle effects
    function createSparkles() {
        const containers = document.querySelectorAll('.group');
        
        containers.forEach(container => {
            for (let i = 0; i < 4; i++) {
                const sparkle = document.createElement('div');
                sparkle.className = 'sparkle';
                sparkle.style.top = Math.random() * 100 + '%';
                sparkle.style.left = Math.random() * 100 + '%';
                sparkle.style.animationDelay = Math.random() * 2 + 's';
                container.style.position = 'relative';
                container.appendChild(sparkle);
            }
        });
    }

    // Animated counter for stats
    function animateCounters() {
        const counters = document.querySelectorAll('[data-count]');
        
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-count'));
            const increment = target / 20;
            let current = 0;
            
            const updateCounter = () => {
                if (current < target) {
                    current += increment;
                    counter.textContent = Math.ceil(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target;
                }
            };
            
            // Start animation when element is in view
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        updateCounter();
                        observer.unobserve(entry.target);
                    }
                });
            });
            
            observer.observe(counter);
        });
    }

    // Particle effect on button hover
    function addParticleEffect() {
        const buttons = document.querySelectorAll('.btn-assessment');
        
        buttons.forEach(button => {
            button.addEventListener('mouseenter', function(e) {
                createParticles(e.target);
            });
        });
    }

    function createParticles(element) {
        const rect = element.getBoundingClientRect();
        
        for (let i = 0; i < 6; i++) {
            const particle = document.createElement('div');
            particle.className = 'absolute w-1 h-1 bg-white rounded-full pointer-events-none';
            particle.style.left = Math.random() * rect.width + 'px';
            particle.style.top = Math.random() * rect.height + 'px';
            particle.style.animation = `sparkle 1s ease-out forwards`;
            particle.style.animationDelay = i * 0.1 + 's';
            
            element.appendChild(particle);
            
            setTimeout(() => {
                particle.remove();
            }, 1000);
        }
    }

    // Smooth scrolling for internal links
    function smoothScrolling() {
        const links = document.querySelectorAll('a[href^="#"]');
        
        links.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }

    // Add loading states to buttons
    function addLoadingStates() {
        const buttons = document.querySelectorAll('a[href*="assessment"]');
        
        buttons.forEach(button => {
            button.addEventListener('click', function(e) {
                const originalText = this.querySelector('span') ? this.querySelector('span').textContent : this.textContent;
                const icon = this.querySelector('svg');
                
                // Add loading spinner
                const spinner = document.createElement('div');
                spinner.className = 'animate-spin w-5 h-5 border-2 border-white border-t-transparent rounded-full';
                
                if (icon) {
                    icon.style.display = 'none';
                    this.insertBefore(spinner, this.firstChild);
                }
                
                // Restore after delay
                setTimeout(() => {
                    spinner.remove();
                    if (icon) {
                        icon.style.display = 'block';
                    }
                }, 2000);
            });
        });
    }

    // Interactive background elements
    function animateBackground() {
        const bgElements = document.querySelectorAll('.absolute.w-20, .absolute.w-32, .absolute.w-24, .absolute.w-16');
        
        bgElements.forEach((element, index) => {
            // Add mouse follow effect
            document.addEventListener('mousemove', (e) => {
                const { clientX, clientY } = e;
                const x = clientX / window.innerWidth;
                const y = clientY / window.innerHeight;
                
                const moveX = (x - 0.5) * 20 * (index + 1);
                const moveY = (y - 0.5) * 20 * (index + 1);
                
                element.style.transform = `translate(${moveX}px, ${moveY}px)`;
            });
        });
    }

    // Parallax effect for background elements
    function parallaxEffect() {
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallaxElements = document.querySelectorAll('[data-parallax]');
            
            parallaxElements.forEach(element => {
                const speed = element.getAttribute('data-parallax') || 0.5;
                const yPos = -(scrolled * speed);
                element.style.transform = `translateY(${yPos}px)`;
            });
        });
    }

    // Add floating animation to cards on scroll
    function floatingCards() {
        const cards = document.querySelectorAll('.group');
        
        window.addEventListener('scroll', () => {
            cards.forEach((card, index) => {
                const rect = card.getBoundingClientRect();
                const isVisible = rect.top < window.innerHeight && rect.bottom > 0;
                
                if (isVisible) {
                    const scrollPercent = (window.innerHeight - rect.top) / window.innerHeight;
                    const floatAmount = Math.sin(scrollPercent * Math.PI) * 10;
                    
                    card.style.transform = `translateY(${floatAmount}px)`;
                }
            });
        });
    }

    // Initialize all features
    setTimeout(() => {
        createSparkles();
        animateCounters();
        addParticleEffect();
        smoothScrolling();
        addLoadingStates();
        animateBackground();
        parallaxEffect();
        floatingCards();
    }, 500);

    // Add performance-friendly resize handler
    let resizeTimeout;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            // Reinitialize AOS on resize
            if (typeof AOS !== 'undefined') {
                AOS.refresh();
            }
        }, 250);
    });

    // Add keyboard navigation improvements
    document.addEventListener('keydown', function(e) {
        // Allow Enter key to activate buttons
        if (e.key === 'Enter' && e.target.tagName === 'A') {
            e.target.click();
        }
        
        // Add Tab navigation highlighting
        if (e.key === 'Tab') {
            document.body.classList.add('keyboard-navigation');
        }
    });

    document.addEventListener('mousedown', function() {
        document.body.classList.remove('keyboard-navigation');
    });
});

// Add CSS for keyboard navigation
const style = document.createElement('style');
style.textContent = `
    .keyboard-navigation *:focus {
        outline: 3px solid rgba(59, 130, 246, 0.5) !important;
        outline-offset: 2px !important;
    }
`;
document.head.appendChild(style);