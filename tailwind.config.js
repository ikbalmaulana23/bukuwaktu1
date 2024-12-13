import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        ,
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter var", ...defaultTheme.fontFamily.sans],
                inter: ["Inter", "sans-serif"],
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
    },

    plugins: [forms],
};
