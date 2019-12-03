<?php


$name = $_GET['name'];
$leader = $_GET['leader'];
$class = $_GET['class_id'];


require 'connect.php';

$cars = [];
$sql = "SELECT name,  leader , date, class_id FROM subject
        WHERE name='$name' AND leader='$leader' AND class_id='$class'";


if ($result = mysqli_query($con, $sql)) {
    $cr = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        ?><a href="subject_pupil_list.php?class=<?php echo $row['class_id']?>&name=<?php echo $row['name']?>&date=<?php echo $row['date']?>"><?php
    echo $row['name'].' '.$row['date']."<br>";?></a><?php
    }

//    echo json_encode(['data'=>$cars]);
} else {
    http_response_code(404);
}

