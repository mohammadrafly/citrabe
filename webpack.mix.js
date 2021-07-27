const mix = require('laravel-mix');
const path = 'resources/';

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

/*mix.autoload({ 
    
    'popper.js/dist/umd/popper.js': ['Popper', 'window.Popper'],

});*/

mix.styles([
    path + 'css/core.css',
    path + 'fonts/feather-font/css/iconfont.css',
    path + 'vendors/flag-icon-css/css/flag-icon.min.css',
    path + 'css/style.css',
    path + 'css/app.css',
], 'public/css/app.css');

mix.js([
    path + 'js/init.js',

], 'public/js/app.js');

