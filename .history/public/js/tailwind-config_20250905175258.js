// Tailwind CSS Configuration for Development
// This script suppresses the production warning and provides development configuration

(function() {
    'use strict';

    // Suppress Tailwind CDN warning in development
    if (typeof tailwind !== 'undefined') {
        console.log('🎨 Tailwind CSS loaded via CDN (Development mode)');

        // Override console.warn to suppress Tailwind production warning
        const originalWarn = console.warn;
        console.warn = function(message) {
            if (typeof message === 'string' && message.includes('cdn.tailwindcss.com should not be used in production')) {
                console.log('ℹ️ Tailwind CDN warning suppressed (Development mode)');
                return;
            }
            originalWarn.apply(console, arguments);
        };

        // Configure Tailwind for development
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                        secondary: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                        },
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'float': 'float 6s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite',
                        'shimmer': 'shimmer 2s linear infinite',
                        'bounce-in': 'bounceIn 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275)',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        glow: {
                            '0%, 100%': { boxShadow: '0 0 20px rgba(99, 102, 241, 0.3)' },
                            '50%': { boxShadow: '0 0 40px rgba(99, 102, 241, 0.6)' },
                        },
                        shimmer: {
                            '0%': { backgroundPosition: '-200% 0' },
                            '100%': { backgroundPosition: '200% 0' },
                        },
                        bounceIn: {
                            '0%': { opacity: '0', transform: 'scale(0.3) translateY(50px)' },
                            '50%': { opacity: '1', transform: 'scale(1.05) translateY(-10px)' },
                            '70%': { transform: 'scale(0.95) translateY(5px)' },
                            '100%': { opacity: '1', transform: 'scale(1) translateY(0)' },
                        },
                    },
                },
            },
        };

        console.log('✅ Tailwind configured for development');
    }

    // Development mode indicator
    console.log('🔧 Development mode active - CDN resources enabled');

})();
