<?php
include "../includes/config.php";

$ResponseArray 	= 	array();
$ErrorResponse  =    "";
$Action			=	stripslashes(trim($_REQUEST["action"]));
$HtmlContent    =    "";

if(isset($Action) && $Action == "delete_timeslot"){
    try {

        $id	    = addslashes((trim($_REQUEST['id'])));
    
        $DeleteTimeSlotQuery = "DELETE FROM tbl_time_slots WHERE id = '$id'";
        $ExecuteDeleteFavouriteQuery = mysqli_query($conn,$DeleteTimeSlotQuery) or die ("Error in query: $DeleteTimeSlotQuery. ".mysqli_error($conn));


        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Time Slot Deleted.";
       

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
    }

    $Response	=	json_encode($ResponseArray, true);

    echo $Response;
    exit;
}else if(isset($Action) && $Action == "add_timeslot"){

    try {
        $from_time	    = $_REQUEST['from_time'];
        $to_time	    = $_REQUEST['to_time'];

        $AddTimeSlotQuery ="INSERT INTO tbl_time_slots (from_time, to_time) VALUES ";
        for($i=0; $i<count($from_time); $i++) {
            $AddTimeSlotQuery .="('".$from_time[$i]."', '".$to_time[$i]."'),";
        }
        $AddTimeSlotQuery = rtrim($AddTimeSlotQuery, ','); 

        $ExecuteAddTimeSlotQuery = mysqli_query($conn,$AddTimeSlotQuery) or die ("Error in query: $AddTimeSlotQuery. ".mysqli_error($conn));
        
        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "New Time Slot Added.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "update_timeslot"){

    try {

        $id		= addslashes((trim($_REQUEST['id'])));
        $column	= addslashes((trim($_REQUEST['column'])));
        $value	= addslashes((trim($_REQUEST['value'])));

        $UpdateTimeSlotQuery = "UPDATE tbl_time_slots SET $column = '$value' WHERE id = $id";
        $CheckUpdateTimeSlotResults = mysqli_query($conn,$UpdateTimeSlotQuery);

        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Time Slot Updated.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "book_requests"){
    try {

        $currentDate = date("m-d-Y"); // Get current date in YYYY-MM-DD format


        $GetRequests = "SELECT 
                            tbl_transaction.id AS request_id, 
                            tbl_student.username, 
                            tbl_student.email, 
                            tbl_books.book_title, 
                            CONCAT(tbl_time_slots.from_time,' - ',tbl_time_slots.to_time) AS slot, 
                            tbl_transaction.pickup_date AS pickup_date, 
                            tbl_transaction.return_date AS return_date , 
                            tbl_transaction.status 
                        FROM 
                            tbl_transaction 
                        LEFT JOIN 
                            tbl_student ON tbl_transaction.user_id = tbl_student.id 
                        LEFT JOIN 
                            tbl_books ON tbl_transaction.book_id = tbl_books.id 
                        LEFT JOIN 
                            tbl_time_slots ON tbl_transaction.slot_id = tbl_time_slots.id ";
        
        $GetRequestsResults = mysqli_query($conn,$GetRequests);
        $ListArray = array();

        if (mysqli_num_rows($GetRequestsResults) > 0) 
        {
            while($record = mysqli_fetch_assoc($GetRequestsResults)) 
            {
                $data = array();
                $data["request_id"]   = $record["request_id"];
                $data["username"]     = $record["username"];
                $data["email"]        = $record["email"];
                $data["book_title"]   = $record["book_title"];
                $data["slot"]         = $record["slot"];
                $data["return_date"]  = $record["return_date"];
                $data["pickup_date"]  = $record["pickup_date"];
                $data["status"]       = $record["status"];

                array_push($ResponseArray,$data);
    
            }
    
        }

    } catch (Exception $ex) {
        $ResponseArray["data"] = $ex->getMessage();
    }
}else if(isset($Action) && $Action == "due_requests"){
    try {

        $currentDate = date("m-d-Y"); // Get current date in YYYY-MM-DD format


        $GetRequests = "SELECT 
                            tbl_transaction.id AS request_id, 
                            tbl_student.username, 
                            tbl_student.email, 
                            tbl_books.book_title, 
                            CONCAT(tbl_time_slots.from_time,' - ',tbl_time_slots.to_time) AS slot, 
                            tbl_transaction.pickup_date AS pickup_date, 
                            tbl_transaction.return_date AS return_date , 
                            tbl_transaction.status 
                        FROM 
                            tbl_transaction 
                        LEFT JOIN 
                            tbl_student ON tbl_transaction.user_id = tbl_student.id 
                        LEFT JOIN 
                            tbl_books ON tbl_transaction.book_id = tbl_books.id 
                        LEFT JOIN 
                            tbl_time_slots ON tbl_transaction.slot_id = tbl_time_slots.id 
                        WHERE 
                            tbl_transaction.return_date < '$currentDate'";
        
        $GetRequestsResults = mysqli_query($conn,$GetRequests);
        $ListArray = array();

        if (mysqli_num_rows($GetRequestsResults) > 0) 
        {
            while($record = mysqli_fetch_assoc($GetRequestsResults)) 
            {
                $data = array();
                $data["request_id"]   = $record["request_id"];
                $data["username"]     = $record["username"];
                $data["email"]        = $record["email"];
                $data["book_title"]   = $record["book_title"];
                $data["slot"]         = $record["slot"];
                $data["return_date"]  = $record["return_date"];
                $data["pickup_date"]  = $record["pickup_date"];
                $data["status"]       = $record["status"];

                array_push($ResponseArray,$data);
    
            }
    
        }

    } catch (Exception $ex) {
        $ResponseArray["data"] = $ex->getMessage();
    }
}else if(isset($Action) && $Action == "user_due_requests"){
    try {

        $currentDate = date("m-d-Y"); // Get current date in YYYY-MM-DD format
        
        $GetRequests = "SELECT 
                            tbl_transaction.id AS request_id, tbl_transaction.user_id,
                            tbl_student.username, 
                            tbl_student.email, 
                            tbl_books.book_title, 
                            CONCAT(tbl_time_slots.from_time,' - ',tbl_time_slots.to_time) AS slot, 
                            tbl_transaction.pickup_date AS pickup_date, 
                            tbl_transaction.return_date AS return_date , 
                            tbl_transaction.status 
                        FROM 
                            tbl_transaction 
                        LEFT JOIN 
                            tbl_student ON tbl_transaction.user_id = tbl_student.id 
                        LEFT JOIN 
                            tbl_books ON tbl_transaction.book_id = tbl_books.id 
                        LEFT JOIN 
                            tbl_time_slots ON tbl_transaction.slot_id = tbl_time_slots.id 
                        WHERE tbl_transaction.user_id='".$_SESSION['uid']."'";
        
        $GetRequestsResults = mysqli_query($conn,$GetRequests);
        $ListArray = array();

        if (mysqli_num_rows($GetRequestsResults) > 0) 
        {
            while($record = mysqli_fetch_assoc($GetRequestsResults)) 
            {
                $data = array();
                $data["request_id"]   = $record["request_id"];
                $data["username"]     = $record["username"];
                $data["email"]        = $record["email"];
                $data["book_title"]   = $record["book_title"];
                $data["slot"]         = $record["slot"];
                $data["return_date"]  = $record["return_date"];
                $data["pickup_date"]  = $record["pickup_date"];
                $data["status"]       = $record["status"];

                array_push($ResponseArray,$data);
    
            }
    
        }

    } catch (Exception $ex) {
        $ResponseArray["data"] = $ex->getMessage();
    }
}else if(isset($Action) && $Action == "edit_requests"){
    try {

        $id		= addslashes((trim($_REQUEST['request_id'])));
        $status	= addslashes((trim($_REQUEST['status'])));

        $UpdateTQuery = "UPDATE tbl_transaction SET status = '$status' WHERE id = $id";
        $CheckUpdateTResults = mysqli_query($conn,$UpdateTQuery);

        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Request Updated.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
}else if(isset($Action) && $Action == "due_requests"){
    try {

        $id		= addslashes((trim($_REQUEST['request_id'])));
        $status	= addslashes((trim($_REQUEST['status'])));

        $return_date = addslashes((trim($_REQUEST['rdate'])));
        $currentDate = date("m-d-Y");
        
        // Create DateTime objects for the return date and current date
        $returnDateTime = DateTime::createFromFormat("m-d-Y", $return_date);
        $currentDateTime = DateTime::createFromFormat("m-d-Y", $currentDate);

        // Calculate the difference in days between return date and current date
        $interval = $currentDateTime->diff($returnDateTime);
        $daysLate = $interval->days;

        // Define the fine per day
        $finePerDay = 10;

        // Calculate the total fine
        $due_amount = $daysLate * $finePerDay;

        if($status=="Overdue"){
            $AddDue = "INSERT INTO tbl_dues (transaction_id, due_amount, status) VALUES($id, $due_amount, 'Pending')";
            $AddDueResults = mysqli_query($conn,$AddDue);
        }else if($status=="Paid"){
            $AddDue = "UPDATE tbl_dues SET status = '$status' WHERE transaction_id = $id";
            $AddDueResults = mysqli_query($conn,$AddDue);
        }

       
        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Due Updated.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
}else if(isset($Action) && $Action == "delete_requests"){

}else{
    $ResponseArray["status"]  = "404";
    $ResponseArray["message"] = "Invalid Action.";
}

$Response	=	json_encode($ResponseArray, true);

echo $Response;
exit;

?>


