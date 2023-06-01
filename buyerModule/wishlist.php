<?php require_once '../nav-bar.php'; ?>

<?php require_once '../functions.php'; ?>
<?php require_once '../items.php'; ?>

<?php

if ($_SERVER['REQUEST_METHOD'] = 'POST') {
    if (isset($_POST['delete_cart_submit'])) {
        $deletedrecord = $cart->deleteCart($_POST['book_id'], 'wishlist');
    }

    if (isset($_POST['cart-submit'])) {
        $cart->saveForLater($_POST['book_id'], 'cart', 'wishlist');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- link css here -->
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

    <style>
        body {
            min-height: 100vh !important;
            display: flex !important;
            flex-direction: column !important;
        }

        footer {
            margin-top: auto !important;
        }
    </style>
</head>

<body>

    <section id="elakiri" class="py-3">
        <div class="container-fluid w-75">
            <h5 class="font-baloo font-size-20">Wishlist</h5>

            <?php
            if (count($item->getData('wishlist'))) {
            ?>

                <div class="row">
                    <div class="col-sm-9">

                        <?php
                        foreach ($item->getData($table = 'wishlist') as $book) :
                            $elakiri = $item->getProduct($book['book_id']);
                            $subTotal[] = array_map(function ($book) {
                        ?>
                                <div class="row border-top py-3 mt-3">
                                    <div class="col-sm-2">
                                        <img src="../<?php echo $book['book_image'] ?? "images/covers/image (1).png" ?>" style="height: 120px;" alt="elakiri1" class="img-fluid">
                                    </div>
                                    <div class="col-sm-8">
                                        <h5 class="font-baloo font-size-20"><?php echo $book['book_name'] ?? "name" ?></h5>
                                        <small>by <?php echo $book['book_author'] ?? "author name" ?></small>
                                        <div class="d-flex">

                                            <div class="rating font-size-12">
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="far fa-star"></i></span>
                                            </div>
                                        </div>
                                        <div class="qty d-flex pt-2">

                                            <form method="POST">
                                                <input type="hidden" value="<?php echo $book['book_id'] ?? 0; ?>" name="book_id">
                                                <button type="submit" name="delete_cart_submit" class="btn font-baloo text-danger ps-0 pe-3 border-right">Delete</button>
                                            </form>

                                        </div>
                                    </div>
                                    <div class="col-sm-2 text-right">
                                        <div class="font-size-20 text-danger font-baloo">
                                            LKR <span class="product_price"><?php echo $book['book_price'] ?? "500.00" ?></span>
                                        </div>
                                    </div>
                                </div>


                        <?php
                                return $book['book_price'];
                            }, $elakiri);


                        endforeach;
                        ?>
                    </div>


                </div>
            <?php
            } else {
            ?>
                <div class="container my-5">
                    <div class="row">
                        <div class="col-12 my-5">
                            <div class="col-sm-12 empty-cart-cls text-center"> <img src="../img/wishlist.png" width="130" height="130" alt="wishlist" class="img-fluid mb-4 me-3">
                                <h3><strong>Your wishlist is Empty</strong></h3>
                                <h4>Add something to make me happy :)</h4> <a href="index.php" class="btn btn-primary shadow mt-3"><i class="fas fa-arrow-alt-circle-left me-2"></i><b>Continue Shopping</b></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha256-CBrpuqrMhXwcLLUd5tvQ4euBHCdh7wGlDfNz8vbu/iI=" crossorigin="anonymous"></script>

</body>

</html>
<?php require_once '../footer-dark2.php'; ?>