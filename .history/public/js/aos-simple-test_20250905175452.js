// Simple AOS Test Script
console.log('🎯 Simple AOS Test Starting...');

// Simple initialization
function initSimpleAOS() {
    if (typeof AOS !== 'undefined') {
        console.log('✅ AOS found, initializing...');
        
        AOS.init({
            duration: 800,
            once: true,
            offset: 50
        });
        
        console.log('🎉 AOS initialized!');
        
        // Refresh after a moment
        setTimeout(() => {
            AOS.refresh();
            console.log('🔄 AOS refreshed');
            
            // Count elements
            const elements = document.querySelectorAll('[data-aos]');
            console.log(`📊 Found ${elements.length} AOS elements`);
            
        }, 500);
        
    } else {
        console.log('❌ AOS not found');
    }
}

// Initialize when ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initSimpleAOS);
} else {
    setTimeout(initSimpleAOS, 100);
}

// Manual test function
window.simpleAOSTest = function() {
    console.log('🧪 Simple AOS Test...');
    initSimpleAOS();
};

console.log('🎯 Simple AOS Test Ready! Use simpleAOSTest() to test.');
