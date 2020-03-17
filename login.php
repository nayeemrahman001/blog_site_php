<?php

    session_start();
    include_once('dbconnection.php');
    // DB Connection
   
    if(isset($_REQUEST['submit'])){
        
        $username = $_REQUEST['username'];
        $password = md5($_REQUEST['pass']);
        $login_auth = "SELECT * FROM `user` WHERE username = '$username' AND password = '$password' AND attempt < 4";
        $result = mysqli_query($conn, $login_auth);
        
         //echo isset($_REQUEST['submit']); exit;
        if($result->num_rows > 0){
            $login_attempt = "UPDATE `user` SET attempt = 0 WHERE username = '$username'";
            $conn->query($login_attempt);
           
            $row = $result -> fetch_array(MYSQLI_ASSOC);

            $_SESSION['chk_login'] = $row["username"];
            $_SESSION['logout'] = false;
           // print_r($row); exit;
            header("Location: dashboard.php");
        }else{
            $sql = "UPDATE user SET attempt = attempt + 1 WHERE username = '$username'";
		    $conn->query($sql);
	        echo "0 results";

            session_start();
            $_SESSION["notice"] = "";

            header("location: http://localhost/blog/");
        }
    }
    
?>


   


        
        
        
        