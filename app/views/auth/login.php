<head>
    <link rel="stylesheet" href="./web/css/login.css">
</head>

<body>
    <?php include_once('app/views/header.php'); ?>
    <div class="logo text-center">
        <h1>Timetable Management</h1>
    </div>
    <div class="wrapper">
        <div class="inner-warpper text-center">
            <h2 class="title">Login to your account</h2>
            <form action="" method="POST" id="formvalidate">
                <div class="input-group">
                    <label class="placeholder" for="userName">User Name</label>
                    <input class="form-control" name="username" id="username" type="text" placeholder="" value='' />
                    <span class="lighting"></span>
                </div>
                <div class="input-group">
                    <label class="placeholder" for="password">Password</label>
                    <input class="form-control" name="password" id="password" type="password" placeholder="" value='' />
                    <span class="lighting"></span>
                </div>

                <button type="submit" id="login">Login</button>
                <div class="clearfix supporter">
                    <div class="pull-left remember-me">
                        <input id="rememberMe" type="checkbox">
                        <label for="rememberMe">Remember Me</label>
                    </div>
                    <a class="forgot pull-right" href="./?controller=auth&action=request">Forgot Password?</a>
                </div>
            </form>
        </div>
        <div class="signup-wrapper text-center">
            <a href="#"><i>Don't have an account?</i><span class="text-primary">Create One</span></a>
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