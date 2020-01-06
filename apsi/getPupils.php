<?php

require_once 'connect.php';
get_calendar_users();

function get_calendar_users()
{
    $con=connect();

    $sql = "SELECT name, class_id,id FROM pupils";

    $pupils=[];
    if($result = mysqli_query($con,$sql))
    {
        $cr=0;
        while ($row = mysqli_fetch_assoc($result)) {

            $pupils[$cr]['name'] = $row['name'];
            $pupils[$cr]['class_id'] = $row['class_id'];
            $pupils[$cr]['id'] = $row['id'];
            $cr++;
        }

        echo json_encode(['data'=>$pupils]);
    }
    else
    {
        http_response_code(404);
    }
}

