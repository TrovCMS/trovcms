const mix = require("laravel-mix");

mix.disableNotifications();

mix.js("resources/js/app.js", "public/js")
    .postCss("resources/css/app.css", "public/css", [
        require("tailwindcss/nesting"),
        require("tailwindcss"),
        require("autoprefixer"),
    ])
    .postCss("resources/css/filament/filament.css", "public/css", [
        require("tailwindcss/nesting"),
        require("tailwindcss")("./resources/css/filament/tailwind.config.js"),
        require("autoprefixer"),
    ])
    .options({
        processCssUrls: false,
    });
