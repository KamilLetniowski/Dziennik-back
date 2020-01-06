<?php

require 'connect.php';

//$grade=$_GET['grades'];
//$id=$_GET['ids'];

//$grade = ["2", "2"];
//$id = ["18", "19"];
//
//for($i=0; $i<sizeof($grade); $i++)
//{
//    $sql = "UPDATE grades SET grade='$grade[$i]' WHERE id='$id[$i]'";
//    $result = mysqli_query($con, $sql);
//
//}

//$i = 0;
//foreach ($grade as $grades) {
//
//    $sql = "UPDATE grades SET grade='$grades' WHERE id='$id[$i]'";
//    $result = mysqli_query($con, $sql);
//    $i++;
//}
//
//die;
//exit;

$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata)) {
    // Extract the data.
    $request = json_decode($postdata);


    // Sanitize.
    $grade = $request->grades;
    $id = $request->ids;


    for($i=0; $i<sizeof($grade); $i++)
    {
        $sql = "UPDATE grades SET grade='$grade[$i]' WHERE id='$id[$i]'";
        $result = mysqli_query($con, $sql);

    }
}

