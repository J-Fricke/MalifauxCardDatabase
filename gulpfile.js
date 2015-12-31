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

elixir(function(mix) {
    var bpath = 'node_modules/bootstrap-sass/assets';
    var jqueryPath = 'resources/assets/vendor/jquery';
    var jqueryTablesorterDistPath = 'resources/assets/vendor/jquery.tablesorter/dist';
    mix.sass('app.scss')
        .copy(jqueryPath + '/dist/jquery.min.js', 'public/js')
        .copy(jqueryTablesorterDistPath + '/js/jquery.tablesorter.min.js', 'public/js')
        .copy(jqueryTablesorterDistPath + '/css/theme.default.min.css', 'public/css')
        .copy(bpath + '/fonts', 'public/fonts')
        .copy(bpath + '/javascripts/bootstrap.min.js', 'public/js')
        .copy(bpath + '/javascripts/bootstrap.min.js', 'public/js')
    ;
});
