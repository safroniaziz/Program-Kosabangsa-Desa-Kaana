// AOS Debug Script - Simple and Direct
console.log('🔧 AOS Debug Script Loading...');

// Wait for everything to load
window.addEventListener('load', function() {
    console.log('🌐 Window loaded, checking AOS...');

    setTimeout(function() {
        // Check if AOS is available
        if (typeof AOS !== 'undefined') {
            console.log('✅ AOS library is available');

            // Initialize AOS with simple config
            AOS.init({
                duration: 600,
                once: true,
                offset: 50,
                disable: false
            });

            console.log('🎉 AOS initialized with debug script');

            // Refresh after a moment
            setTimeout(function() {
                AOS.refresh();
                console.log('🔄 AOS refreshed by debug script');

                // Count elements
                const elements = document.querySelectorAll('[data-aos]');
                console.log(`📊 Debug script found ${elements.length} AOS elements`);

                // Test first few elements
                elements.forEach((el, i) => {
                    if (i < 5) {
                        console.log(`Element ${i+1}: ${el.getAttribute('data-aos')} - ${el.textContent.trim()}`);
                    }
                });

            }, 300);

        } else {
            console.log('❌ AOS library not available in debug script');

            // Try to load AOS
            const script = document.createElement('script');
            script.src = 'https://unpkg.com/aos@2.3.1/dist/aos.js';
            script.onload = function() {
                console.log('✅ AOS loaded by debug script');
                AOS.init({
                    duration: 600,
                    once: true,
                    offset: 50
                });
                setTimeout(() => AOS.refresh(), 200);
            };
            document.head.appendChild(script);
        }
    }, 1000);
});

// Manual test function
window.testAOS = function() {
    console.log('🧪 Manual AOS test...');

    if (typeof AOS !== 'undefined') {
        AOS.refresh();
        console.log('✅ AOS refreshed manually');

        const elements = document.querySelectorAll('[data-aos]');
        console.log(`Found ${elements.length} AOS elements`);

        // Force animate first few elements
        elements.forEach((el, i) => {
            if (i < 3) {
                el.style.opacity = '0';
                el.style.transform = 'translateY(50px)';
                setTimeout(() => {
                    el.style.transition = 'all 0.6s ease-out';
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }, i * 200);
            }
        });
    } else {
        console.log('❌ AOS not available for manual test');
    }
};

console.log('🔧 AOS Debug Script Ready! Use testAOS() to test manually.');
