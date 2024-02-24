import  defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import daisyui from "daisyui";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            fontSize: {
                sm: '0.750rem',
                base: '1rem',
                xl: '1.333rem',
                '2xl': '1.777rem',
                '3xl': '2.369rem',
                '4xl': '3.158rem',
                '5xl': '4.210rem',
            },
            fontFamily: {
                sans:['Poppins', 'sans-serif'],
                heading: 'Poppins',
                body: 'Poppins',
            },
            fontWeight: {
                normal: '400',
                bold: '700',
            },
        },
    },
    plugins: [forms, daisyui],
    daisyui: {
        themes: [
            {
                light: {
                    "primary": "#d793ec",
                    "secondary": "#dec6f1",
                    "accent": "#be87f2",
                    "neutral": "#242729",
                    "base-100": "#e4e6e7",
                },
                dark: {
                    "primary": "#57136c",
                    "secondary": "#270e3a",
                    "accent": "#440d79",
                    "neutral": "#242729",
                    "base-100": "#181A1B",
                },
            },
        ],
    },
};
