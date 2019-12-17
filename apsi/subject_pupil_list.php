<?php
$name=$_GET['name'];
$date=$_GET['date'];
$class=$_GET['class_id'];
require 'connect.php';
$pupils = [];
$sql = "SELECT name, id, class_id FROM pupils WHERE class_id='$class'";

if($result = mysqli_query($con,$sql))
{
    $cr = 0;
    while($row = mysqli_fetch_assoc($result))
    {
        $id= $row['id'];
        $sql3 = "SELECT grade, rating FROM grades WHERE pupil_id='$id'AND subject='$name'";
        $result3 = mysqli_query($con,$sql3);
        $grade='';
        $i=0;
        $j=0;
        $sum1=0;
        $sum2=0;
        while($row3 = mysqli_fetch_assoc($result3))
        {
            $grade.= " ".$row3['grade']." ||";


            if($row3['rating']==0.5)
            {
                $sum1+=$row3['grade']*0.5;
                $i++;
            }
            else{
                $sum2+=$row3['grade']*0.5;
                $j++;
            }
//            echo " ".$row3['grade']." || ";


        if($sum2==0)
        {
            $sum=$sum1/($i*0.5);
        }
        else if($sum1==0)
        {
            $sum=$sum2/($j*0.5);
        }
        else
        {
            $sum=(($sum1/($i*0.5))+$sum2/0.5)/2;
        }

        $pupils[$cr]['average'] = $sum;
        }



        $sql2="SELECT * FROM presence WHERE pupil_id='$id' AND subject_name='$name' AND date='$date'";
        $result2 = mysqli_query($con,$sql2);
        $row2 = mysqli_fetch_assoc($result2);

        if($row2)
        {
            $pupils[$cr]['presence'] = true;

//            echo $row['name']."<input type='checkbox' checked name='check_list[]' value='".  $row['id'] ."'>"."  "."<input type='text' name='grade_list[]' placeholder='Wpisz ocenę'>";
        }
        else
        {
            $pupils[$cr]['presence'] = false;

//            echo $row['name']."<input type='checkbox' name='check_list[]' value='".  $row['id'] ."'>"."  "."<input type='text' name='grade_list[]' placeholder='Wpisz ocenę'>";
        }

        $pupils[$cr]['name'] = $row['name'];
        $pupils[$cr]['classId'] = $row['class_id'];
        $pupils[$cr]['grade'] = $grade;
        $pupils[$cr]['id'] = $id;


//

        $cr++;



    }
    echo json_encode(['data'=>$pupils]);

}
else
{
    http_response_code(404);
}
