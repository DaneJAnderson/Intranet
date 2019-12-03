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
    mix.sass('app.scss');
});

var gulp = require('gulp'),
watch = require('gulp-watch'),
browserSync = require('browser-sync').create();

gulp.task('watch', function() {

    browserSync.init(null, {
        notify: false,
        proxy: 'localhost/intranet/public/',
        open: false,
        files: [
                'app/**/*.php',
                'resources/views/**/*.php',
                'public/js/**/*.js',
                'public/css/**/*.css'
        ],
        watchOptions: {
                usePolling: true,
                interval: 500
        }
    });

    watch('./resources/**/*.php', function() {
        browserSync.reload();
    });
});
