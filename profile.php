<?php
include "common.php";
header("Content-Type: application/json");
$user = $_GET['user'];

$fname = get_user_fname_from_user_email($user, $db_server);
$lname = get_user_lname_from_user_email($user, $db_server);
$taps = get_user_taps_from_user_id(get_user_id_from_user_email($user, $db_server), $db_server);

$taps .= " taps";
$connections = get_user_connections_from_user_id(get_user_id_from_user_email($user, $db_server), $db_server) . " pals";
$code = get_user_code_from_user_email($user, $db_server);
$name = $fname . " " . $lname;
$results = Array("fname" => $name, "taps" => $taps, "connections" => $connections, "code" => $code);
echo json_encode($results);










?>