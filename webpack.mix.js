const mix = require('laravel-mix');
require('laravel-mix-purgecss');
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/pages/*.js','public/pages.js')
    .copyDirectory('resources/img','public/img')
    .copyDirectory('resources/errors','public/frontend/errors')
    .sass('resources/sass/app.scss', 'public/css')
    .purgeCss({
    enabled: false,
});
