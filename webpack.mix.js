const mix = require('laravel-mix');

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
/*
mix.copy('node_modules/bootstrap', 'public/js/bootstrap');
mix.copy('node_modules/jquery', 'public/js/jquery');
mix.copy('node_modules/jquery.easing/jquery.easing.js', 'public/js/jquery-easing.js');
mix.copy('node_modules/startbootstrap-sb-admin-2/', 'public/sb-admin-2/');

mix.js(['node_modules/jquery/dist/jquery.js'],
      'resources/js/app.js', 'public/js',)
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/dashboard.scss', 'public/css')
   .sass('resources/sass/new.scss', 'public/css');
*/
const tailwindcss = require('tailwindcss')

mix.sass('resources/sass/app.scss', 'public/css')
  .options({
    processCssUrls: false,
    postCss: [ tailwindcss('./tailwind.config.js') ],
  })