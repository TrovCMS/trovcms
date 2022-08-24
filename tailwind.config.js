const colors = require("tailwindcss/colors");

module.exports = {
    content: ["./resources/**/*.blade.php"],
    darkMode: "class",
    theme: {
        extend: {},
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
