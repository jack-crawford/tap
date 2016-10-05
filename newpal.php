<?php
include "common.php";
$method = $_GET['method'];
$new_code = $_GET['code'];
$user = $_GET['user'];
/*$hostname = "localhost";
$username = "root";
$dbname = "tappy";
$password = "root";
$db_server = mysqli_connect("$hostname", "$username", "$password", "$dbname");
*/
function new_relation_check($new_code, $db_server) {
    //this stuff
    $query = "SELECT fname FROM users WHERE code = '$new_code' LIMIT 1;";
    
    $check_user_query = mysqli_query($db_server, $query);
    $user_result = mysqli_fetch_array($check_user_query, MYSQLI_ASSOC);
    $count_user = $user_result['fname'];
    echo $count_user;
    if (empty($count_user)) {
        echo "none";
    } else {
        $lname = get_user_lname_from_user_email(get_user_email_from_user_id(get_user_id_from_user_code($user_code, $db_server), $db_server), $db_server);
        echo $count_user . " " . $lname;
    }
}

function add_pal($new_code, $user_email, $db_server){
    $user1_id = get_user_id_from_user_email($user_email, $db_server);
    $user2_id = get_user_id_from_user_code($code, $db_server);
    $query = "INSERT INTO connections (user1_id, user2_id, active) VALUES ('$user1_id', '$user2_id', 'y');";
    $check_user_query = mysqli_query($db_server, $query);
}

if ($method === 'check') {
    new_relation_check($new_code, $db_server);
} elseif ($method === 'connect') {
    add_pal($new_code, $user, $db_server);
} else {
    //nothing
}






















?>