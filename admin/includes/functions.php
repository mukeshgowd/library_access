<?php

function getAllAuthors($conn){
    $GetAuthors = "SELECT * FROM tbl_author";
    $Results    = mysqli_query($conn,$GetAuthors);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]         = $record["id"];
            $data["firstname"]  = $record["first_name"];
            $data["lastname"]   = $record["last_name"];
            $data["image"]      = $record["author_image"];
            array_push($ListArray,$data);

        }

    }

    return $ListArray;
}

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

?>