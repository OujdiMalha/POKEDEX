import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    theme: {
        extend: {
            colors: {
                instagramPurple: '#833AB4',
                instagramRed: '#FD1D1D',
                instagramOrange: '#F56040',
                instagramYellow: '#FFDC80',
                haloGray: '#2E2E2E',
                haloLightGray: '#F3F3F3',
            },
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'hero-pattern': "url('/images/halo-background.jpg')",
            },
        },
    },

    plugins: [forms],
};
