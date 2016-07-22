<!DOCTYPE html>
<html>  
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="description" content="{{ $pageDescription or '' }}">
        @if (isset($pageKeywords) && strlen($pageKeywords))
        <meta name="keywords" content="{{ $pageKeywords }}">
        @endif
        <title>{{ $pageTitle or '' }}</title>
        
        @include('front.partials.ogMetaTags')
        
        <meta name="robots" content="index, follow">
        <link rel="icon" type="image/png" href="{{ url('favicon-wmp.png') }}"/>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:regular,700,600&amp;latin" type="text/css" />
        <link href='https://fonts.googleapis.com/css?family=Kotta+One&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ url(elixir('css/all.css')) }}">

        <!-- JS Library -->
        <script>
        var baseUrl = "{{ url('/') }}/";
        </script>
        <script src="{{ url(elixir('js/all.js')) }}"></script>
        
        @if (env('APP_ENV') == 'production')
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-40633462-3', 'auto');
          ga('send', 'pageview');

        </script>
        @endif
        
        <script>
        $(function() {
            var pos = $(window).scrollTop();
            var headerBarTimeout = 250;
            var headerBarHeight = $('#header-bar').outerHeight();
            $(window).scroll(function() {
                var newPos = $(window).scrollTop();
                if (newPos > pos && newPos > headerBarHeight) {
                    setTimeout(function() {
                        $('header').removeClass('navbar-fixed-top');
                        $('header').hide();
                    }, headerBarTimeout);
                } else {
                    setTimeout(function() {
                        $('header').show();
                        $('header').addClass('navbar-fixed-top');
                    }, headerBarTimeout);
                }
                pos = newPos;
            });
            
            // ==================Counter====================
            $('.item-count').countTo({
                formatter: function (value, options) {
                    return value.toFixed(options.decimals);
                },
                onUpdate: function (value) {
                    //console.debug(this);
                },
                onComplete: function (value) {
                    //console.debug(this);
                }
            });
            
        });
        
        </script>
        
    </head>
    <body>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.6&appId=1674381902812143";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        
        
        <div class="wrapper">
            <header id="header-bar" class="navbar navbar-default navbar-fixed-top navbar-top">
                <div class="container">
                    <div class="navbar-header">
                        <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="{{ url('/') }}" class="navbar-brand" title="Wymyśl prezent na każdą okazję i dla każdego - wyjątkowe i zawsze udane prezenty"><span class="logo brand-font"><img src="{{ url('present-single.png') }}" class="header-logo" alt="Wymyśl prezent na każdą okazję i dla każdego - wyjątkowe i zawsze udane prezenty"> wymyslprezent.pl</span></a>
                    </div>

                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            
                            <li class="new-ads"><a href="{{ route('front.kodyrabatowe.index') }}" class="btn btn-ads btn-block" title="Darmowe kody rabatowe">KODY RABATOWE</a></li>
                            <!--
                            <li><a href="{{ url('/') }}">Załóż konto</a></li>
                            -->
                            <li><a href="{{ route('front.subpage.misja') }}" title="Nasza misja">Misja</a></li>
                            <li><a href="{{ route('front.blog.article.index') }}" title="BLOG"><b>BLOG</b></a></li>
                            <li><a href="{{ route('front.subpage.kontakt') }}" title="Strona kontaktowa">Kontakt</a></li>
                            <!--
                            <li class="dropdown">
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-user"></i> <strong class="caret"></strong>&nbsp;</a>
                                <div class="dropdown-menu dropdown-login" style="padding:15px;min-width:250px">
                                    <form>                       
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon addon-login"><i class="fa fa-user"></i></span>
                                                <input type="text" placeholder="Username or email" required="required" class="form-control input-login">                                            
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon addon-login"><i class="addon fa fa-lock"></i></span>
                                                <input type="password" placeholder="Password" required="required" class="form-control input-login">                                            
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label class="string optional" for="user_remember_me">
                                                    <input type="checkbox" id="user_remember_me" style="">
                                                    Remember me
                                                </label>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-custom btn-block" value="Sign In">
                                        <a href="forgot_password.html" class="btn-block text-center">Forgot password?</a>
                                    </form>                                    
                                </div>
                            </li>
                            -->
                        </ul>
                    </div>
                </div>
            </header>
            @if (isset($sliderIsActive) && true === $sliderIsActive)
                @include('front.slider.mainPage');
            @elseif (!isset($disableBlog) && in_array(Route::currentRouteName(), ['front.blog.article.show']))
                @include('front.article.header')
            @else
                <section class="category-search">
                    <div class="container text-center">
                        <b class="hero-title brand-font" style="display: inline-block; font-size: 20px; color:#f04705; margin-bottom: 15px">Zobacz uśmiech na twarzy ukochanej osoby</b>
                        <p class="hero-description hidden-xs" style="color:#000">Skorzystaj z naszej oferty i zyskaj pewność udanego prezentu.</p>
                    </div>
                </section>
            @endif
            
            @yield('content')

    @include('front.partials.counter')
            
    <div class="footer">
        <div class="container">
        <ul class="pull-left footer-menu">
            <li>
                <a href="{{ url('/') }}" title="Pomysły na prezent"> Strona główna </a>
                <a href="{{ route('front.kodyrabatowe.index') }}" title="Darmowe kody rabatowe"> Kody rabatowe </a>
                <a href="{{ route('front.subpage.misja') }}" title="Nasza misja"> Misja </a>
                <a href="{{ route('front.blog.article.index') }}" title="BLOG"> <b>BLOG</b> </a>
                <a href="{{ route('front.subpage.kontakt') }}" title="Strona kontaktowa"> Kontakt </a>
            </li>
        </ul>
        <ul class="pull-right footer-menu">
            <li> 2016 wymyslprezent.pl </li>
        </ul>
        </div>
    </div>
</div>
</body>
</html> 