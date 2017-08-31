<!DOCTYPE html>
<html>
    <head>
        <title>GeoComplete</title>
        <meta charset="UTF-8">
        <script type="text/javascript" src="https://js.stripe.com/v1/"></script>
        <!-- Fonts -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/styles.css') }}" />
        <style>
            body {
                font-family: 'Lato';
            }
            .fa-btn {
                margin-right: 6px;
            }
        </style>

    </head>
    <body id="app-layout">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        Simple project
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ session('username') }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <!-- -------------------body ------------------ -->
        <div class="container">
            <form  class="form-inline">
                <div class="form-group">
                    <label for="usr" >Search within places:</label>
                    <input id="geocomplete" type="text" class="form-control" placeholder="Type in an address" size="90" />

                </div>

            </form>

            <div class="map_canvas"></div>    
        </div>



        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(null !=session('message'))
                    <div class="alert alert-success">
                        <ul>
                            {{ session('message') }}
                        </ul>
                    </div>
                    @endif
                    <!-- to display errors returned by createToken -->

                    <form action="{{ url('checkout') }}" method="POST" id="payment-form">
                        {{ csrf_field() }}
                        <label>Enter Amount Due:</label>
                        <center>
                            <div class="form-group">

                                <label for="donationAmt"
                                       style="float:left; font-size: 22px;margin-top: 1.2%;">$</label>
                                <input
                                    class="form-control"
                                    type="number"
                                    name="donationAmt"
                                    id="custom-donation-amount"


                                    style="width:90%"
                                    min="0"
                                    step="10.01"

                                    />

                            </div>


                            <!-- data-image="images/button.png" -->
                            <script src="https://checkout.stripe.com/checkout.js"
                                    class="stripe-button"
                                    data-key="pk_test_KNKzERBbQsLTSZEvyiHTLV9b"
                                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                    data-name="usqtech.com"
                                    data-label="Pay with Card"
                                    data-description="Fund"
                                    data-amount="0">
                            </script>

                            <script type="text/javascript">
                                $(function () {
                                    $('.donate-button').click(function (event) {
                                        var amount = $('#custom-donation-amount').val();
                                        $('.stripe-button').attr('data-amount', amount)
                                    });
                                });
                            </script>

                        </center>
                    </form>
                </div>
            </div>
        </div>



        <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&key=AIzaSyAmvbHlI9_qhril98HVMD-G84StgSyHt3o"></script>
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script src="{{ asset('public/js/jquery.geocomplete.js') }}"></script>
        <script src="https://js.stripe.com/v3/"></script>
        <script src="https://js.stripe.com/v2/"></script>

        <script>
                                $(function () {

                                    var options = {
                                        map: ".map_canvas",
                                        location: "Egypt"
                                    };

                                    $("#geocomplete").geocomplete(options);

                                });
        </script>
        <script>
            function setTwoNumberDecimal() {
                $('#custom-donation-amount').val(parseFloat($('#custom-donation-amount').val()).toFixed(2));
            }
        </script>

    </body>
</html>

