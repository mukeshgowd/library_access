<?php
include "../includes/config.php";

$ResponseArray 	= 	array();
$ErrorResponse  =    "";
$Action			=	stripslashes(trim($_REQUEST["action"]));
$HtmlContent    =    "";

if(isset($Action) && $Action == "add_book"){
    try {

        $get_book_title		= addslashes((trim($_REQUEST['addBookTitle'])));
        $get_book_author	= addslashes((trim($_REQUEST['addBookAuthor'])));
        $get_book_category	= addslashes((trim($_REQUEST['addBookCategory'])));
        $get_book_copies	= addslashes((trim($_REQUEST['addBookCopies'])));

        $uploadDirectory = '../uploads/';
        $uploadURL       = 'uploads/';
        $image_file_path = "";

        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0755, true);
        }

        $file_name = $_FILES["addBookImage"]["name"];
        $file_tmp  = $_FILES["addBookImage"]["tmp_name"];
        $ext       = pathinfo($file_name, PATHINFO_EXTENSION);

        if (in_array($ext, ['jpeg', 'jpg', 'png', 'gif','PNG', 'jfif'])) {
            $newFileName = uniqid('book') . $file_name;
            $uploadPath = $uploadDirectory . $newFileName;

            if (move_uploaded_file($file_tmp, $uploadPath)) {
                $image_file_path= $uploadURL . $newFileName;
            }
        }
        
        $Author   = explode("#",$get_book_author);
        $Category = explode("#",$get_book_category);

        $BookArray = array();
        $BookArray["book_title"]            = $get_book_title;
        $BookArray["book_category"]         = $Category[0];
        $BookArray["book_category_name"]    = $Category[1];
        $BookArray["book_image"]            = $image_file_path;
        $BookArray["author_id"]             = $Author[0];
        $BookArray["book_author_name"]      = $Author[1];
        $BookArray["total_copies"]          = $get_book_copies;

        $BookArray["status"]                = "Published";
        $BookArray["created_on"]            = date('Y-m-d H:i:s');


        
        $columns = implode(", ",array_keys($BookArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($BookArray));
        $values  = implode("', '", $escaped_values);
        $AddBookQuery = "INSERT INTO tbl_books ($columns) VALUES ('$values')";
        $ExecuteAddBookQuery = mysqli_query($conn,$AddBookQuery) or die ("Error in query: $AddBookQuery. ".mysqli_error($conn));

        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Book Added Successfuly";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
}else if(isset($Action) && $Action == "add_category"){

    try {
        $get_book_category	    = addslashes((trim($_REQUEST['addBookCategory'])));
   
        $CategoryArray = array();
        $CategoryArray["category_name"]         = str_replace(' ', '_', strtolower($get_book_category));
        $CategoryArray["category_display_name"] = ucwords($get_book_category);

        $columns = implode(", ",array_keys($CategoryArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($CategoryArray));
        $values  = implode("', '", $escaped_values);
        $AddNewCategoryQuery = "INSERT INTO tbl_category ($columns) VALUES ('$values')";
        $ExecuteAddNewCategoryQuery = mysqli_query($conn,$AddNewCategoryQuery) or die ("Error in query: $AddNewCategoryQuery. ".mysqli_error($conn));
        
        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Book Category Added.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "add_author"){

    try {

        $firstname		= addslashes((trim($_REQUEST['addAuthorFirstName'])));
        $lastname   	= addslashes((trim($_REQUEST['addAuthorLastName'])));

        $uploadDirectory = '../uploads/author/';
        $uploadURL       = 'uploads/author/';
        $image_file_path = "";

        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0755, true);
        }

        $file_name = $_FILES["author_avatar"]["name"];
        $file_tmp  = $_FILES["author_avatar"]["tmp_name"];
        $ext       = pathinfo($file_name, PATHINFO_EXTENSION);

        if (in_array($ext, ['jpeg', 'jpg', 'png', 'gif','PNG', 'jfif'])) {
            $newFileName = uniqid('author') . $file_name;
            $uploadPath = $uploadDirectory . $newFileName;

            if (move_uploaded_file($file_tmp, $uploadPath)) {
                $image_file_path= $uploadURL . $newFileName;
            }
        }

        $AuthorArray = array();
        $AuthorArray["first_name"]     = $firstname;
        $AuthorArray["last_name"]      = $lastname;
        $AuthorArray["author_image"]   = $image_file_path;
        $AuthorArray["created_on"]     = date('Y-m-d H:i:s');

        $columns = implode(", ",array_keys($AuthorArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($AuthorArray));
        $values  = implode("', '", $escaped_values);
        $AddAuthorQuery = "INSERT INTO tbl_author ($columns) VALUES ('$values')";
        $ExecuteAddAuthorQuery = mysqli_query($conn,$AddAuthorQuery) or die ("Error in query: $AddAuthorQuery. ".mysqli_error($conn));

        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Author Added Successfuly";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "add_favourite"){
    try {

        $get_uid		= addslashes((trim($_REQUEST['uid'])));
        $get_bookid   	= addslashes((trim($_REQUEST['book_id'])));

        $FavouriteArray = array();
        $FavouriteArray["uid"]     = $get_uid;
        $FavouriteArray["book_id"] = $get_bookid;

        $columns = implode(", ",array_keys($FavouriteArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($FavouriteArray));
        $values  = implode("', '", $escaped_values);
        $AddFavouriteQuery = "INSERT INTO tbl_favourites ($columns) VALUES ('$values')";
        $ExecuteAddFavouriteQuery = mysqli_query($conn,$AddFavouriteQuery) or die ("Error in query: $AddFavouriteQuery. ".mysqli_error($conn));

        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Added to Favourites";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "delete_favourite"){
    try {

        $get_uid		= addslashes((trim($_REQUEST['uid'])));
        $get_bookid   	= addslashes((trim($_REQUEST['book_id'])));

        $DeleteFavouriteQuery = "DELETE FROM tbl_favourites WHERE uid = '$get_uid' AND book_id = '$get_bookid' ";
        $ExecuteDeleteFavouriteQuery = mysqli_query($conn,$DeleteFavouriteQuery) or die ("Error in query: $DeleteFavouriteQuery. ".mysqli_error($conn));

        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Deleted from Favourites";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "reserve_book"){
    try {
        $get_uid		= addslashes((trim($_REQUEST['getSelectedUID'])));
        $get_bookid   	= addslashes((trim($_REQUEST['getSelectedBID'])));
        $get_pickupdate = addslashes((trim($_REQUEST['getSelectedPickupDate'])));
        $get_slotid   	= addslashes((trim($_REQUEST['getSelectedSlot'])));
        $get_status   	= addslashes((trim($_REQUEST['getStatus'])));

        // Convert string to DateTime object
        $date = DateTime::createFromFormat('m-d-Y', $get_pickupdate);

        // Add 10 days
        $date->add(new DateInterval('P10D'));

        // Format the date as required
        $new_date = $date->format('m-d-Y');
      
        $RecordArray = array();
        $RecordArray["user_id"]         = $get_uid;
        $RecordArray["book_id"]         = $get_bookid;
        $RecordArray["slot_id"]         = $get_slotid;
        $RecordArray["pickup_date"]     = $get_pickupdate;
        $RecordArray["return_date"]     = $new_date;
        $RecordArray["status"]          = $get_status;
        $RecordArray["created_on"]      = date('Y-m-d H:i:s');

        $columns = implode(", ",array_keys($RecordArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($RecordArray));
        $values  = implode("', '", $escaped_values);

        $AddTransactions = "INSERT INTO tbl_transaction ($columns) VALUES ('$values')";
        $ExecuteAddTransactionsQuery = mysqli_query($conn,$AddTransactions) or die ("Error in query: $AddTransactions. ".mysqli_error($conn));

        if($get_status == "Borrow"){
            $ResponseArray["status"]  = "200";
            $ResponseArray["message"] = "Book borrow request sent to admin.";
        }else{
            $ResponseArray["status"]  = "200";
            $ResponseArray["message"] = "Book Reserved Successfully.";
        }
        

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
}else{
    $ResponseArray["status"]  = "404";
    $ResponseArray["message"] = "Invalid Action.";
}

$Response	=	json_encode($ResponseArray, true);

echo $Response;
exit;

?>


