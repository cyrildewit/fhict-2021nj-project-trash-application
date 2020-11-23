const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/front/js/app.js', 'public/front/js')
    .styles(['resources/front/css/style.css'], 'public/front/css/style.css')
    .copy('resources/front/images', 'public/front/images');
