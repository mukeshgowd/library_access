<?php

function getAllCategories($conn){
    $GetCategories = "SELECT * FROM tbl_category";
    $Results    = mysqli_query($conn,$GetCategories);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]                     = $record["id"];
            $data["category_name"]          = $record["category_name"];
            $data["category_display_name"]  = $record["category_display_name"];
            array_push($ListArray,$data);

        }

    }

    return $ListArray;
}

function getAllBooks($conn, $uid){
    $ListArray = array();

    // SELECT b.*, a.first_name AS author_first_name, a.last_name AS author_last_name, c.category_name , CASE WHEN f.book_id IS NULL THEN 'N' ELSE 'Y' END AS favourite FROM tbl_books b LEFT JOIN tbl_author a ON b.author_id = a.id LEFT JOIN tbl_category c ON b.book_category = c.id LEFT JOIN tbl_favourites f ON b.id = f.book_id AND f.uid = 1;

    $GetBooks = "SELECT b.*, a.first_name AS author_first_name, a.last_name AS author_last_name, c.category_name , CASE WHEN f.book_id IS NULL THEN 'N' ELSE 'Y' END AS favourite FROM tbl_books b LEFT JOIN tbl_author a ON b.author_id = a.id LEFT JOIN tbl_category c ON b.book_category = c.id LEFT JOIN tbl_favourites f ON b.id = f.book_id AND f.uid = '$uid'";

    $Results    = mysqli_query($conn,$GetBooks);

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $AuthorQuery  = "SELECT * FROM tbl_author WHERE id = '".$record["author_id"]."'";
            $AuthorResult = mysqli_query($conn, $AuthorQuery);
            $AuthorData   = mysqli_fetch_assoc($AuthorResult);

            $CategoryQuery  = "SELECT * FROM tbl_category WHERE id = ".$record["book_category"];
            $CategoryResult = mysqli_query($conn, $CategoryQuery);
            $CategoryData   = mysqli_fetch_assoc($CategoryResult);

            $data = array();
            $data["id"]                  = $record["id"];
            $data["book_title"]          = $record["book_title"];
            $data["book_image"]          = $record["book_image"];
            $data["book_author"]         = $record["author_first_name"] . " " . $record["author_last_name"];
            $data["book_category"]       = $record["category_name"];
            $data["favourite"]           = $record["favourite"];

            array_push($ListArray,$data);

        }

    }
    

    return $ListArray;
}

function getTimeSlots($conn){
    $GetTimeSlots = "SELECT * FROM tbl_time_slots";
    $Results    = mysqli_query($conn,$GetTimeSlots);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]                 = $record["id"];
            $data["from_time"]          = $record["from_time"];
            $data["to_time"]            = $record["to_time"];
            array_push($ListArray,$data);

        }

    }

    return $ListArray;
}

function checkReservedBooks($conn, $uid, $bid){
    $GetReservedBooks = "SELECT * FROM tbl_transaction WHERE user_id = '$uid' AND book_id = '$bid'";
    $Results = mysqli_query($conn, $GetReservedBooks);

    if (mysqli_num_rows($Results) > 0) {
        return true;
    } else {
        return false;
    }
    
}

function GetBookTotalCopies($conn, $bid){
    $Query = "SELECT * FROM tbl_books WHERE id = '$bid'";
    $Results = mysqli_query($conn, $Query);

    if (mysqli_num_rows($Results) > 0) {
        
        while($record = mysqli_fetch_assoc($Results)) 
        {
            return $record["total_copies"];
        }
    }
    
}

function checkBookCopies($conn, $bid)
{
    $total_books = intval(GetBookTotalCopies($conn, $bid));

    $Query = "SELECT COUNT(*) AS total FROM `tbl_transaction` WHERE status IN ('Approved','Delivered') AND book_id = '$bid'";
    $Results = mysqli_query($conn, $Query);

    if (mysqli_num_rows($Results) > 0) {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $total_copies = intval($record["total"]);

            if($total_copies == $total_books)
            {
                return 0;
            }else if($total_copies < $total_books){
                return 1;
            }
        }
    } else {
        return 1;
    }
    
}

function setPushNotification($conn, $sid, $rid, $subject, $message)
{
    $InsertArray                 = array();
    $InsertArray["sender_id"]    = $sid;
    $InsertArray["receiver_id"]  = $rid;
    $InsertArray["subject"]      = $subject;
    $InsertArray["message"]      = $message;
    $InsertArray["created_on"]   = date('Y-m-d H:i:s');

    $columns = implode(", ",array_keys($InsertArray));
    $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($InsertArray));
    $values  = implode("', '", $escaped_values);
    $Query   = "INSERT INTO tbl_notification ($columns) VALUES ('$values')";
    $Results = mysqli_query($conn,$Query) or die ("Error in query: $Query. ".mysqli_error($conn));
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>