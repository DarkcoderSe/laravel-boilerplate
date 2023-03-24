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

    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="css/dark.css" type="text/css" />
    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

    <!-- Bootstrap File Upload CSS -->
    <link rel="stylesheet" href="css/components/bs-filestyle.css" type="text/css" />
    <link rel="stylesheet" href="css/components/select-boxes.css" type="text/css" />
    <!-- Bootstrap Select CSS -->
    <link rel="stylesheet" href="css/components/bs-select.css" type="text/css" />
    <!-- Date & Time Picker CSS -->
    <link rel="stylesheet" href="css/components/datepicker.css" type="text/css" />
    <link rel="stylesheet" href="css/components/timepicker.css" type="text/css" />

    <!-- Range Slider CSS -->
    <link rel="stylesheet" href="css/components/ion.rangeslider.css" type="text/css" />

    <!-- Star Rating CSS -->
    <link rel="stylesheet" href="css/components/bs-rating.css" type="text/css" />

    <!-- Bootstrap Switch CSS -->
    <link rel="stylesheet" href="css/components/bs-switches.css" type="text/css" />

    <link rel="stylesheet" href="css/custom.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Document Title
	============================================= -->
    <title>Backpack | Checkout</title>


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
                        <div class="col-lg-6 col-md-6">


                            <div class="card glass-bg">
                                <div class="card-header mt-3">
                                    <h3 class="mb-0">Payment Method</h3>
                                </div>
                                <div class="p-4">

                                    <div class="tabs clearfix" id="tab-3">

                                        <ul class="tab-nav tab-nav2 clearfix cine-tab-nav">
                                            <li><a href="#tabs-9">Credit Card</a></li>
                                            <li><a href="#tabs-10">PayPal</a></li>
                                            <li><a href="#tabs-11">FPX</a></li>
                                        </ul>

                                        <div class="tab-container">

                                            <div class="tab-content clearfix pt-4" id="tabs-9">
                                                <div class="card-wrap mb-5">
                                                    <div class="row justify-content-center">
                                                        <div class="col-md-6">
                                                            <img src="images/card-visa.png">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-wrap">

                                                    <form class="mb-0" id="payment-creditcard" name="payment-creditcard"
                                                        action="/checkout/pay" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">

                                                            <div class="col-12 bottommargin-sm">
                                                                <label for="credit-card-number">Credit Card
                                                                    Number</label>
                                                                <input type="text" id="credit-card-number"
                                                                    name="credit-card-number" value=""
                                                                    class="form-control required"
                                                                    placeholder="Please enter your credit card number" />
                                                            </div>

                                                            <div class="col-6 bottommargin-sm">
                                                                <label for="valid-date">Valid Date</label>
                                                                <input type="text" name="valid-date" id="valid-date"
                                                                    class="form-control required" value=""
                                                                    placeholder="YY/MM">
                                                            </div>

                                                            <div class="col-6 bottommargin-sm">
                                                                <label for="cvv">CVV</label>
                                                                <input type="password" id="cvv" name="cvv" value=""
                                                                    class="form-control" placeholder="CVV Number" />
                                                            </div>

                                                            <input type="hidden" name="plan_id" value= "{{ app('request')->input('subscription_package') }}" />

                                                            <div class="col-12">
                                                                <button type="submit" name="template-contactform-submit"
                                                                    class="button button-circle btn-block button-xlarge cine-btn">Submit</button>
                                                            </div>

                                                        </div>

                                                    </form>

                                                </div>
                                            </div>
                                            <div class="tab-content clearfix pt-4" id="tabs-10">
                                                <div class="card-wrap mb-5">
                                                    <div class="row justify-content-center">
                                                        <div class="col-md-6">
                                                            <img src="images/card-pp.png">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-wrap">

                                                    <form class="mb-0" id="payment-paypal" name="payment-paypal"
                                                        action="#" method="post" enctype="multipart/form-data">

                                                        <div class="row">

                                                            <div class="col-12 bottommargin-sm">
                                                                <label for="email-address">Email Address</label>
                                                                <input type="email" id="email-address"
                                                                    name="email-address" value=""
                                                                    class="form-control required"
                                                                    placeholder="Please enter your email address" />
                                                            </div>

                                                            <div class="col-12 bottommargin-sm">
                                                                <label for="password">Password</label>
                                                                <input type="password" name="password" id="password"
                                                                    class="form-control required" value=""
                                                                    placeholder="Please entry your paypal password">
                                                            </div>

                                                            <div class="col-12">
                                                                <button type="submit" name="template-contactform-submit"
                                                                    class="button button-circle btn-block button-xlarge cine-btn">Submit</button>
                                                            </div>

                                                        </div>

                                                    </form>

                                                </div>
                                            </div>
                                            <div class="tab-content clearfix pt-4" id="tabs-11">
                                                <div class="form-wrap">

                                                    <form class="mb-0" id="payment-fpx" name="payment-fpx" action="#"
                                                        method="post" enctype="multipart/form-data">

                                                        <div class="row bottommargin-sm">

                                                            <div class="col-md-4">
                                                                <div class="form-check mb-2">
                                                                    <div class="radio-wrap">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="fpx-radio" id="fpx-label1"
                                                                            value="Paypal">
                                                                        <label class="form-check-label radio-wrap"
                                                                            for="fpx-radio-label1">
                                                                            <img src="images/bank/bank-maybank.png">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-check mb-2">
                                                                    <div class="radio-wrap">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="fpx-radio" id="fpx-label2"
                                                                            value="Credit Card">
                                                                        <label class="form-check-label radio-wrap"
                                                                            for="fpx-radio-label2">
                                                                            <img src="images/bank/bank-hsbc.png">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-check mb-2">
                                                                    <div class="radio-wrap">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="fpx-radio" id="fpx-label3"
                                                                            value="Credit Card">
                                                                        <label class="form-check-label radio-wrap"
                                                                            for="fpx-radio-label3">
                                                                            <img src="images/bank/bank-hlb.png">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-check mb-2">
                                                                    <div class="radio-wrap">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="fpx-radio" id="fpx-label4"
                                                                            value="Paypal">
                                                                        <label class="form-check-label radio-wrap"
                                                                            for="fpx-radio-label4">
                                                                            <img src="images/bank/bank-ocbc.png">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-check mb-2">
                                                                    <div class="radio-wrap">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="fpx-radio" id="fpx-label5"
                                                                            value="Credit Card">
                                                                        <label class="form-check-label radio-wrap"
                                                                            for="fpx-radio-label5">
                                                                            <img src="images/bank/bank-public.png">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-check mb-2">
                                                                    <div class="radio-wrap">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="fpx-radio" id="fpx-label6"
                                                                            value="Credit Card">
                                                                        <label class="form-check-label radio-wrap"
                                                                            for="fpx-radio-label6">
                                                                            <img src="images/bank/bank-affin.png">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-check mb-2">
                                                                    <div class="radio-wrap">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="fpx-radio" id="fpx-label7"
                                                                            value="Paypal">
                                                                        <label class="form-check-label radio-wrap"
                                                                            for="fpx-radio-label7">
                                                                            <img src="images/bank/bank-rhb.png">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-check mb-2">
                                                                    <div class="radio-wrap">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="fpx-radio" id="fpx-label8"
                                                                            value="Credit Card">
                                                                        <label class="form-check-label radio-wrap"
                                                                            for="fpx-radio-label8">
                                                                            <img src="images/bank/bank-public.png">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-check mb-2">
                                                                    <div class="radio-wrap">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="fpx-radio" id="fpx-label9"
                                                                            value="Credit Card">
                                                                        <label class="form-check-label radio-wrap"
                                                                            for="fpx-radio-label9">
                                                                            <img src="images/bank/bank-affin.png">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12 mt-4">
                                                                <button type="submit" name="template-contactform-submit"
                                                                    class="button button-circle btn-block button-xlarge cine-btn">Submit</button>
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
    <script src="js/jquery.js"></script>
    <script src="js/plugins.min.js"></script>

    <!-- Bootstrap File Upload Plugin -->
    <script src="js/components/bs-filestyle.js"></script>

    <!-- Select-Boxes Plugin -->
    <script src="js/components/select-boxes.js"></script>

    <!-- Bootstrap Select Plugin -->
    <script src="js/components/bs-select.js"></script>


    <!-- Footer Scripts
	============================================= -->
    {{-- <script src="js/functions.js"></script> --}}


</body>

</html>
