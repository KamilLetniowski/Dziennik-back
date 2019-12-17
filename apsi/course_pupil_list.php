<?php
/**
 * Returns the list of cars.
 */
require 'connect.php';

$id=$_GET['id'];

$coursePupil = [];
$sql = "SELECT a.pupil, a.course,p.id, p.name AS pupil, p.class_id AS class FROM pupil_course AS a
        INNER JOIN pupils AS p WHERE a.pupil=p.id AND a.course='$id'";


if($result = mysqli_query($con,$sql))
{
    $cr = 0;

    while($row = mysqli_fetch_assoc($result))
    {
        $coursePupil[$cr]['name']=$row['pupil'];
        $coursePupil[$cr]['class']=$row['class'];
        $cr++;
    }

    echo json_encode(['data'=>$coursePupil]);
}
else
{
    http_response_code(404);
}
