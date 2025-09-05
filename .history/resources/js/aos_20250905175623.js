// AOS Configuration for Vite
import AOS from 'aos';
import 'aos/dist/aos.css';

// Initialize AOS
AOS.init({
    duration: 800,
    once: true,
    offset: 50,
    disable: false
});

// Export for global access
window.AOS = AOS;

console.log('🎉 AOS loaded via Vite!');
