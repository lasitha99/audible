<?php include('auth-functionality.php') ?>
<?php include('errors.php') ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../custom-css/custom-button.css">
    <link rel="stylesheet" href="../custom-css/custom-column.css">
    <link rel="stylesheet" href="../custom-css/custom-container.css">
    <link rel="stylesheet" href="../custom-css/custom-row.css">
    <link rel="stylesheet" href="../custom-css/custom-nav-bar.css">
    <link rel="stylesheet" href="../custom-css/custom-forms.css">
    <link rel="stylesheet" href="../custom-css/custom-grid.css">
    <link rel="stylesheet" href="../custom-css/custom-text.css">
    <link rel="stylesheet" href="../custom-css/custom-display.css">
    <link rel="stylesheet" href="../custom-css/custom-h-tags.css">
    <link rel="stylesheet" href="../custom-css/rounded-corners.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    <title>Audible.lk - Buyer registration</title>

    <style>
        .form-center-align {
            width: 800px;
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .form-control:focus {
            box-shadow: none !important;
            border: 2px solid #2563EB !important;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="form-center-align">

            <form id='registration_form' class="p-5 shadow  bg-white rounded" action="auth-functionality.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <img src="./img/buyer/signup.jpg" style="width:350px;">
                    </div>
                    <div class="col-md-6">

                        <div class="text-center">
                            <span>Sign Up to continue to:</span><br>
                            <span><b>Audible.lk</b></span>
                        </div><br>


                        <div class="row mb-1">
                            <div class="col-md-6">
                                <input placeholder="First name" type="text" class="input-text form-control form-control-sm border" id="form_firstName" name="first_name" required>
                                <div id="firstName_error_message" class="form-text error_form fontSize"></div>
                            </div>
                            <div class="col-md-6">
                                <input placeholder="Last name" type="text" class="input-text form-control form-control-sm border" id="form_lastName" name="last_name" required>
                                <div id="lastName_error_message" class="form-text error_form fontSize"></div>
                            </div>
                        </div>


                        <div class="row mb-1">
                            <div class="col">
                                <input placeholder="Email address" type="text" class="input-text form-control form-control-sm border" id="form_email" name="email" required>
                                <div id="email_error_message" class="form-text error_form fontSize"></div>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col">
                                <input placeholder="Address" type="text" class="input-text form-control form-control-sm border" id="form_address" name="address" required>
                                <div id="address_error_message" class="form-text error_form fontSize"></div>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col">
                                <input placeholder="Phone number" type="text" class="input-text form-control form-control-sm border" id="form_phone" name="phone" required>
                                <div id="phone_error_message" class="form-text error_form fontSize"></div>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col">
                                <input placeholder="New password" type="password" class="input-text form-control form-control-sm border" id="form_password" name="password" required>
                                <div id="password_error_message" class="form-text error_form fontSize"></div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <input placeholder="Confirm password" type="password" class="input-text form-control form-control-sm border" id="form_retype_password" name="confirm_password" required>
                                <div id="retype_password_error_message" class="form-text error_form fontSize"></div>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit" name="register_user" id="register">Sign Up</button>

                        </div>
                        <hr>
                        <div class="mt-3 text-center">
                            Already have a Buyer account?<a href="sign-in.php" style="text-decoration: none;"> Sign in</a>
                        </div>
                    </div>
                </div>
            </form><br>
            <div class="text-center">
                <small>By signing up, I accept the Audible.lk <a href="" style="text-decoration: none;">Terms of Service</a> and acknowledge the <a href="" style="text-decoration: none;">Privacy Policy.</a></small>
            </div><br><br>
            <hr>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>




    <script src="js/app.js" type="text/javascript"></script>
</body>

</html>