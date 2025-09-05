// LMS AOS Enhancement Script - Simplified and More Reliable
(function() {
    'use strict';
    
    console.log('🎓 LMS AOS Enhancement Script Loading...');
    
    let aosInitialized = false;
    
    // Simple AOS Configuration
    const AOS_CONFIG = {
        duration: 800,
        once: true,
        offset: 50,
        disable: false,
        startEvent: 'DOMContentLoaded'
    };
    
    // Initialize AOS with better error handling
    function initAOS() {
        console.log('🎯 Attempting to initialize AOS...');
        
        // Check if AOS is available
        if (typeof AOS !== 'undefined') {
            console.log('✅ AOS library found!');
            
            try {
                // Initialize AOS
                AOS.init(AOS_CONFIG);
                aosInitialized = true;
                console.log('🎉 AOS initialized successfully!');
                
                // Force refresh and test
                setTimeout(() => {
                    AOS.refresh();
                    console.log('🔄 AOS refreshed');
                    
                    // Count and log AOS elements
                    const aosElements = document.querySelectorAll('[data-aos]');
                    console.log(`📊 Found ${aosElements.length} AOS elements`);
                    
                    // Test first few elements
                    testAOSElements();
                    
                }, 300);
                
            } catch (error) {
                console.error('❌ Error initializing AOS:', error);
                enableFallbackAnimations();
            }
            
        } else {
            console.log('❌ AOS library not found, loading fallback...');
            loadAOSFallback();
        }
    }
    
    // Load AOS as fallback
    function loadAOSFallback() {
        console.log('💪 Loading AOS via fallback...');
        
        const script = document.createElement('script');
        script.src = 'https://unpkg.com/aos@2.3.1/dist/aos.js';
        script.async = true;
        
        script.onload = function() {
            console.log('✅ AOS loaded via fallback');
            setTimeout(initAOS, 100);
        };
        
        script.onerror = function() {
            console.error('❌ Failed to load AOS, using fallback animations');
            enableFallbackAnimations();
        };
        
        document.head.appendChild(script);
    }
    
    // Test AOS elements
    function testAOSElements() {
        const testElements = document.querySelectorAll('[data-aos]');
        console.log(`🧪 Testing ${testElements.length} AOS elements...`);
        
        // Test first 3 elements
        testElements.forEach((el, i) => {
            if (i < 3) {
                console.log(`Testing element ${i+1}: ${el.getAttribute('data-aos')}`);
            }
        });
    }
    
    // Fallback animations
    function enableFallbackAnimations() {
        console.log('🔄 Enabling fallback animations...');
        
        const elements = document.querySelectorAll('[data-aos]');
        elements.forEach((el, i) => {
            // Set initial state
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'all 0.8s ease-out';
            
            // Animate in
            setTimeout(() => {
                el.style.opacity = '1';
                el.style.transform = 'translateY(0)';
            }, i * 100 + 200);
        });
        
        console.log('✅ Fallback animations enabled');
    }
    
    // Manual refresh function
    function refreshAOS() {
        if (typeof AOS !== 'undefined' && aosInitialized) {
            AOS.refresh();
            console.log('🔄 AOS manually refreshed');
        } else {
            console.log('⚠️ AOS not available for refresh');
        }
    }
    
    // Initialize when ready
    function startAOS() {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initAOS);
        } else {
            // DOM already ready
            setTimeout(initAOS, 100);
        }
    }
    
    // Start the process
    startAOS();
    
    // Add event listeners
    window.addEventListener('resize', refreshAOS);
    
    // Expose for debugging
    window.LMSAOS = {
        init: initAOS,
        refresh: refreshAOS,
        test: testAOSElements,
        fallback: enableFallbackAnimations,
        config: AOS_CONFIG,
        isInitialized: () => aosInitialized
    };
    
    console.log('🎓 LMS AOS Enhancement Script Ready!');
    console.log('💡 Debug: window.LMSAOS.refresh() or window.LMSAOS.fallback()');
    
})();
