<?php
$username = "";
$email = "";
$errors = [];

$con = new mysqli('localhost', 'root', '', 'test1');


// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>

