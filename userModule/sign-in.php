<?php include('auth-functionality.php') ?>
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

    <title>Audible.lk - Sign In</title>

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
            box-shadow: none;
            border: 2px solid #2563EB;
        }
    </style>

</head>

<body>

    <div class="container">
        <div class="form-center-align">

            <form class="p-5 shadow  bg-white rounded" action="auth-functionality.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <img src="./img/buyer/signin.jpg" style="height: 400px;">
                    </div>
                    <div class="col-md-6">
                        <div class="text-center">
                            <span>Sign in to continue to:</span><br>
                            <span><b>Audible.lk</b></span>
                        </div><br>
                        <div class="row mb-2">
                            <div class="col">
                                <input placeholder="Enter email address" type="email" class="input-text form-control form-control" name="email" required="required" autofocus />
                            </div>
                        </div>
                        <div class="row mb-2 mt-3">
                            <div class="col">
                                <input placeholder="Enter password" type="password" class="input-text form-control form-control" name="password" required="required" />
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <button class="btn btn-primary" type="submit" name="login_user">Sign in</button>
                        </div>
                        <hr>
                        <div class="mt-3 text-center">
                            <a href="sign-up.php" style="text-decoration: none;">Sign up for an account</a>
                        </div>
                    </div>
                </div>
            </form> <br>

            <div class="text-center">
                <a href="sign-up.php" style="text-decoration: none;"><small>Privacy Policy •</small></a>
                <a href="forgot-password.php" style="text-decoration: none;"><small>User Notice</small></a>
            </div><br><br>
            <hr>

        </div>
    </div>
    <script src="js/app.js" type="text/javascript"></script>
</body>

</html>