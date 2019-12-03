<?php
/**
 * Returns the list of cars.
 */
require 'connect.php';

$id=$_GET['id'];

$cars = [];
$sql = "SELECT a.pupil, a.course,p.id, p.name AS pupil, p.class_id AS class FROM pupil_course AS a
        INNER JOIN pupils AS p WHERE a.pupil=p.id AND a.course='$id'";


if($result = mysqli_query($con,$sql))
{
    $cr = 0;

    while($row = mysqli_fetch_assoc($result))
    {
        echo $row['pupil']." ".$row['class']."<br>";
    }

//    echo json_encode(['data'=>$cars]);
}
else
{
    http_response_code(404);
}
