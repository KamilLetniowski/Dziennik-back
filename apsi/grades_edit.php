<?php
require 'connect.php';

$id=$_GET['id'];
$name=$_GET['subject'];

$sql="SELECT grade,type,id FROM grades WHERE pupil_id='$id'AND subject='$name'";
$result = mysqli_query($con,$sql);

echo "<form method='post' action='grades_update.php'>";
while($row = mysqli_fetch_assoc($result))
{
    $grade=$row['grade'];
    $type=$row['type'];
    $id=$row['id'];
    echo $type." <input type='text' name='grade[]' value='$grade'>"."<br>";
    echo " <input type='hidden' name='id[]' value='$id'>"."<br>";
}

echo "<input type='submit' value='Aktualizuj'>";
echo "</form>";

?>

