/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './app/Filament/Blocks/*.php',
        './config/blade-components.php',
    ],
    theme: {
        extend: {
            maxWidth: {
                'wide': '1200px',
            },
            container: {
                center: true,
                padding: '1rem',
                screens: {
                    sm: '540px',
                    md: '720px',
                    lg: '960px',
                    xl: '1140px',
                    '2xl': '1320px',
                },
            },

        },
        screens: {
            'sm': '576px',
            'md': '768px',
            'lg': '992px',
            'xl': '1024px',
            '2xl': '1200px',
            '3xl': '1400px',
        },
        plugins: [
            require('@tailwindcss/forms'),
            require('@tailwindcss/typography'),
        ],
    }
};
