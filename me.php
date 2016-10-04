<?php
session_start();
if (!isset($_SESSION['name'])) {
  header("location: home.php?view=login");  
}
$name = $_SESSION['name'];
include "common.php";
echo "<link rel='stylesheet' type='text/css' href='style.css'><div id='view'>";
$fname = get_user_fname_from_user_email($name, $db_server);

echo "Hello, $fname </br>


</div>";
















?>