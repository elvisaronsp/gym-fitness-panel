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
    //mix.sass('app.scss');
    ///fancybox/source/jquery.fancybox.css
    mix.styles([
        'front/bootstrap/css/bootstrap.min.css',
        'front/plugins/font-awesome/css/font-awesome.css',
        'front/css/style1.css',
        'front/css/brand-font.css',
        'front/css/hovereffect.css',
        'front/css/hover.css',
        'front/plugins/owl-carousel/owl.carousel.css',
        'front/plugins/owl-carousel/owl.theme.css',
        'front/plugins/bootstrap-select/bootstrap-select.css',
        'front/plugins/fancybox/jquery.fancybox.css',
        'front/plugins/layerslider/css/layerslider.css'
    ]);
    
    mix.scripts([
        'front/jquery/jquery.js',
        'front/bootstrap/bootstrap.min.js',
        'front/owl-carousel/owl.carousel.js',
        'front/counter/jquery.countTo.js',
        'front/bootstrap-select/bootstrap-select.js',
        'front/fancybox/lib/jquery.mousewheel-3.0.6.pack.js',
        'front/fancybox/source/jquery.fancybox.pack.js',
	'front/layerslider/js/greensock.js',
	'front/layerslider/js/layerslider.transitions.js',
	'front/layerslider/js/layerslider.kreaturamedia.jquery.js',
        'front/backstretch/jquery.backstretch.min.js',
        
        'front/app/app.js'
    ]);
    
     mix.version([
         'css/all.css',
         'js/all.js'
     ]);
    
});
