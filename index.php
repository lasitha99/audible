<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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


    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <title>Home Page</title>
    <script src="js/jQuory.js"></script>

    <style>
        .text {
            background-color: #ffffff;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            padding: 10px;
            width: 10rem;
            position: relative;
            left: 8rem;
            top: 12rem;
        }

        .headline p:before,
        .headline p:after {
            position: absolute;
            left: calc(50% - 70px);
            display: block;
            width: 140px;
            border-bottom: 4px solid black;
            content: "";
        }

        .item-menu {
            text-align: center;
            margin: 20px auto;
        }

        .item-menu ul li {
            list-style: none;
            padding: 6px 15px;
            display: inline-block;
            border: 2px solid #2541B2;
            cursor: pointer;
            margin: 5px;
            border-radius: 5px;
            background-color: #ffffff;
        }

        .item-menu ul li:hover,
        .item-menu ul li:active {
            background: #2541B2;
            color: #ffffff;
        }

        .item-details {
            width: 100% !important;

        }

        .item-details img {
            width: 100%;
            height: 300px;
            border-radius: 5px;
        }

        .item {
            padding: 5px;
        }

        .blog-image {
            width: 100%;
            border-radius: 5px;
        }

        .box1 {
            background-color: #2541B2;
            width: 80px;
            height: 80px;
            padding: 30px;
            border-radius: 10px;
            display: table;
            margin: 0 auto;
        }

        .box2 {
            background-color: #06BEE1;
            width: 80px;
            height: 80px;
            padding: 30px;
            border-radius: 10px;
            display: table;
            margin: 0 auto;
        }

        .box3 {
            background-color: #2541B2;
            width: 80px;
            height: 80px;
            padding: 30px;
            border-radius: 10px;
            display: table;
            margin: 0 auto;
        }

        .rounded-border {
            border-radius: 15px;
        }

        .what-can-title {
            font-size: 24px;
            font-family: 'Manrope', sans-serif;
        }

        .what-can-details {
            font-family: 'Manrope', sans-serif;
            font-size: 14px;
            color: #4a5254;
        }

        .custom-border {
            border: 1px solid #bdbdbd;
        }

        body {
            overflow-x: hidden;
        }

        button {
            font-size: 20px;
            padding: 10px;
        }

        .page-load-status {
            display: none;
            padding-top: 20px;
            border-top: 1px solid #DDD;
            text-align: center;
            color: #777;
        }
    </style>
</head>

<body>
    <?php require_once('nav-bar.php'); ?>

    <?php require_once('header-final.php'); ?>

    <div class="container p-0">
        <div class="row mt-5">
            <div class="headline">
                <h2 class="text-center">What you can do?</h2>
                <p></p>
            </div>
        </div>
        <div class="bg-white rounded-border">


            <div class="row gx-3 my-4">

                <div class="col-md-4 text-center ">
                    <div class="custom-border p-4">
                        <div class="box1"><i class="fas fa-mouse-pointer text-white"></i></div>
                        <p class="mt-3 what-can-title"><b>Browse Books</b></p>
                        <p class="what-can-details">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                    </div>

                </div>
                <div class="col-md-4 text-center">
                    <div class="custom-border p-4">
                        <div class="box2"><i class="far fa-book-open text-white"></i></div>
                        <p class="mt-3 what-can-title"><b>Buy Books</b></p>
                        <p class="what-can-details">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="custom-border p-4">
                        <div class="box3"><i class="far fa-badge-dollar text-white"></i></div>
                        <p class="mt-3 what-can-title"><b>Sell Books</b></p>
                        <p class="what-can-details">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                    </div>
                </div>


            </div>
        </div>

        <span id="all-books"></span>


        <div data-aos="zoom-in">
            <div class="row">
                <div class="headline">
                    <h2 class="text-center">All Catagories</h2>
                    <p></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="item-menu">
                        <ul>
                            <li data-filter="*">All</li>

                            <?php $db = new DBController();
                            $item = new Item($db);
                            $all_catagories = $item->getCatagory();
                            $x = count($all_catagories);
                            while ($x > 0) {
                                echo '<li data-filter=".' . $all_catagories[$x - 1]["book_catagory"] . '">' . $all_catagories[$x - 1]["book_catagory"] . '</li>';
                                $x--;
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-white p-3 rounded-border">
                <div class="row m-0 item-details">

                    <?php
                    $all_images = $item->imagesByLimit();
                    $x = count($all_images);
                    while ($x > 0) {
                        echo '<div class="col-md-2 item ' . $all_images[$x - 1]["book_catagory"] . '">';
                        echo '<img src="' . $all_images[$x - 1]["book_image"] . '" alt="">';
                        echo '</div>';
                        $x--;
                    }
                    ?>

                </div>
            </div>
        </div>
    </div><br><br>

    <?php require_once 'sell-your-book.php'; ?>

    <span id="most-popular-books"></span>

    <div>
        <div class="container mt-5">
            <div class="row">
                <div class="headline">
                    <h2 class="text-center">Most Popular Books</h2>
                    <p></p>
                </div>
            </div>
        </div>

        <?php include 'test.php'; ?>
    </div>

    <span id="new-arrival-books"></span>

    <div>
        <div class="container">
            <div class="row">
                <div class="headline">
                    <h2 class="text-center">Newly Arrived Books</h2>
                    <p></p>
                </div>
            </div>
        </div>

        <?php include 'test.php'; ?>
    </div>

    <div class="bg-color">
        <div class="container">
            <div class="headline mb-4">
                <h2 class="text-center">Latest Blog</h2>
                <p></p>
            </div>
            <div class="row gx-5 pt-5 pb-4">

                <div class="col-md-3">
                    <div class="card h-100" style="width: 18rem;">
                        <img src="img/blog/blog (1).jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">“A reader lives a thousand lives before he dies, said Jojen. The man who never reads lives only one.”</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100" style="width: 18rem;">
                        <img src="img/blog/blog (2).jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">“The more that you read, the more things you will know. The more that you learn, the more places you'll go.”</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100" style="width: 18rem;">
                        <img src="img/blog/blog (3).jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">“I find television very educating. Every time somebody turns on the set, I go into the other room and read a book.”</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100" style="width: 18rem;">
                        <img src="img/blog/blog (4).jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">“It is what you read when you don't have to that determines what you will be when you can't help it.”</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once 'footer-dark2.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <script>
        $(document).ready(function() {
            var $grid = $('.item-details').isotope({
                filter: '.Information-Technology',

            });
            $('.item-menu').on('click', 'li', function() {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({
                    filter: filterValue
                });
            });

        });
    </script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>