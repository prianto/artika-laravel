let mix = require('laravel-mix');

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

mix
  .copy('resources/assets/js/slideout/slideout.min.js', 'public/js')
  .copy('resources/assets/js/siema/siema.min.js', 'public/js')

  .js('resources/assets/js/clean-blog.js', 'public/js')

  .sass('resources/assets/sass/bootstrap/bootstrap.scss', 'public/css')
  .sass('resources/assets/sass/font-awesome/font-awesome.scss', 'public/css')
  .sass('resources/assets/sass/clean-blog/clean-blog.scss', 'public/css')
;
