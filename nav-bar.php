<?php require_once 'functions.php'; ?>
<?php require_once 'items.php'; ?>

<?php
// This code part handles the item count of the cart and wishlist
// and also the switching of sign in and out buttons
session_start();
if (!isset($_SESSION['email'])) {
    $_SESSION['email'] = "";
}
if (isset($_GET['logout']) and ($_GET['logout'] == 1)) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: userModule/login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="css/hoverbuttons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/tippy.css" />

    <style>
        .green-dot {
            color: #06BEE1;
        }

        .nav-bar-font-color {
            color: #ffffff;
        }

        .custom-link {
            text-decoration: none;
            color: #ffffff;
        }

        .custom-link:hover {
            color: #06BEE1;
        }

        .nav-bar {
            padding: 35px;
        }

        .logo-font {
            font-family: 'Secular One', sans-serif;
            font-size: 36px;
        }

        .nav-link-font {
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
        }

        .icons {
            font-size: 22px;
        }

        .background-color {
            background-color: #171717;
        }

        .notification {
            color: white;
            background-color: red;
            font-size: 13px;
            padding-top: 3px;
            padding-bottom: 3px;
            padding-left: 6px;
            padding-right: 6px;
            border-radius: 25px;
            position: relative;
            right: 20px;
            bottom: 17px;
        }
    </style>

    <title>Audile . Your Book Store</title>
</head>

<body>
    <div class="background-color">
        <div class="container">
            <div class="row nav-bar">
                <div class="col-md-3 p-0">
                    <a href="http://localhost/audible/index.php" style="text-decoration: none;"><span class="nav-bar-font-color logo-font">AUDIBLE LK</span><span class="green-dot logo-font">.</span></a>
                </div>
                <div class="col-md-6 nav-bar-font-color nav-link-font text-center p-0">
                    <a href="#all-books" class="custom-link me-1 hbtn hb-border-off">ALL BOOKS</a>
                    <a href="#new-arrival-books" class="custom-link me-1 hbtn hb-border-off2">NEW BOOKS</a>
                    <a href="#most-popular-books" class="custom-link me-1 hbtn hb-border-off3">POPULAR BOOKS</a>

                </div>
                <div class="col-md-3 nav-bar-font-color icons text-end p-0">

                    <!-- shopping cart -->
                    <?php if (($_SESSION['email'] != '')) { ?>
                        <a href="http://localhost/audible/buyerModule/final-cart.php" class="custom-link">
                            <i class="fas fa-shopping-cart me-2" id="cart"></i>
                        <?php } else { ?>
                            <a href="" class="custom-link">
                            <?php } ?>

                            <?php if (($_SESSION['email'] != '')) { ?>
                                <span class="notification"><?php echo count($item->getData('cart')) ?></span>
                            <?php } else { ?>
                            <?php } ?>

                            </a>

                            <!-- wishlist -->
                            <?php if (($_SESSION['email'] != '')) { ?>
                                <a href="http://localhost/audible/buyerModule/wishlist.php" class="custom-link">
                                    <i class="far fa-heart me-2" id="wishlist"></i>
                                <?php } else { ?>
                                    <a href="" class="custom-link">
                                    <?php } ?>


                                    <?php if (($_SESSION['email'] != '')) { ?>
                                        <span class="notification"><?php echo count($item->getData('wishlist')) ?></span>
                                    <?php } else { ?>
                                    <?php } ?>

                                    </a>

                                    <?php if ($_SESSION['email'] == "") { ?>
                                        <a href="http://localhost/audible/userModule/sign-in.php" class="custom-link">Sign In</a>
                                    <?php } else { ?>
                                        <a href="http://localhost/audible/userModule/log-out.php" class="custom-link">Sign Out</a>
                                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#search").keyup(function() {
                $.ajax({
                    type: 'POST',
                    url: 'search2.php',
                    data: {
                        name: $("#search").val(),
                    },
                    success: function(data) {
                        $("#output").html(data);
                    }
                });
            });

            $(".fa-search").click(function() {
                $(".icon").toggleClass("active");
                $("input[type='text']").toggleClass("active");
            });
        });
    </script>

</body>

</html>