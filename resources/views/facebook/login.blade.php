<!DOCTYPE html>
<html>
    <head>
        <title>GeoComplete</title>
        <meta charset="UTF-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/styles.css') }}" />
        <style>
            
            .center_div {
                position: absolute;
                
                top: 45%;
            }
        </style>
    </head>
    <body style="background: #000;">
        <div class="form-group " style="margin-top:10px">
            <!-- Button -->
            <div class="col-sm-12 controls text-center center_div">
                <a class="btn btn-primary btn-facebook" href="{{ url('auth/facebook') }}" id="btn-fblogin">
                    <i class="fa fa-facebook"></i> Login with Facebook
                </a>
            </div>
        </div>

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </body>
</html>

