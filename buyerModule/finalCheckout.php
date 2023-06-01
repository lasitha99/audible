<?php require_once '../nav-bar.php'; ?>

<?php require_once '../functions.php'; ?>
<?php require_once '../items.php'; ?>

<!doctype html>
<html lang="en">

<head>
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

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        footer {
            margin-top: auto;
        }
    </style>

    <title>Checkout - Audible.lk</title>
</head>

<body>


    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                Your Address
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <p>
                            <?php echo $_SESSION['first_name']; ?>
                            <?php echo '<br>'; ?>
                            <?php echo $_SESSION['address']; ?>
                        </p>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-header">
                        Payment Method </div>
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                <b class="text-muted">Cash On Delivery</b>
                            </label>
                            <p>
                                <small>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                    the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                                    and scrambled it to make a type specimen book.
                                </small>
                            </p>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                <b class="text-muted">Pay Pal</b>
                            </label>

                            <div id="paymentButton" class="mt-1"> </div>
                            <p>
                                <small>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                    the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                                    and scrambled it to make a type specimen book.
                                </small>
                            </p>
                        </div>
                        <div class="row mx-2">
                            <a href="finalOrderSuccess.php" class="btn btn-dark btn-sm" role="button">Place Order</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                Order Details
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Book</th>
                                    <th scope="col" style="text-align:right">Price</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                $subTotal = 0;
                                foreach ($item->getData($table = 'cart') as $Book) {
                                    $myArray = $item->getProduct($Book['book_id']);
                                    $book = array_merge($myArray, $Book)[0];
                                    $subTotal = $subTotal + $Book['price'];
                                ?>
                                    <tr>
                                        <td><?php echo $book['book_author'] ?? "author name" ?></td>

                                        <!-- book price is here -->
                                        <td style="text-align:right"><?php echo number_format($Book['price'], 2) ?? "author name" ?></td>
                                    </tr>

                                <?php
                                }
                                ?>

                                <tr>
                                    <td colspan="2">
                                    <td>
                                </tr>
                                <tr>
                                    <td><b>Subtotal</b></td>
                                    <td></td>
                                    <td style="text-align:right; color:#0070BA"><b><?php echo number_format($subTotal, 2); ?> </b></td>
                                </tr>
                                <tr>
                                    <td><b>Delivery</b></td>
                                    <td></td>
                                    <td style="text-align:right; color:#2CD8A6"><b>Free</b></td>
                                </tr>

                                <tr>
                                    <td><b>Total</b></td>
                                    <td></td>
                                    <td style="text-align:right; color:#FF0000"><b><?php echo number_format($subTotal, 2); ?></b></td>
                                </tr>

                            </tbody>
                        </table>


                    </div>
                </div>

            </div>
        </div>
    </div>
    <br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <script src="https://www.paypal.com/sdk/js?client-id=AdUa0rQRqwSoeOTk6ONPv1oPClCxSRI47yo26fhc9YFIv2SvBC337DvL6px3QtwThLP3MMowZBzI_V2q&disable-funding=credit,card"></script>

    <script>
        paypal.Buttons({
            style: {
                color: 'silver',
                shape: 'pill'
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '0.1'
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    console.log(details)
                    window.location.replace("http://localhost:/audible/success.php")
                })
            },

        }).render('#paymentButton');
    </script>

</body>

</html>

<?php require_once '../footer-dark2.php'; ?>