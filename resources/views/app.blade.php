<!DOCTYPE html>
<html lang="es">
    <head>
        <script type="application/ld+json">
        {
          "@context" : "http://schema.org",
          "@type" : "LocalBusiness",
          "name" : "Notaría Ordoño 16 Francisco Enrique Ledesma Muñiz",
          "telephone" : "(034) 987 96 86 06",
          "email" : "info@notariaordono16.es",
          "address" : {
            "@type" : "PostalAddress",
            "streetAddress" : "C/ Ordoño II 16 1º Dcha.",
            "addressLocality" : "León",
            "addressCountry" : "España",
            "postalCode" : "24001"
          },
          "openingHoursSpecification" : {
            "@type" : "OpeningHoursSpecification",
            "dayOfWeek" : {
              "@type" : "DayOfWeek",
              "name" : "Lunes a Vienes"
            }
          }
        }
        </script>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Notaría Ordoño 16 León - Francisco Enrique Ledesma Muñiz</title>

        <link rel="apple-touch-icon" sizes="57x57" href="/images/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/images/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/images/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/images/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/images/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/images/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/images/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/images/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/images/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/images/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
        <link rel="manifest" href="/images/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/images/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <!--<link href="{{ asset('/css/app.css') }}" rel="stylesheet">-->
        <!--<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">-->

        <!--[if lte IE 8]><script src="{{ asset('assets/js/ie/html5shiv.js') }}" ></script><![endif]-->
        <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
        <!--google Analytics -->    
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-71379938-1', 'auto');
          ga('send', 'pageview');

        </script>
        <!--Fin google Analytics -->    


        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
        <script src="{{asset('/js/jquery.min-2.1.3.js')}}"></script>

        <!--[if lte IE 8]><link rel="stylesheet" href="{{ asset('assets/css/ie8.css') }}" /><![endif]-->
        <meta name="Description" content="Notaría Dinámica que busca la máxima seguridad jurídica y eficiencia económica de las escrituras en ella otorgadas."/>
        <!-- Fonts -->
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="homepage">
        <div id="page-wrapper">

            <!-- Header -->
             @section('Header')
             @show
            <!-- Header Fin -->

            
            <!-- Main -->
             @section('Main')
             @show

            <!-- Main fin-->

<!-- Intro -->
             @section('Intro')
             @show
            <!-- Intro fin-->


            <!-- Highlights -->
             @section('Highlights')
             @show

            <!-- Highlights fin-->


            @section('content')
            @show

            <!-- Footer -->
                @section('Footer')
             @show

            <!-- Footer fin-->


        </div>

        <!-- Scripts -->

        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.dropotron.min.js') }}"></script>
        <script src="{{ asset('assets/js/skel.min.js') }}"></script>
        <script src="{{ asset('assets/js/skel-viewport.min.js') }}"></script>
        <script src="{{ asset('assets/js/util.js') }}"></script>
        <!--[if lte IE 8]><script src="{{ asset('assets/js/ie/respond.min.js') }}"></script><![endif]-->
        <script src="{{ asset('assets/js/main.js') }}"></script>


        <!--app <script src="{{ asset('/js/jquery.min-2.1.3.js') }}"></script>
        <script src="{{ asset('/js/bootstrap.min-3.3.1.js') }}"></script>-->
    </body>
</html>