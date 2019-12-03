<?php

require 'connect.php';

$_POST['grade'];
$id=$_POST['id'];
$i=0;
foreach($_POST['grade'] as $grade){

    $sql="UPDATE grades SET grade='$grade' WHERE id='$id[$i]'";
    $result = mysqli_query($con,$sql);
    $i++;
}

