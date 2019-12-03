<?php

$name=$_GET['name'];
$date=$_GET['date'];
$class=$_GET['class'];


require 'connect.php';

$cars = [];
$sql = "SELECT name, id FROM pupils WHERE class_id='$class'";


if($result = mysqli_query($con,$sql))
{
    $cr = 0;

    echo "<form method='post' action='subject_pupil_list_add.php'>";
    while($row = mysqli_fetch_assoc($result))
    {
        $id= $row['id'];
        $sql2="SELECT * FROM presence WHERE pupil_id='$id' AND subject_name='$name' AND date='$date'";
        $result2 = mysqli_query($con,$sql2);
        $row2 = mysqli_fetch_assoc($result2);
        if($row2)
        {
            echo $row['name']."<input type='checkbox' checked name='check_list[]' value='".  $row['id'] ."'>"."  "."<input type='text' name='grade_list[]' placeholder='Wpisz ocenę'>";
        }
        else
        {
            echo $row['name']."<input type='checkbox' name='check_list[]' value='".  $row['id'] ."'>"."  "."<input type='text' name='grade_list[]' placeholder='Wpisz ocenę'>";
        }

        $sql3="SELECT grade, rating FROM grades WHERE pupil_id='$id'AND subject='$name'";
        $result3 = mysqli_query($con,$sql3);
        $i=0;
        $sum1=0;
        $sum2=0;
        while($row3 = mysqli_fetch_assoc($result3))
        {
            if($row3['rating']==0.6)
            {
                $sum1+=$row3['grade']*0.5;
                $i++;
            }
            else{
                $sum2+=$row3['grade']*0.5;
            }
            echo " ".$row3['grade']." || ";

        }
        if($sum2==0)
        {
            echo "Średnia:".$sum1/0.5;
        }
        else if($sum1==0)
        {
            echo "Średnia:".$sum2/0.5;
        }
        else
        {
            echo "Średnia:".(($sum1/($i*0.5))+$sum2/0.5)/2;
        }


        echo "<a href='grades_edit.php?id=$id&subject=$name'><input type='button' value='Edytuj oceny'></a>";

        echo "<br>";
        echo "<input type='hidden' name='check_list2[]' value='$id'>";
    }
    echo "<input type='hidden' name='subject' value='$name'>";
    echo "<input type='hidden' name='date' value='$date'>";
    echo "<select name='grade_type'>
             <option value='0.6'>Kartkówka</option>
            <option value='1.0'>Sprawdzian</option>
             <option value='0.6'>Odpowiedź ustna</option>
            </select>";

    echo "Nazwa sprawdzenia wiedzy<input type='text' name='type'>";
    echo "<input type='submit' value='Aktualizuj'>";

    echo "</form>";
//    echo json_encode(['data'=>$cars]);
}
else
{
    http_response_code(404);
}
