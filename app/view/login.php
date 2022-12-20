<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <style>
        body {
            background: #f2f2f2;
        }
        
        .animate {
            -webkit-transition: all 0.3s linear;
            transition: all 0.3s linear;
        }
        
        .text-center {
            text-align: center;
        }
        
        .pull-left {
            float: left;
        }
        
        .pull-right {
            float: right;
        }
        
        .clearfix:after {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: " ";
            clear: both;
            height: 0;
        }
        
        .clearfix {
            display: inline-block;
        }
        /* start commented backslash hack \*/
        
        * html .clearfix {
            height: 1%;
        }
        
        .clearfix {
            display: block;
        }
        /* close commented backslash hack */
        
        a {
            color: #00A885;
        }
        
        a:hover,
        a:focus {
            color: #00755d;
            -webkit-transition: all 0.3s linear;
            transition: all 0.3s linear;
        }
        
        .text-primary {
            color: #00A885;
        }
        
        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 1000px white inset !important;
        }
        
        .logo h1 {
            margin-top:70px;
            color: #00A885;
            font-size:xxx-large;
            margin-bottom: 30px;
        }
        
        input[type="checkbox"] {
            width: auto;
        }
        
        button {
            cursor: pointer;
            background: #00A885;
            width: 100%;
            border: 0;
            padding: 10px 15px;
            color: #fff;
            font-size: 20px;
            -webkit-transition: 0.3s linear;
            transition: 0.3s linear;
        }
        
        span.validate-tooltip {
            background: #D91717;
            width: 100%;
            display: block;
            padding: 5px;
            color: #fff;
            box-sizing: border-box;
            font-size: 14px;
            margin-top: -28px;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            -webkit-animation: tooltipanimation 0.3s 1;
            animation: tooltipanimation 0.3s 1;
        }
        
        .input-group {
            position: relative;
            margin-bottom: 20px;
        }
        
        .input-group label {
            position: absolute;
            top: 9px;
            left: 10px;
            font-size: 16px;
            color: #cdcdcd;
            font-weight: normal;
            padding: 2px 5px;
            z-index: 5;
            -webkit-transition: all 0.3s linear;
            transition: all 0.3s linear;
        }
        
        .input-group input {
            outline: none;
            display: block;
            width: 100%;
            height: 40px;
            position: relative;
            z-index: 3;
            border: 1px solid #d9d9d9;
            padding: 10px 10px;
            background: #ffffff;
            box-sizing: border-box;
            font-weight: 400;
            -webkit-transition: 0.3s ease;
            transition: 0.3s ease;
        }
        
        .input-group .lighting {
            background: #00A885;
            width: 0;
            height: 2px;
            display: inline-block;
            position: absolute;
            top: 40px;
            left: 0;
            -webkit-transition: all 0.3s linear;
            transition: all 0.3s linear;
        }
        
        .input-group.focused .lighting {
            width: 100%;
        }
        
        .input-group.focused label {
            background: #fff;
            font-size: 12px;
            top: -8px;
            left: 5px;
            color: #00A885;
        }
        
        .input-group span.validate-tooltip {
            margin-top: 0;
        }
        
        .wrapper {
            width: 500px;
            background: #fff;
            margin: 20px auto;
            min-height: 200px;
            border: 1px solid #f3f3f3;
        }
        
        .wrapper .inner-warpper {
            padding: 50px 30px 60px;
            box-shadow: 1px 1.732px 10px 0px rgba(0, 0, 0, 0.063);
        }
        
        .wrapper .title {
            margin-top: 0;
        }
        
        .wrapper .supporter {
            margin-top: 10px;
            font-size: 14px;
            color: #8E8E8E;
            cursor: pointer;
        }
        
        .wrapper .remember-me {
            cursor: pointer;
        }
        
        .wrapper input[type="checkbox"] {
            float: left;
            margin-right: 5px;
            margin-top: 2px;
            cursor: pointer;
        }
        
        .wrapper label[for="rememberMe"] {
            cursor: pointer;
        }
        
        .wrapper .signup-wrapper {
            padding: 10px;
            font-size: 14px;
            background: #EBEAEA;
        }
        
        .wrapper .signup-wrapper a {
            text-decoration: none;
            color: #7F7F7F;
        }
        
        .wrapper .signup-wrapper a:hover {
            text-decoration: underline;
        }
        
        @-webkit-keyframes tooltipanimation {
            from {
                margin-top: -28px;
            }
            to {
                margin-top: 0;
            }
        }
        
        @keyframes tooltipanimation {
            from {
                margin-top: -28px;
            }
            to {
                margin-top: 0;
            }
        }
    </style>
</head>

<body>

    <div class="logo text-center">
        <h1>Timetable Management</h1>
    </div>
    <div class="wrapper">
        <div class="inner-warpper text-center">
            <h2 class="title">Login to your account</h2>
            <form action="" method="POST" id="formvalidate">
                <div class="input-group">
                    <label class="placeholder" for="userName">User Name</label>
                    <input class="form-control" name="username" id="username" type="text" placeholder="" value =''/>
                    <span class="lighting"></span>
                </div>
                <div class="input-group">
                    <label class="placeholder" for="password">Password</label>
                    <input class="form-control" name="password" id="password" type="password" placeholder="" value=''/>
                    <span class="lighting"></span>
                </div>

                <button type="submit" id="login">Login</button>
                <div class="clearfix supporter">
                    <div class="pull-left remember-me">
                        <input id="rememberMe" type="checkbox">
                        <label for="rememberMe">Remember Me</label>
                    </div>
                    <a class="forgot pull-right" href="#">Forgot Password?</a>
                </div>
            </form>
        </div>
        <div class="signup-wrapper text-center">
            <a href="#"><i>Don't have an account? </i><span class="text-primary">Create One</span></a>
        </div>
    </div>

    <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js'></script>
    <script>
        + function($) {
            $('.placeholder').click(function() {
                $(this).siblings('input').focus();
            });

            $('.form-control').focus(function() {
                $(this).parent().addClass("focused");
            });

            $('.form-control').blur(function() {
                var $this = $(this);
                if ($this.val().length == 0)
                    $(this).parent().removeClass("focused");
            });
            $('.form-control').blur();

            // validetion
            $.validator.setDefaults({
                errorElement: 'span',
                errorClass: 'validate-tooltip'
            });

            $("#formvalidate").validate({
                rules: {
                    userName: {
                        required: true,
                        minlength: 3
                    },
                    password: {
                        required: true,
                        minlength: 6
                    }
                },
                messages: {
                    userName: {
                        required: "Please enter your username.",
                        minlength: "Please provide valid username."
                    },
                    password: {
                        required: "Enter your password to Login.",
                        minlength: "Incorrect login or password."
                    }
                }
            });

        }(jQuery);
    </script>

</body>

</html>