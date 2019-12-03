<?php

require 'connect.php';


$subject = $_POST['subject'];
$leader = $_POST['leader'];
$date = $_POST['date'];
$end = $_POST['date_end'];
$class = $_POST['class'];

//$postdata = file_get_contents("php://input");
//
//if(isset($postdata) && !empty($postdata))
//{
//    // Extract the data.
//    $request = json_decode($postdata);
//
//
//    // Validate.
//    if(trim($request->username) === '' || trim($request->pass) === '')
//    {
//        return http_response_code(400);
//    }
//
//    // Sanitize.
//    $name = mysqli_real_escape_string($con, trim($request->username));
//    $pass = mysqli_real_escape_string($con, trim($request->pass));


// Store.
for($i=0; $date<=$end; $i++)
{
    $sql = "INSERT INTO `subject`(`name`,`leader`,`class_id`,`date`) VALUES ('$subject','$leader','$class','$date')";

    $date =date('Y-m-d H:i', strtotime($date. ' + 7 days'));

    if (mysqli_query($con, $sql)) {
        http_response_code(201);
    } else {
        http_response_code(422);
    }
}


//    mysqli_query($con,$sql);

