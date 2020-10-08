const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
//for tailwind
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/css/app.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [tailwindcss('./tailwind.config.js')],
    });
//For bootstrap
mix
    .sass('resources/css/apptwo.scss', 'public/css')
mix
    .sass('resources/css/appthree.scss', 'public/css')



