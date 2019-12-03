<?php

require_once 'connect.php';

get_calendar_course();

function get_calendar_users()
{
    $con=connect();

    $sql = "SELECT name, class_id,id FROM pupils";

    if($result = mysqli_query($con,$sql))
    {
        return $result;
    }
    else
    {
        http_response_code(404);
    }
}

function get_calendar_course()
{
    $con=connect();

    $sql = "SELECT name, leader,id FROM course";

    if($result = mysqli_query($con,$sql))
    {
        return $result;
    }
    else
    {
        http_response_code(404);
    }
}
