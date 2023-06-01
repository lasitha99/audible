<?php

class Item
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    
    public function getData($table = 'book')
    {
        $result = $this->db->con->query("SELECT * FROM {$table}");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function getCatagory($table = 'book')
    {
        $result = $this->db->con->query("SELECT book_catagory FROM {$table} GROUP BY book_catagory");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function searchData($s)
    {
        $table = 'book';
        $result = $this->db->con->query("SELECT * FROM {$table} WHERE book_name LIKE '%$s%'");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function getItemData($itemId)
    {
        $table = 'book';
        $result = $this->db->con->query("SELECT * FROM {$table} WHERE book_id = $itemId");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    // Here we have written a quoery inside a class to fetch all data from the database
    // most popular books
    public function getMostPopular()
    {
        $table = 'book';
        $result = $this->db->con->query("SELECT * FROM {$table} WHERE rating = 5");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    //new arrival books
    public function getNewArrivals()
    {
        $table = 'book';

        //selecting last month data by book_register with CURRENT_TIMESTAMP function
        $result = $this->db->con->query("SELECT * FROM {$table} WHERE book_register between '2021-05-01'AND '2021-05-10'");
        //$result = $this->db->con->query("SELECT * FROM {$table} WHERE rating = 4");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    //new arrival books
    public function imagesByLimit()
    {
        $table = 'book';

        //selecting last month data by book_register with CURRENT_TIMESTAMP function
        $result = $this->db->con->query("SELECT * FROM {$table}");
        //$result = $this->db->con->query("SELECT * FROM {$table} WHERE rating = 4");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getProduct($book_id = null, $table = 'book')
    {
        if (isset($book_id)) {
            $result = $this->db->con->query( "SELECT * FROM {$table} WHERE book_id={$book_id}");
            $resultArray = array();
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }
            return $resultArray;
        }
    }
}
?>
