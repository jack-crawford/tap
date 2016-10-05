<?php
include "common.php";

$db_server = mysqli_connect("$hostname", "$username", "$password", "$dbname");
 
$query = "INSERT INTO users (fname, lname, email, pwd, code) VALUES ('Nika', 'S', 'nika', 'nika', 'NIKA');";
//$check_user_query = mysqli_query($db_server, $query);

$second_query = "SELECT code FROM users WHERE lname = 'C';";
$run = mysqli_query($db_server, $second_query);
$user_result = mysqli_fetch_array($run, MYSQLI_ASSOC);
$count_user = $user_result['fname'];
echo $count_user;

$new_code = "NIKA";
$query = "SELECT fname FROM users WHERE code = '$new_code' LIMIT 1;";
echo $query;
$check_user_query = mysqli_query($db_server, $query);
$user_result = mysqli_fetch_array($check_user_query, MYSQLI_ASSOC);
$count_user = $user_result['fname'];
echo $count_user; 
$query = "SELECT code FROM users WHERE fname = 'Jack' LIMIT 1;";
echo $query;
$check_user_query = mysqli_query($db_server, $query);
$user_result = mysqli_fetch_array($check_user_query, MYSQLI_ASSOC);
$count_user = $user_result['code'];
echo $count_user;
?>