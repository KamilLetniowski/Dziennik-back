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
        ?><a href="subject_date_list.php?name=<?php echo $row['name']?>&leader=<?php echo $row['leader']?>&class_id=<?php echo $row['class_id']?>">
        <?php
        echo $cars[$cr]['model'] = $row['name']." ";
        echo $cars[$cr]['price'] = $row['leader']." ";
        echo $cars[$cr]['price'] = $row['class_id']." ";
        ?>
        </a><br>
        <?php
        $cr++;
    }

//    echo json_encode(['data'=>$cars]);
}
else
{
    http_response_code(404);
}

