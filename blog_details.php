<?php

include_once('dbconnection.php');
    session_start();
    
    if(isset($_REQUEST['submit'])){

       $title = $_REQUEST['title'];
         $post = $_REQUEST['post'];
         $created_by = $_SESSION['chk_login'];
          $create_date = date("Y/m/d");

        $insert = "INSERT INTO `articles`(`id`, `title`, `body`, `created_by`, `create_date`, `is_active`) VALUES ('','$title', '$post', '$created_by', '$create_date','')";

          $result = mysqli_query($conn, $insert);

          if($result){
              header('Location: dashboard.php');
          }
    }
?>