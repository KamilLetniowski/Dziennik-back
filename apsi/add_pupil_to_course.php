<?php

require 'connect.php';

$pupil=$_POST['choose_kurwiszon'];
$course=$_POST['choose_course'];

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


$sql = "INSERT INTO `pupil_course`(`pupil`,`course`) VALUES ('$pupil','$course')";
//    mysqli_query($con,$sql);
if(mysqli_query($con,$sql))
{
//    http_response_code(201);
//    $user = [
//        'name' => $name,
//        'class_id' => $class,
////            'id'    => mysqli_insert_id($con)
//    ];
//    echo json_encode(['data'=>$user]);
    echo "DODANO";
}
else
{
    http_response_code(422);
}
//}

