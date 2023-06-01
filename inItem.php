<?php
ob_start();
?>
<?php require_once 'nav-bar.php'; ?>
<?php require_once 'book-details.php'; ?>
<?php
if (!isset($_GET['item'])) {
    header("location: index.php");
    die;
}
$ItemTmp = $item->getItemData(($_GET['item']));
if (!$ItemTmp) {
    header("location: index.php");
    die;
}
$Item = $ItemTmp[0];
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['cart_submit'])) {


        if (!isset($_SESSION['id'])) {

            header("location: login.php");
            die;
        }
        $cart->addToCart($_POST['id'], $_POST['book_id']);
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?php echo $Item['book_name']; ?> </title>

    <!-- Custom css files -->
    <link rel="stylesheet" href="custom-css/custom-button.css">
    <link rel="stylesheet" href="custom-css/custom-column.css">
    <link rel="stylesheet" href="custom-css/custom-container.css">
    <link rel="stylesheet" href="custom-css/custom-row.css">
    <link rel="stylesheet" href="custom-css/custom-nav-bar.css">
    <link rel="stylesheet" href="custom-css/custom-forms.css">
    <link rel="stylesheet" href="custom-css/custom-grid.css">
    <link rel="stylesheet" href="custom-css/custom-text.css">
    <link rel="stylesheet" href="custom-css/custom-display.css">
    <link rel="stylesheet" href="custom-css/custom-h-tags.css">
    <link rel="stylesheet" href="custom-css/rounded-corners.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <style>
        .btn-color1 {
            background-color: #1470f6 !important;
        }

        .btn-color2 {
            background-color: #025e9b !important;
        }

        .btn-color3 {
            background-color: #02819b !important;
        }

        .font2 {
            font-family: 'Roboto', sans-serif;
        }

        .al {
            text-align: right;
        }

        th,
        td {
            padding: 5px;
        }
    </style>
</head>

<body>
    <br><br>
    <div class="container font2 text-muted">
        <div class="row">
            <div class="col-md-3">
                <img src="<?php echo $Item['book_image'] ?? "images/covers/image (19).jpg" ?>" width="100%">
            </div>
            <div class="col-md-9 ps-5">
                <br>
                <h4><?php echo $Item['book_name']; ?> </h4>
                <hr>
                <table>
                    <tr>
                        <td class="al">Author:</td>
                        <td><?php echo $Item['book_author']; ?></td>
                    </tr>
                    <tr>
                        <td class="al">Listed date:</td>
                        <td><?php echo $Item['book_register'] ?? "2021/02/02" ?></td>
                    </tr>
                    <tr>
                        <td class="al">Seller:</td>
                        <td>seller name</td>
                    </tr>
                    <tr>
                        <td class="al">Returns:</td>
                        <td>seller does not accept returns</td>
                    </tr>
                    <tr>
                        <td class="al">Conditions:</td>
                        <td>90%</td>
                    </tr>
                    <tr>
                        <td class="al">Quantity:</td>
                        <td><?php echo $Item['book_qty'] ?? "5" ?></td>
                    </tr>
                    <tr>
                        <td class="al">Rating:</td>
                        <td><span class="h6">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </span></td>
                    </tr>
                    <tr>
                        <td class="al">Price:</td>
                        <td>LKR <?php echo $Item['book_price'] ?? "500.00" ?>/=</td>
                    </tr>
                </table>
                <br>
                <form method="post">
                    <?php if (isset($_SESSION['id'])) :
                    ?>
                        <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                        <input type="hidden" name="book_id" value="<?php echo $Item['book_id']; ?>">
                    <?php
                    endif;
                    ?>
                    <button type="sutmit" class="btn btn-sm btn-color1 text-light px-3">Add to Wishlist</button>
                    <button type="sutmit" class="btn btn-sm btn-color2 text-light px-3">Add to Cart</button>
                    <button type="sutmit" class="btn btn-sm btn-color3 text-light px-3">Buy Now</button>
                </form>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12-">
                    <h6>Book Description</h6>
                    <hr>
                    <p>
                        <?php echo $Item['description'] ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>
<?php require_once 'footer-dark2.php'; ?>