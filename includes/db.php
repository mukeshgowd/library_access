<?php

class DB 
{
    private $con;
    private $host = "localhost";
    private $dbname = "library_db";
    private $user = "root";
    private $password = "" ;

    public function __construct() 
    {
        try 
        {
            $this->con = new PDO("mysql:host=localhost;dbname=library_db", "root", "");
            $this->con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connection Successful";
        } catch (PDOException $e) {
            echo "Connection failed:" . $e->getMessage();
        }
    }
    
    public function viewData()
    {
        $query = "SELECT * FROM tbl_books";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function searchData($book_title, $book_author_name, $book_category_name, $uid) 
    {
        $query = "SELECT b.*, a.first_name AS author_first_name, a.last_name AS author_last_name, c.category_name , CASE WHEN f.book_id IS NULL THEN 'N' ELSE 'Y' END AS favourite FROM tbl_books b LEFT JOIN tbl_author a ON b.author_id = a.id LEFT JOIN tbl_category c ON b.book_category = c.id LEFT JOIN tbl_favourites f ON b.id = f.book_id AND f.uid = :uid WHERE book_title LIKE :book_title OR book_category_name LIKE :book_category_name OR book_author_name LIKE :book_author_name";

        // $query = "SELECT * FROM tbl_books WHERE book_title LIKE :book_title OR book_category_name LIKE :book_category_name OR book_author_name LIKE :book_author_name";
        // $query = "SELECT * FROM tbl_books WHERE book_title LIKE :book_title OR book_category_name LIKE :book_title OR book_author_name LIKE :book_title";
        // $query = "SELECT * FROM tbl_books WHERE book_title LIKE :book_title";
        $stmt = $this->con->prepare($query);
        $stmt->execute(["uid" => $uid, "book_title" => "%" . $book_title . "%", "book_category_name" => "%" . $book_category_name . "%",  "book_author_name" => "%" . $book_author_name . "%" ]);
        // $stmt->execute(["book_title" => "%" . $book_title . "%", "book_category_name" => "%" . $book_title . "%",  "book_author_name" => "%" . $book_title . "%" ]);
        // $stmt->execute(["book_title" => "%" . $book_title . "%"]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}

?>