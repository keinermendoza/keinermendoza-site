import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

            typography: ({ theme }) => ({
                DEFAULT: {
                    css: {
                        iframe: {
                            width: '100%',
                            maxWidth: '100% !important',
                            height: 'auto !important',
                            aspectRatio: '16 / 9',
                            margin: '2rem auto',
                            display: 'block',
                            borderRadius: theme('borderRadius.xl'),
                            border: `1px solid ${theme('colors.slate.200')}`,
                            boxShadow: theme('boxShadow.lg'),
                        },
                    },
                },
            }),
        },
    },

    plugins: [
        forms,
        typography,
    ],
};
