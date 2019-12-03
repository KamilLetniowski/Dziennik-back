<?php
require 'connect.php';


$name=$_POST['kurwiszon'];
$last=$_POST['kurwiszon_sur'];
$class=$_POST['kurwiszon_class'];

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
    $sql = "INSERT INTO `pupils`(`name`,`class_id`,`course_id`) VALUES ('$name','$class',null)";
//    mysqli_query($con,$sql);
    if(mysqli_query($con,$sql))
    {
        http_response_code(201);
        $user = [
            'name' => $name,
            'class_id' => $class,
//            'id'    => mysqli_insert_id($con)
        ];
        echo json_encode(['data'=>$user]);
    }
    else
    {
        http_response_code(422);
    }
//}

