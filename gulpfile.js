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
    elixir(function (mix) {
        mix.sass('app.scss', 'public/assets/css/app.css')
            .browserify('app.js', 'public/assets/js/app.js');
    });
    // Version the selected files
    mix.version(['public/assets/css/app.css', 'public/assets/js/app.js']);
});
