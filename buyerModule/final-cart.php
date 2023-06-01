<?php require_once '../nav-bar.php'; ?>

<?php require_once '../functions.php'; ?>
<?php require_once '../items.php'; ?>

<?php

if ($_SERVER['REQUEST_METHOD'] = 'POST') {
    if (isset($_POST['delete_cart_submit'])) {
        $deletedrecord = $cart->deleteCart($_POST['book_id'], 'cart');
    }

    if (isset($_POST['wishlist-submit'])) {
        $savedrecord = $cart->saveForLater($_POST['book_id']);
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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


    <!-- ===== Font Awosome ===== -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- ===== Google fonts ===== -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500;700;900&display=swap" rel="stylesheet">

    <style>
        .btn-color1 {
            background-color: #00B8DA !important;
            border-radius: 12px;
        }

        .btn-color2 {
            background-color: #2CD8A6 !important;
            border-radius: 12px;
        }

        .font1 {
            font-family: 'Roboto', sans-serif;
        }

        .cardEdited {
            border-radius: 12px;
        }

        .greenText {
            color: #2CD8A6;
            font-weight: 500;
        }


        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        footer {
            margin-top: auto;
        }
    </style>

    <title>Cart - Audible.lk</title>
</head>

<body class="bg-light">

    <section id="elakiri" class="py-3">
        <div class="container-fluid w-75">
            <h5 class="font-baloo font-size-20">Shopping Cart</h5>

            <div class="col-md-auto">
                <a class="btn btn-sm btn-outline-secondary border-300 mr-2" href="../index.php"> <span class="fas fa-chevron-left me-1"></span>Back to Shopping</a>
                <a class="btn btn-sm btn-primary" href="finalCheckout.php" onclick="myFunction()">Checkout</a>
            </div>

            <?php
            if (count($item->getData('wishlist'))) {
            ?>

                <div class="row">
                    <div class="col-sm-9">

                        <?php
                        foreach ($item->getData($table = 'cart') as $book) :
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
                                <h3><strong>Your shopping cart is Empty</strong></h3>
                                <h4>Add something to make me happy :)</h4> <a href="index.php" class="btn btn-primary shadow mt-3"><i class="fas fa-arrow-alt-circle-left me-2"></i><b>Continue Shopping</b></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    <br>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha256-CBrpuqrMhXwcLLUd5tvQ4euBHCdh7wGlDfNz8vbu/iI=" crossorigin="anonymous"></script> -->




    <script>
        function myFunction() {

            event.preventDefault();
            //alert("checkout");

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "Do you want to purchase selected books?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Continue',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // swalWithBootstrapButtons.fire(
                    //     'Cance!',
                    //     'Your file has been deleted.',
                    //     'success'
                    // )
                    window.location.replace("finalCheckout.php");
                    return true;

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Browse more books and purchase later :)',
                        'error'
                    )
                }
            })
        }
    </script>

</body>

</html>

<?php require_once '../footer-dark2.php'; ?>