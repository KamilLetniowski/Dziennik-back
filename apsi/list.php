<?php
/**
 * Returns the list of cars.
 */
require 'connect.php';

$cars = [];
$sql = "SELECT id, name , leader FROM course";

if($result = mysqli_query($con,$sql))
{
    $cr = 0;

    while($row = mysqli_fetch_assoc($result))
    {
     ?><a href="course_pupil_list.php?id=<?php echo $row['id']?>">
        <?php
       echo $cars[$cr]['leader'] = $row['leader'];
       echo $cars[$cr]['name'] = $row['name'];
       ?>
        </a><br>
        <?php
    $cr++;
    }
	

   echo json_encode(['data'=>$cars]);
}
else
{
    http_response_code(404);
}
