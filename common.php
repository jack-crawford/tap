<?php
$hostname = "localhost";
$username = "root";
$dbname = "tappy";
$password = "p0k3m0n1";
$db_server = mysqli_connect("$hostname", "$username", "$password", "$dbname");
 
$b = "</br>";

function mylog($message) {
    date_default_timezone_set('America/Chicago');
    $logtime = date("Y-m-d H:i:s");
    $file = fopen('logfile.txt', "a");
    fwrite ($file, "$logtime: $message\n");
    fclose($file);
}
function get_user_fname_from_user_email($user_email, $db_server){
    $get_user_fname_query = "SELECT fname FROM users WHERE email = '$user_email';";
    //do all the query stuff here
    mylog("USER FNAME QUERY: $get_user_fname_query");
    $user_fname_result = mysqli_query($db_server, $get_user_fname_query);
    if ($get_user_fname_query->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    mylog("post query");
    $row = mysqli_fetch_array($user_fname_result, MYSQLI_ASSOC);
    mylog('fetched array?');
    $fname = $row['fname'];
    mylog("fname should be $fname");
    return $fname;   
}
function get_user_lname_from_user_email($user_email, $db_server){
    $get_user_fname_query = "SELECT lname FROM users WHERE email = '$user_email';";
    //do all the query stuff here
    mylog("USER LNAME QUERY: $get_user_fname_query");
    $user_fname_result = mysqli_query($db_server, $get_user_fname_query);
    if ($get_user_fname_query->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    mylog("post query");
    $row = mysqli_fetch_array($user_fname_result, MYSQLI_ASSOC);
    mylog('fetched array?');
    $fname = $row['lname'];
    mylog("lname should be $fname");
    return $fname;   
}
function get_user_code_from_user_email($user_email, $db_server){
    $get_user_fname_query = "SELECT code FROM users WHERE email = '$user_email';";
    //do all the query stuff here
    mylog("Code QUERY: $get_user_fname_query");
    $user_fname_result = mysqli_query($db_server, $get_user_fname_query);
    if ($get_user_fname_query->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    mylog("post query");
    $row = mysqli_fetch_array($user_fname_result, MYSQLI_ASSOC);
    mylog('fetched array?');
    $fname = $row['code'];
    mylog("code should be $fname");
    return $fname;   
}
function get_user_email_from_user_id($user_id, $db_server){
    $get_user_fname_query = "SELECT email FROM users WHERE id = '$user_id';";
    //do all the query stuff here
    mylog("Code QUERY: $get_user_fname_query");
    $user_fname_result = mysqli_query($db_server, $get_user_fname_query);
    if ($get_user_fname_query->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    mylog("post query");
    $row = mysqli_fetch_array($user_fname_result, MYSQLI_ASSOC);
    mylog('fetched array?');
    $fname = $row['email'];
    mylog("code should be $fname");
    return $fname;   
}
function get_user_id_from_user_email($user_email, $db_server){
    $get_user_fname_query = "SELECT user_id FROM users WHERE email = '$user_email';";
    //do all the query stuff here
    mylog("USER FNAME QUERY: $get_user_fname_query");
    $user_fname_result = mysqli_query($db_server, $get_user_fname_query);
    if ($get_user_fname_query->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    mylog("post query");
    $row = mysqli_fetch_array($user_fname_result, MYSQLI_ASSOC);
    mylog('fetched array?');
    $fname = $row['user_id'];
    mylog("fname should be $fname");
    return $fname;   
}
function get_user_id_from_user_code($user_code, $db_server){
    $get_user_fname_query = "SELECT user_id FROM users WHERE code = '$user_code';";
    //do all the query stuff here
    mylog("USER FNAME QUERY: $get_user_fname_query");
    $user_fname_result = mysqli_query($db_server, $get_user_fname_query);
    if ($get_user_fname_query->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    mylog("post query");
    $row = mysqli_fetch_array($user_fname_result, MYSQLI_ASSOC);
    mylog('fetched array?');
    $fname = $row['user_id'];
    mylog("fname should be $fname");
    return $fname;   
}
function get_user_taps_from_user_id($user_id, $db_server){
    $get_user_fname_query = "SELECT COUNT[*] FROM taps WHERE sender_id = '$user_id';";
    //do all the query stuff here
    mylog("USER FNAME QUERY: $get_user_fname_query");
    $user_fname_result = mysqli_query($db_server, $get_user_fname_query);
    if ($get_user_fname_query->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    mylog("post query");
    $row = mysqli_fetch_array($user_fname_result, MYSQLI_ASSOC);
    mylog('fetched array?');
    $fname = $row['COUNT[*'];
    mylog("fname should be $fname");
    return $fname;   
}
function get_user_connections_from_user_id($user_id, $db_server){
    $get_user_fname_query = "SELECT COUNT[*] FROM connections WHERE '$user_id' IN (user1_id, user2_id) AND active = 'y';";
    //do all the query stuff here
    mylog("USER FNAME QUERY: $get_user_fname_query");
    $user_fname_result = mysqli_query($db_server, $get_user_fname_query);
    if ($get_user_fname_query->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    mylog("post query");
    $row = mysqli_fetch_array($user_fname_result, MYSQLI_ASSOC);
    mylog('fetched array?');
    $fname = $row['COUNT[*]'];
    mylog("fname should be $fname");
    return $fname;   
}
function gen_user_code($db_server){
    $first = chr(64+rand(0,26));
    $second = chr(64+rand(0,26));
    $third = chr(64+rand(0,26));
    $fourth = chr(64+rand(0,26));
    
    $code = $first . $second . $third . $fourth;
    $check_if_code_is_used_query = "SELECT COUNT(*) FROM users WHERE code = '$code';";
    
    mylog("Fetching code query: $check_if_code_is_used_query");
    $get_code_result = mysqli_query($db_server, $check_if_code_is_used_query);
    if ($get_code_result->connect_errno) {
            echo "Failed to connect to database: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }  else {
        $row = mysqli_fetch_array($get_code_result, MYSQLI_ASSOC);
        mysqli_free_result($get_code_result);
        $code_count = $row['COUNT(*)'];
        while ($code_count === '1') {
            //return code, to be posted to db
            $try_again = chr(64+rand(0,26));
            $try_again2 = chr(64+rand(0,26));
            $try_again3 = chr(64+rand(0,26));
            $try_again4 = chr(64+rand(0,26));
            
            $code = $try_again . $try_again2 . $try_again3 . $try_again4;
            $check_if_code_is_used_query = "SELECT COUNT(*) FROM users WHERE code = '$code';";
            
            mylog("Fetching code query: $check_if_code_is_used_query");
            $get_code_result = mysqli_query($db_server, $check_if_code_is_used_query);
            if ($get_code_result->connect_errno) {
            echo "Failed to connect to database: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }  else {
            $row = mysqli_fetch_array($get_code_result, MYSQLI_ASSOC);
            mysqli_free_result($get_code_result);
            $code_count = $row['COUNT(*)'];       
            }
        }
        return $code;
    }
}




?>