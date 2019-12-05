<?php
require 'connect.php';

$cars = [];
$sql="SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))";

mysqli_query($con,$sql);

$sql = "SELECT name, leader, class_id FROM subject GROUP BY name, class_id";

if($result = mysqli_query($con,$sql))
{
    $cr = 0;

    while($row = mysqli_fetch_assoc($result))
    {
        $cars[$cr]['name'] = $row['name']." ";
        $cars[$cr]['leader'] = $row['leader']." ";
        $cars[$cr]['classId'] = $row['class_id']." ";
        $cr++;
    }

    echo json_encode(['data'=>$cars]);
}
else
{
    http_response_code(404);
}

