<?php

require 'connect.php';

//$pupil=$_POST['choose_kurwiszon'];
//$course=$_POST['choose_course'];

$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata)) {
    // Extract the data.
    $request = json_decode($postdata);


    // Validate.
    if (trim($request->pid) === '' || trim($request->pcourse) === '') {
        return http_response_code(400);
    }

    // Sanitize.
    $pname = mysqli_real_escape_string($con, trim($request->pid));
    $pcourse = mysqli_real_escape_string($con, trim($request->pcourse));


// Store.


    $sql = "INSERT INTO `pupil_course`(`pupil`,`course`) VALUES ('$pname','$pcourse')";
//    mysqli_query($con,$sql);
    if (mysqli_query($con, $sql)) {
        echo "DODANO";
    } else {
        http_response_code(422);
    }
}

