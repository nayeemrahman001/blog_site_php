<?php
    include_once('dbconnection.php');

    $username = $_POST['username'];
    $password = $_POST['pass'];

    $attempt = $_POST['attempt'];

    if($attempt<4){
        $check_login = "SELECT * FROM `user` WHERE username = '$username' AND password = '$password'";

        $result = mysqli_query($conn, $check_login);
        
        
        if($result->num_rows){
            header("location: http://localhost:8080/blog/dashboard.php");
        }else{
            session_start();
            $_SESSION["notice"] = "";
            // $attempt++;
            // echo "No of attempts" . $attempt++;

            header("location: http://localhost:8080/blog/");
        }
    }else{
        
    }
    
?>