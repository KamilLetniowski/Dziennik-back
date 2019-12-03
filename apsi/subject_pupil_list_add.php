<?php
require 'connect.php';
$grade_type=$_POST['grade_type'];
$name=$_POST['subject'];
$date=$_POST['date'];
$id=$_POST['check_list2'];
$type=$_POST['type'];


if(isset($_POST['check_list']))
{
    foreach($_POST['check_list'] as $item){

        $sql="SELECT * FROM presence WHERE pupil_id='$item'AND subject_name='$name' AND date='$date'";

        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result) == 0){
            $sql="INSERT INTO presence (pupil_id,subject_name,date) VALUE ('$item','$name','$date')";
            mysqli_query($con, $sql);
        }
        elseif(mysqli_num_rows($result) > 0 && !isset($item))
        {
            $sql="DELETE FROM presence WHERE id='$id[$i]'";
            echo "2";
            die;
            exit;
            mysqli_query($con, $sql);
        }
        if(mysqli_num_rows($result) > 0)
        {
            echo "działa";
        }
        if($item=='')
        {
            echo "działa2";
        }


    }
}


$i=0;
foreach($_POST['grade_list'] as $grade){
    $id_pos=$id[$i];
    $sql="INSERT INTO grades (grade,rating,pupil_id,subject,type) VALUE ('$grade','$grade_type','$id_pos','$name','$type')";
    mysqli_query($con, $sql);
    $i++;
}

