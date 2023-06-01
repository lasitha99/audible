<?php require_once 'book-details.php'; ?>

<?php
shuffle($product_shuffle_1);
?>

<?php
require_once 'Cart.php';

$cart = new Cart($db);

if (isset($_POST['cart_submit'])) {
    //call add to cart method
    $cart->addToCart($_POST['id'], $_POST['book_id']);
}

if (isset($_POST['wishlist_submit'])) {
    //call add to cart method
    $cart->addToWishlist($_POST['id'], $_POST['book_id']);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===== Font Awosome ===== -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


    <link href="owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="owlcarousel/assets/owl.theme.default.css" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700&display=swap" rel="stylesheet">

    <link href="css/styles.css" rel="stylesheet" />


    <style>
        #img {
            height: 250px !important;
        }

        .owl-carousel .owl-stage {
            display: flex;
        }

        .article-items {
            display: flex;
            flex: 1 0 auto;
            height: 100%;
        }

        .aticle-box {
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: stretch;
        }

        .seeMore {
            text-decoration: none;
            color: #000000;
        }

        .seeMore:hover {
            color: #000000;
        }

        .tableBorder {
            border-bottom: 0.5px solid #dee2e6 !important;
        }

        .box {
            border-radius: 15px;
        }

        .footerHeight {
            height: 37px;
        }

        .poppins_font {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <div class="container mt-3 bg-white px-5 box">

        <table class="table table-borderless">
            <tbody>
                <tr class="tableBorder">
                    <!-- <td>
                        <h3 class="poppins_font" style="color: #8B8B8B !important">Most Popular Books</h3>
                    </td> -->
                    <td class="text-end">
                        <a href="most-popular-books.php" class="seeMore">
                            <span class="h6 poppins_font">View More</span>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="owl-carousel owl-theme">
            <!-- Here we have shown the data using a foreach loop -->
            <?php foreach ($product_shuffle_1 as $item) { ?>
                <div class="card mx-2 myClass text-center elm">
                    <a href="inItem.php?item='<?php echo $item['book_id'] ?>'">
                        <img src="<?php echo $item['book_image'] ?? "img/covers/image (19).jpg" ?>" class="card-img-top" id="img" alt="...">
                    </a>
                    <div class="card-body d-flex flex-row p-1 footerHeight">

                        <!--add to cart option-->

                        <?php echo $item['book_price'] ?? "500.00" ?>/= &nbsp;
                        <!-- <button type="button" class="btn btn-outline-secondary btn-sm  rounded-circle" data-toggle="tooltip" data-placement="top" title="Add to wishlist">
                            <i class="far fa-heart"></i>
                        </button> -->

                        <form method="POST">
                            <input type="hidden" name="book_id" value="<?php echo $item['book_id'] ?? '1' ?>">
                            <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?? '1' ?>">
                            <input type="hidden" name="cart_submit" value="1">
                            <button type="submit" name="cart_sumbit_1" class="btn btn-outline-secondary btn-sm rounded-circle cart" data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                <i class="far fa-shopping-cart"></i>
                            </button>
                        </form> &nbsp;

                        <form method="POST">
                            <input type="hidden" name="book_id" value="<?php echo $item['book_id'] ?? '1' ?>">
                            <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?? '1' ?>">
                            <input type="hidden" name="wishlist_submit" value="1">
                            <button type="submit" name="wishlist_sumbit_1" class="btn btn-outline-secondary btn-sm rounded-circle cart" data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                <i class="far fa-heart"></i>
                            </button>
                        </form>


                    </div>
                </div>
            <?php }
            ?>
        </div> <br>
    </div>
    <br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="js/jQuory.js"></script>
    <script src="owlcarousel/owl.carousel.min.js"></script>
    <script src="js/owlcarousel-script.js"></script>
    <script src="js/vanilla-min.js"></script>

    <script type="text/javascript">
        VanillaTilt.init(document.querySelector(".card"), {
            max: 25,
            speed: 400
        });

        //It also supports NodeList
        VanillaTilt.init(document.querySelectorAll(".card"));
    </script>
</body>

</html>