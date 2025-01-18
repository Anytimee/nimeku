/** @type {import('tailwindcss').Config} */
const defaultTheme = require("tailwindcss/defaultTheme");
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontFamily: {
            sans: ["InterVariable", ...defaultTheme.fontFamily.sans],
        },
    },
    width: {
        "96rem": "24rem",
    },

    plugins: [require("@tailwindcss/line-clamp")],
};
