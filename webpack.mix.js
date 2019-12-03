let mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

    mix.sass('resources/sass/app.scss', 'public/css')
    .options({
        postCss: [
            require('postcss-css-variables')()
        ]
    });

    mix.js('resources/js/app.js', 'public/js')
    .version();

    mix.js('resources/js/app.js', 'public/js');

if (mix.inProduction()) {
    mix.version();
}

mix.browserSync('localhost/intranet/public/');