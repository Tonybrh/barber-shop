const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css') // Se estiver usando Sass
    .postCss('resources/css/app.scss', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ]);
