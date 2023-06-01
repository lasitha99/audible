<?php
ob_start();
?>

<?php



// php cart class
class Cart
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // insert into cart table
    public  function insertIntoCart($params = null, $table = "cart")
    {
        if ($this->db->con != null) {
            if ($params != null) {
                // "Insert into cart(id) values (0)"
                // get table columns
                $columns = implode(',', array_keys($params));

                $values = implode(',', array_values($params));

                // create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    /**
     *  Update cart item Qty
     */
    public function updateCartData($cid, $qty, $book_price)
    {
        if ($this->db->con != null) {

            $Price = $book_price * $qty;
            $query_string = sprintf("UPDATE cart SET qty='$qty', price='$Price' WHERE cart_id=$cid");
            $result = $this->db->con->query($query_string);

            return $result;
        }
    }

    // insert into wishlist table
    public  function insertIntoWishlist($params = null, $table = "wishlist")
    {
        if ($this->db->con != null) {
            if ($params != null) {
                // "Insert into cart(id) values (0)"
                // get table columns
                $columns = implode(',', array_keys($params));

                $values = implode(',', array_values($params));

                // create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    // to get id and book_id and insert into cart table
    public  function addToCart($userid, $bookid)
    {
        if (isset($userid) && isset($bookid)) {

            $params = array(
                "id" => $userid,
                "book_id" => $bookid
            );

            $sql = "SELECT book_id FROM cart";
            $result = $this->db->con->query($sql);

            //add to cart
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    if ($row["book_id"] != $bookid) {
                        // insert data into cart
                        $result = $this->insertIntoCart($params);
                        if ($result) {
                            // Reload Page
                            //print_r('$db');
                            header("Location: " . $_SERVER['PHP_SELF']);
                        }
                    }
                }
            } else {
                $result = $this->insertIntoCart($params);
                if ($result) {
                    // Reload Page
                    //print_r('$db');
                    header("Location: " . $_SERVER['PHP_SELF']);
                }
            }
        }
    }


    // to get id and book_id and insert into cart table
    public  function addToWishlist($userid, $bookid)
    {
        if (isset($userid) && isset($bookid)) {

            $params = array(
                "id" => $userid,
                "book_id" => $bookid
            );

           

            $sql = "SELECT book_id FROM wishlist";
            $result = $this->db->con->query($sql);

            //add to cart
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    if ($row["book_id"] != $bookid) {
                        // insert data into cart
                        $result = $this->insertIntoWishlist($params);
                        if ($result) {
                            // Reload Page
                            //print_r('$db');
                            header("Location: " . $_SERVER['PHP_SELF']);
                        }
                    }
                }
            } else {
                $result = $this->insertIntoWishlist($params);
                if ($result) {
                    // Reload Page
                    //print_r('$db');
                    header("Location: " . $_SERVER['PHP_SELF']);
                }
            }


        }
    }

    // delete cart item using cart item id
    public function deleteCart($book_id = null, $table = null)
    {
        if ($book_id != null) {
            $result = $this->db->con->query("DELETE FROM {$table} WHERE book_id={$book_id}");
            if ($result) {
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    // calculate sub total
    public function getSum($arr)
    {
        if (isset($arr)) {
            $sum = 0;
            foreach ($arr as $item) {
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f', $sum);
        }
    }

    // get item_it of shopping cart list
    public function getCartId($cartArray = null, $key = "book_id")
    {
        if ($cartArray != null) {
            $cart_id = array_map(function ($value) use ($key) {
                return $value[$key];
            }, $cartArray);
            return $cart_id;
        }
    }


    //meka hadanna
    // Save for later
    public function saveForLater($book_id = null, $saveTable = "wishlist", $fromTable = "cart")
    {
        if ($book_id != null) {
            $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE book_id={$book_id};";
            $query .= "DELETE FROM {$fromTable} WHERE book_id={$book_id};";

            // execute multiple query
            $result = $this->db->con->multi_query($query);

            if ($result) {
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }
}
