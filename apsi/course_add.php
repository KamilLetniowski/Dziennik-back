<?php
require 'connect.php';

$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata)) {
    // Extract the data.
    $request = json_decode($postdata);


    // Validate.
    if (trim($request->cname) === '' || trim($request->cleader) === '') {
        return http_response_code(400);
    }

    // Sanitize.
    $cName = mysqli_real_escape_string($con, trim($request->cname));
    $cLeader = mysqli_real_escape_string($con, trim($request->cleader));

    $sql = "INSERT INTO `course`(`name`,`leader`) VALUES ('$cName','$cLeader')";
//    mysqli_query($con,$sql);
    if (mysqli_query($con, $sql)) {
        http_response_code(201);
    } else {
        http_response_code(422);
    }
}
