<?php
require 'connect.php';

$id=$_GET['id'];
$name=$_GET['name'];

$sql="SELECT grade,type,id FROM grades WHERE pupil_id='$id'AND subject='$name'";
$result = mysqli_query($con,$sql);

$grades = [];
$cr=0;
while($row = mysqli_fetch_assoc($result))
{
    $grades[$cr]['grade']=$row['grade'];
    $grades[$cr]['type']=$row['type'];
    $grades[$cr]['id']=$row['id'];

    $cr++;

//    echo $type." <input type='text' name='grade[]' value='$grade'>"."<br>";
//    echo " <input type='hidden' name='id[]' value='$id'>"."<br>";
}

echo json_encode(['data'=>$grades]);


?>

