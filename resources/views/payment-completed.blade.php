<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
	============================================= -->
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,300;0,400;0,700;0,800;0,900;1,300;1,400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="/style.css" type="text/css" />
    <link rel="stylesheet" href="/css/dark.css" type="text/css" />
    <link rel="stylesheet" href="/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="/css/magnific-popup.css" type="text/css" />

    <!--  Pricing Tables Style  -->
    <link rel="stylesheet" href="/css/components/pricing-table.css" type="text/css" />

    <link rel="stylesheet" href="/css/materialize.css" type="text/css" />

    <link rel="stylesheet" href="/css/custom.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Document Title
	============================================= -->
    <title>Backpack | Payment Completed</title>


</head>

<body class="stretched body-dark">

    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="clearfix">


        <!-- Content
		============================================= -->
        <section id="content">

            <div class="content-wrap body-dark dark">
                <div class="container clearfix">

                <h4 class="pricing-section--title center">{{$message}} </h4>
                @if($status)
                    <h2 class="pricing-section--title center">Thank you</h2>

                    <h4 class="pricing-section--title center">You may login into the app now</h4>
                @endif
                </div>
            </div>
        </section><!-- #content end -->
    </div><!-- #wrapper end -->

    <!-- Go To Top
	============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- JavaScripts
	============================================= -->
    <script src="/js/jquery.js"></script>
    <script src="/js/plugins.min.js"></script>
    <script src="/js/materialize.min.js"></script>


    <!-- Footer Scripts
	============================================= -->
    {{-- <script src="/js/functions.js"></script> --}}



</body>

</html>
