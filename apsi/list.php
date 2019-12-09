<?php
/**
 * Returns the list of cars.
 */
require 'connect.php';

$course = [];
$sql = "SELECT name , leader, id FROM course";

if($result = mysqli_query($con,$sql))
{
    $cr = 0;

    while($row = mysqli_fetch_assoc($result))
    {
       $course[$cr]['leader'] = $row['leader'];
       $course[$cr]['name'] = $row['name'];
       $course[$cr]['id'] = $row['id'];
    $cr++;
    }

    echo json_encode(['data'=>$course]);
}
else
{
    http_response_code(404);
}
