<?php
require_once "config.php";
// Retrieve raw POST data
$jsonData = file_get_contents("php://input");

// Decode JSON data
$data = json_decode($jsonData, true);

// Access the 'final_res' key
$finalRes = $data['final_res'];

// Print or process $finalRes as needed
print_r($data);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $data['username'];
    $final_res = json_encode($data['final_res']);
    // Prepare a select statement
    $sql = "INSERT INTO `predict_report`(`username`, `predata`) VALUES ('$username','$final_res')";
    $res = mysqli_query($link,$sql);

    // Close connection
    mysqli_close($link);
}
