<?php
include "../includes/config.php";
include "../includes/functions.php";

$ResponseArray 	= 	array();
$ErrorResponse  =    "";
$Action			=	stripslashes(trim($_REQUEST["action"]));
$HtmlContent    =    "";

if(isset($Action) && $Action == "login"){
    try {

        $email		= addslashes((trim($_REQUEST['username'])));
        $password	= addslashes((trim($_REQUEST['password'])));

        $CheckUserQuery = "SELECT * FROM tbl_student WHERE email = '$email' AND password = '$password'";
        $CheckUserQueryResults = mysqli_query($conn,$CheckUserQuery);

        if (mysqli_num_rows($CheckUserQueryResults) > 0) 
        {
            while($record = mysqli_fetch_assoc($CheckUserQueryResults)) 
            {
                
                $_SESSION["logged_in"] = true;
                $_SESSION["uid"]       = $record["id"];
                $_SESSION["username"]  = $record["username"];
                $_SESSION["useremail"] = $record["email"];
                
            }

            $ResponseArray["status"]  = "200";
            $ResponseArray["message"] = "Login Successfull.";
        } else {
            $ResponseArray["status"]  = "300";
            $ResponseArray["message"] = "Incorrect username or password.";
        }

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
}else if(isset($Action) && $Action == "register"){

    try {
        $email	    = addslashes((trim($_REQUEST['regemail'])));
        $password	= addslashes((trim($_REQUEST['regpassword'])));
        $username	    = addslashes((trim($_REQUEST['regusername'])));

        $LoginArray = array();
        $LoginArray["email"]         = $email;
        $LoginArray["password"]      = $password;
        $LoginArray["username"]      = $username;

        $columns = implode(", ",array_keys($LoginArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($LoginArray));
        $values  = implode("', '", $escaped_values);
        $AddNewUserQuery = "INSERT INTO tbl_student ($columns) VALUES ('$values')";
        $ExecuteAddNewUserQuery = mysqli_query($conn,$AddNewUserQuery) or die ("Error in query: $AddNewUserQuery. ".mysqli_error($conn));
        
        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Registration Successfull.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "admin"){

    try {

        $email		= addslashes((trim($_REQUEST['username'])));
        $password	= addslashes((trim($_REQUEST['password'])));

        $CheckUserQuery = "SELECT * FROM tbl_student WHERE email = '$email' AND password = '$password'";
        $CheckUserQueryResults = mysqli_query($conn,$CheckUserQuery);

        if (mysqli_num_rows($CheckUserQueryResults) > 0) 
        {
            while($record = mysqli_fetch_assoc($CheckUserQueryResults)) 
            {
                
                $_SESSION["admin_logged_in"] = true;
                $_SESSION["aid"]       = $record["id"];
                $_SESSION["adminname"]  = $record["username"];
                $_SESSION["adminemail"] = $record["email"];
                
            }

            $ResponseArray["status"]  = "200";
            $ResponseArray["message"] = "Admin Login Successfull.";
        } else {
            $ResponseArray["status"]  = "300";
            $ResponseArray["message"] = "Incorrect username or password.";
        }

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "pull_notification"){

    try {

        $view		= addslashes((trim($_REQUEST['view'])));
        $rid		= addslashes((trim($_SESSION["uid"])));

        if($_POST["view"] == 'Y')
        {
            $update_query = "UPDATE tbl_notification SET status = 1 WHERE receiver_id = '$rid'";
            mysqli_query($conn, $update_query); 
        }

        $Query   = "SELECT * FROM tbl_notification WHERE receiver_id = '$rid' ORDER BY id DESC LIMIT 10";
        $Result  = mysqli_query($conn, $Query);
        $Content = '';

        if (mysqli_num_rows($Result) > 0) 
        {
            while($Record = mysqli_fetch_assoc($Result)) 
            {
                $display = '';
                if($Record["status"] == 0)
                {
                    $display = 'unread';
                }
              
                $Content .= ' <div class="notif_card '.$display.'">
                <img src="./assets/images/avatar-mark-webber.webp" style="width: 50px;" alt="avatar" />
                <div class="description">
                    <p class="user_activity" style="margin: 0px;">
                    <strong>'.$Record["subject"].'</strong> <br>
                    <b>'.$Record["message"].'</b>
                    </p>
                    <p class="time">'.time_elapsed_string($Record["created_on"]).'</p>
                </div>
                </div>';
            }

       
        }else{
            $Content .= '<div class="notif_card unread"><div class="description" style="text-align: center;width: 100%;">No Notifications
            </div></div>';
        
        }

        $GetCount     = "SELECT * FROM tbl_notification WHERE receiver_id = '$rid' AND status = 0";
        $CountResults = mysqli_query($conn, $GetCount);
        $count        = mysqli_num_rows($CountResults);

        $ResponseArray["status"]  = "200";
        $ResponseArray["content"] = $Content;
        $ResponseArray["count"]   = $count;


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


