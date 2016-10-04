<?php
if (!isset($_SESSION['name'])) {
  header("location: me.php?view=login");  
} 
include "common.php";
echo "<link rel='stylesheet' type='text/css' href='style.css'><div id='view'>";
$fname = get_something_from_something_else('fname', 'email', $_SESSION['name'], 'users', $db_server);

echo $_SESSION['name'];

echo " $fname

</div>";
















?>