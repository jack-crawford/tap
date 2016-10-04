<?php
include "common.php";

function cookie_login($db_server) {
    $cookie_user = $_COOKIE['tap_email'];
    $cookie_pwd = $_COOKIE['tap_pwd'];
    $check_user = "SELECT COUNT(*) FROM users WHERE email = '$cookie_user' AND pwd = '$cookie_pwd';";
    $check_user_query = mysqli_query($db_server, $check_user);
    $user_result = mysqli_fetch_array($check_user_query, MYSQLI_ASSOC);
    $count_user = $user_result['COUNT(*)'];   
    if ($count_user === '1') {
        //log in
        //set session and header to the homepage
        session_start();
        $_SESSION["name"] = $cookie_user;
        setcookie("tap_email", $cookie_user, time() + 2592000);
        setcookie("tap_pwd", $cookie_pwd, time() + 2592000);
        header("location: me.php");
    } else {
        //clear cookies and show login 
        unset($_COOKIE["tap_email"]);
        unset($_COOKIE["tap_pwd"]);
        //echo login
        header("location: home.php?view=login");    
    }
}
function load_home($db_server) {
    $b = "</br>";
    
    if (isset($_COOKIE['tap_email']) && isset($_COOKIE['tap_pwd']) && !isset($_SESSION['name']) && !isset($_GET['view'])) {
        ///echo "cookie login";    
        cookie_login($db_server);
    } elseif ($_GET['view'] === 'login') {
        echo "<link rel='stylesheet' type='text/css' href='style.css'><div id='view'>";
        echo "<div id = 'createcenter'>
                    <h1> Login </h1>$b $b
                    <form action='home.php?view=input' method='post' id='$id'>
                    <input type='text' name='email' placeholder='Email' id='text_input' style='color: #00461e'/> $b
                    <input type='text' onfocus='this.type=\"password\"' placeholder='Password' name='password' id='text_input'/>
                    <input type='hidden' name='sign_type' value='in'>$b $b
                    <input type='submit' name='Login' value='Login'> $b $b $b
                    </div>";
    } elseif ($_GET['view'] === 'signup') {
        echo "<link rel='stylesheet' type='text/css' href='style.css'><div id='view'>";
         echo "<div id = 'createcenter'>
                    <h1> Login </h1>$b $b
                    <form action='home.php?view=input' method='post' id='$id'>
                    <input type='text' name='fname' placeholder='First Name' id='text_input' /> $b
                    <input type='text' name='lname ' placeholder='Last Name' id='text_input' /> $b
                    <input type='text' name='email' placeholder='Email' id='text_input'/> $b
                    <input type='text' onfocus='this.type=\"password\"' placeholder='Password' name='password' id='text_input'/>
                    <input type='hidden' name='sign_type' value='up'>$b $b
                    <input type='submit' name='Join' value='Join'> $b $b $b
                    </div>";
    } elseif ($_GET['view'] === 'input') {
        $user = $_POST['email'];
        $pwd = $_POST['password'];
        $sign_type = $_POST['sign_type'];
        //echo "sign_type = $sign_type";
        if($_POST['sign_type'] === 'in') {
            $check_user = "SELECT COUNT(*) FROM users WHERE email = '$user' AND pwd = '$pwd';";
            $check_user_query = mysqli_query($db_server, $check_user);
            $user_result = mysqli_fetch_array($check_user_query, MYSQLI_ASSOC);
            $count_user = $user_result['COUNT(*)'];
            //echo "$count_user";
            if ($count_user = '1') {
                //echo "logged in";
                //log in
                //set session and header to the homepage
                setcookie("tap_email", $user, time() + 2592000);
                setcookie("tap_pwd", $pwd, time() + 2592000);
                session_start();
                $_SESSION["name"] = $user;
                header("location: me.php");
            } else {
                echo "<link rel='stylesheet' type='text/css' href='style.css'><div id='view'>";
                echo "<div id = 'createcenter'>
                    <h1> Login </h1>$b $b
                    <p style='color: red'> something was wrong, try again </p>
                    <form action='home.php?view=input' method='post' id='$id'>
                    <input type='text' name='email' placeholder='Email' id='text_input' style='color: #00461e'/> $b
                    <input type='text' onfocus='this.type=\"password\"' placeholder='Password' name='password' id='text_input'/>
                    <input type='hidden' name='sign_type' value='in'>$b $b
                    <a href='#' onclick='document.getElementById(\"$id\").submit();' id='mobile_button'> Login </a> $b $b $b
                    </div>";
            }
        } elseif ($_POST['sign_type'] === 'up') {
            //add user and log in
            $code = gen_user_code($db_server);
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $add_user = "INSERT INTO users (email, pwd, fname, lname, code) VALUES ('$user', '$pwd', '$fname', '$lname', '$code');";
            $add_user_query = mysqli_query($db_server, $add_user);
            session_start();
            $_SESSION["name"] = $user;
            header("location: me.php");
        }
    } else {
        echo "<link rel='stylesheet' type='text/css' href='style.css'><div id='view'>";
        echo "
        <div style='text-align: left; height: 50%; font-size: 8vw; color: #333333;'><h2 style='line-height: 20%;'> Welcome </h2>
        Sign in or Sign up</br></br></br>
        </br><div style='float: left' id='mobile_button'> <a href='home.php?view=login' id='mobile_button'> Login </a> </div>
        <div style='float: right' id='mobile_button'> <a href='home.php?view=signup' id='mobile_button'> Join </a> </div>
        </div> </div>  ";
    }
}
load_home($db_server);
 //echo "
 //   <div style='text-align: left; height: 50%; font-size: 8vw; color: #333333;'><h2 style='line-height: 20%;'> Welcome </h2>
 //   Sign in or Sign up</br></br></br>
 //   </br><div style='float: left' id='mobile_button'> <a href='home.php?view=login' id='mobile_button'> Login </a> </div>
 //   <div style='float: right' id='mobile_button'> <a href='home.php?view=signup' id='mobile_button'> Join </a> </div>
 //   </div> </div>  ";
 //
 //















?>