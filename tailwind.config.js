const colors = require("tailwindcss/colors");
const plugin = require("tailwindcss/plugin");
const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: ["./resources/**/*.blade.php"],
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                gray: colors.slate,
                danger: colors.rose,
                primary: colors.sky,
                secondary: colors.indigo,
                tertiary: colors.slate,
                accent: colors.pink,
                success: colors.emerald,
                warning: colors.orange,
            },
            fontFamily: {
                sans: ["DM Sans", ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        plugin(function ({ addUtilities, theme }) {
            addUtilities({
                ".filament-gradient": {
                    backgroundImage: `radial-gradient(
                        circle at top,
                        ${theme("colors.primary.800")},
                        ${theme("colors.gray.800")},
                        ${theme("colors.gray.900")} 100%
                    )`,
                },
            });
        }),
    ],
};
