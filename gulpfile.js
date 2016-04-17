var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    // Combine the selected JS files
    mix.scripts([
        '../../../bower_components/jquery/dist/jquery.js',
        '../../../bower_components/bootstrap/dist/js/bootstrap.js',
        '../../../bower_components/bootstrap/dist/js/npm.js',
    ], 'public/assets/js');
    mix.sass(['app.scss', '../../../bower_components/bootstrap-sass/assets/stylesheets/_bootstrap.scss'], 'public/assets/css');

    // Version the selected files
    mix.version(['assets/css/app.css', 'assets/js/all.js']);
});
