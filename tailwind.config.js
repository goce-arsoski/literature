const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('./colors');

/** @type {import('tailwindcss').Config} */
module.exports = {
    presets: [
        require('./custom-preset.js')
    ],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Karla', ...defaultTheme.fontFamily.sans],
            },

            colors: colors,
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
