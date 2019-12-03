<?php

require 'connect.php';


echo $leader = $_POST['władca_kurwiszonow'];
echo $course_name = $_POST['kurwiszon_tortura'];

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
$sql = "INSERT INTO `course`(`name`,`leader`) VALUES ('$course_name','$leader')";
//    mysqli_query($con,$sql);
if (mysqli_query($con, $sql)) {
    http_response_code(201);
    $user = [
        'leader' => $leader,
        'course' => $course_name,
//            'id'    => mysqli_insert_id($con)
    ];
    echo json_encode(['data' => $user]);
} else {
    http_response_code(422);
}
//}

