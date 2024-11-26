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
                "fade-in": "fadeIn 2s ease-in-out infinite alternate",
                "fade-out": "fadeOut 2s ease-in-out infinite alternate",
                highlight: "highlight 2s ease-in-out forwards",
            },
            fontFamily: {
                sans: ["Inter var", ...defaultTheme.fontFamily.sans],
            },
            rotate: {
                270: "270deg",
            },
            colors: {
                pastelYellow: "#FFF9C4", // Warna pastel kuning
                pink: "#F1817B",
            },
            keyframes: {
                "gradient-move": {
                    "0%": { "background-position": "0% 50%" },
                    "50%": { "background-position": "100% 50%" },
                    "100%": { "background-position": "0% 50%" },
                },
                fadeIn: {
                    "0%": { opacity: "0" },
                    "100%": { opacity: "1" },
                },
                fadeOut: {
                    "0%": { opacity: "1" },
                    "100%": { opacity: "0" },
                },
                highlight: {
                    "0%": {
                        opacity: "0",
                        width: "0%",
                    },
                    "100%": {
                        opacity: "1",
                        width: "100%",
                    },
                },
            },
        },
        plugins: [],
    },
};
