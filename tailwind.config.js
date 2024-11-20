/** @type {import('tailwindcss').Config} */
const defaultTheme = require("tailwindcss/defaultTheme");
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {
            animation: {
                "gradient-move": "gradient-move 3s infinite linear",
            },
            fontFamily: {
                sans: ["Inter var", ...defaultTheme.fontFamily.sans],
            },
            rotate: {
                270: "270deg",
            },
            keyframes: {
                "gradient-move": {
                    "0%": { "background-position": "0% 50%" },
                    "50%": { "background-position": "100% 50%" },
                    "100%": { "background-position": "0% 50%" },
                },
            },
        },
    },
    plugins: [],
};
