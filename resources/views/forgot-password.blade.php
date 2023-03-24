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

    <link rel="stylesheet" href="/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="/style.css" type="text/css" />
    <link rel="stylesheet" href="/css/dark.css" type="text/css" />
    <link rel="stylesheet" href="/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="/css/magnific-popup.css" type="text/css" />

    <!-- Bootstrap File Upload CSS -->
    <link rel="stylesheet" href="/css/components/bs-filestyle.css" type="text/css" />
    <link rel="stylesheet" href="/css/components/select-boxes.css" type="text/css" />
    <!-- Bootstrap Select CSS -->
    <link rel="stylesheet" href="/css/components/bs-select.css" type="text/css" />
    <!-- Date & Time Picker CSS -->
    <link rel="stylesheet" href="/css/components/datepicker.css" type="text/css" />
    <link rel="stylesheet" href="/css/components/timepicker.css" type="text/css" />

    <!-- Range Slider CSS -->
    <link rel="stylesheet" href="/css/components/ion.rangeslider.css" type="text/css" />

    <!-- Star Rating CSS -->
    <link rel="stylesheet" href="/css/components/bs-rating.css" type="text/css" />

    <!-- Bootstrap Switch CSS -->
    <link rel="stylesheet" href="/css/components/bs-switches.css" type="text/css" />

    <link rel="stylesheet" href="/css/materialize.css" type="text/css" />

    <link rel="stylesheet" href="/css/custom.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Document Title
	============================================= -->
    <title>Backpack | Forgot Password</title>


</head>

<body class="stretched body-dark">

    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="clearfix">


        <!-- Content
		============================================= -->
        <section id="content">

            <div class="content-wrap body-dark dark">

                <div class="container">

                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-6">
                            <div class="card glass-bg">
                                <div class="card-header">
                                    <h4 class="mb-0">Enter email to reset password</h4>
                                </div>
                                <div class="card-body">
                                @isset($message)
                                    <div class="card-header" style="color:green">{{$message}}</div>
                                @endisset
                                    <div class="form-widget">

                                        <form class="mb-0" action="forgot-password" method="POST">
                                            @csrf
                                            <div class="row" style="color:white">

                                                <div class="col-12">
                                                    <div class="input-field">
                                                        <input name="email" type="text" id="email-name-field"
                                                            class="autocomplete white-input">
                                                        <label for="email-name-field">Email</label>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <button type="submit"
                                                        class="button button-circle btn-block button-xlarge cine-btn">Enter</button>
                                                </div>

                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
