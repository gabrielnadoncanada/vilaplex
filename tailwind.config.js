/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './app/Filament/Blocks/*.php',
    ],
    theme: {
        extend: {
            maxWidth: {
                'wide': '1200px',
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
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
};
