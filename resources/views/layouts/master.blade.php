<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([ 'csrfToken' => csrf_token() ]); ?>
    </script>

    <!-- MathJax -->
    <script type="text/x-mathjax-config">
        MathJax.Hub.Config({
          tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
        });
    </script>
    <script type="text/javascript" async src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML"></script>
    <script type="text/x-mathjax-config">
        MathJax.Hub.Register.StartupHook("TeX Jax Ready",function () {
            var TEX = MathJax.InputJax.TeX;
            var PREFILTER = TEX.prefilterMath;
            TEX.Augment({
                prefilterMath: function (math,displaymode,script) {
                    math = "\\displaystyle{"+math+"}";
                    return PREFILTER.call(TEX,math,displaymode,script);
                }
            });
        });
    </script>
</head>
<body>
    @include('partials.nav')
    <div class="container">
        <div class="row">
            @yield('breadcrumbs')
            @include('partials.alerts')
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
