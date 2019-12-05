<?php
$name = $_GET['name'];
$leader = $_GET['leader'];
$class = $_GET['class_id'];


require 'connect.php';

$subject = [];
$sql = "SELECT name,  leader , date, class_id FROM subject
        WHERE name='$name' AND leader='$leader' AND class_id='$class'";


if ($result = mysqli_query($con, $sql)) {
    $cr = 0;

    while ($row = mysqli_fetch_assoc($result)) {
       
	$subject[$cr]['name'] = $row['name'];
	$subject[$cr]['date'] = $row['date'];
	$subject[$cr]['class_id'] = $row['class_id'];
	$cr++;
    }

   echo json_encode(['data'=>$subject]);
} else {
    http_response_code(404);
}

