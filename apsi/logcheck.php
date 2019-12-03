<?php
/**
 * Returns the list of cars.
 */

require 'connect.php';

$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata)) {
    // Extract the data.
    $request = json_decode($postdata);


    // Validate.
    if (trim($request->username) === '' || trim($request->pass) === '') {
        return http_response_code(400);
    }

    // Sanitize.
    $name = mysqli_real_escape_string($con, trim($request->username));
    $pass = mysqli_real_escape_string($con, trim($request->pass));

    $sql = "SELECT name, pass FROM user WHERE '$name'=name AND '$pass'=pass ";

    $result = mysqli_query($con, $sql);

    $i = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        $i++;
    }


    if ($i > 0) {
        http_response_code(200);
    } else {
        http_response_code(404);

    }
}
