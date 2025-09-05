// LMS AOS Enhancement Script
(function() {
    'use strict';

    console.log('🎓 LMS AOS Enhancement Script Loading...');

    // AOS Configuration
    const AOS_CONFIG = {
        duration: 1000,
        once: true,
        offset: 100,
        disable: false,
        startEvent: 'DOMContentLoaded',
        delay: 0,
        easing: 'ease-out-cubic'
    };

    // Initialize AOS with enhanced error handling
    function initAOS() {
        console.log('🎯 Initializing AOS...');

        if (typeof AOS !== 'undefined') {
            console.log('✅ AOS library found, initializing...');

            try {
                AOS.init(AOS_CONFIG);
                console.log('🎉 AOS initialized successfully with config:', AOS_CONFIG);

                // Force refresh after initialization
                setTimeout(function() {
                    AOS.refresh();
                    console.log('🔄 AOS refreshed');

                    // Log all AOS elements for debugging
                    const aosElements = document.querySelectorAll('[data-aos]');
                    console.log(`📊 Found ${aosElements.length} AOS elements:`);

                    aosElements.forEach((el, i) => {
                        const animation = el.getAttribute('data-aos');
                        const delay = el.getAttribute('data-aos-delay') || 'none';
                        const duration = el.getAttribute('data-aos-duration') || 'default';
                        console.log(`${i+1}. ${animation} - delay: ${delay} - duration: ${duration}`);
                    });

                    // Test AOS functionality
                    testAOSFunctionality();

                }, 200);

            } catch (error) {
                console.error('❌ Error initializing AOS:', error);
                fallbackAOS();
            }

        } else {
            console.log('❌ AOS library not found, trying fallback...');
            fallbackAOS();
        }
    }

    // Fallback AOS loading
    function fallbackAOS() {
        console.log('💪 Loading AOS via fallback...');

        const script = document.createElement('script');
        script.src = 'https://unpkg.com/aos@2.3.1/dist/aos.js';
        script.onload = function() {
            console.log('✅ AOS loaded via fallback');
            initAOS();
        };
        script.onerror = function() {
            console.error('❌ Failed to load AOS via fallback');
            enableFallbackAnimations();
        };
        document.head.appendChild(script);
    }

    // Test AOS functionality
    function testAOSFunctionality() {
        console.log('🧪 Testing AOS functionality...');

        const testElements = document.querySelectorAll('[data-aos]');
        if (testElements.length > 0) {
            console.log('✅ AOS elements found, testing animations...');

            // Test first few elements
            testElements.forEach((el, i) => {
                if (i < 3) { // Test first 3 elements
                    setTimeout(() => {
                        el.style.opacity = '0';
                        el.style.transform = 'translateY(50px)';

                        setTimeout(() => {
                            el.style.transition = 'all 1s ease-out';
                            el.style.opacity = '1';
                            el.style.transform = 'translateY(0)';
                            console.log(`✅ Test animation ${i+1} completed`);
                        }, 100);
                    }, i * 200);
                }
            });
        } else {
            console.log('⚠️ No AOS elements found for testing');
        }
    }

    // Fallback animations if AOS fails
    function enableFallbackAnimations() {
        console.log('🔄 Enabling fallback animations...');

        const elements = document.querySelectorAll('[data-aos]');
        elements.forEach((el, i) => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(50px)';
            el.style.transition = 'all 1s ease-out';

            setTimeout(() => {
                el.style.opacity = '1';
                el.style.transform = 'translateY(0)';
            }, i * 100);
        });

        console.log('✅ Fallback animations enabled');
    }

    // Window resize handler
    function handleResize() {
        if (typeof AOS !== 'undefined') {
            AOS.refresh();
        }
    }

    // Scroll handler for manual trigger
    function handleScroll() {
        if (typeof AOS !== 'undefined') {
            AOS.refresh();
        }
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAOS);
    } else {
        initAOS();
    }

    // Add event listeners
    window.addEventListener('resize', handleResize);
    window.addEventListener('scroll', handleScroll);

    // Expose functions globally for debugging
    window.LMSAOS = {
        init: initAOS,
        refresh: function() {
            if (typeof AOS !== 'undefined') {
                AOS.refresh();
            }
        },
        test: testAOSFunctionality,
        config: AOS_CONFIG
    };

    console.log('🎓 LMS AOS Enhancement Script Loaded Successfully!');
    console.log('💡 Use window.LMSAOS for debugging (e.g., window.LMSAOS.refresh())');

})();
