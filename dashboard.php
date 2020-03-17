<?php 

include_once('dbconnection.php');


session_start();
if (isset($_SESSION ['chk_login'])) {  ?>
	<h1>welcome <?php  
	echo $_SESSION ['chk_login'];
	 ?></h1>
	 
	<a href="index.php">Logout</a>
<?php }else{
	$_SESSION ['logout'] =  true;
	header('Location: index.php');	
}

$artile_query= "SELECT * FROM `articles` ";
$result = mysqli_query($conn, $artile_query);


 
 ?>



<!doctype html>
<html lang="en">
  <head>
	  <style>
		  .tr_width{
			  width: 600px !important;
		  }
	  </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
		<div class="row">
		<div class="col-lg-12">
		<h1>Post</h1>
	<a class="btn btn-primary" href="post_form.php">Add New</a>
	</div>
		</div>
	</div>
	<div class="container">
		<row>
		  <div class="col-lg-12">
		  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th width="20%" class="tr_width" scope="col">Post</th>
      <th scope="col">User</th>
      <th scope="col">Date</th>
      <th scope="col">Publication</th>
    </tr>
  </thead>
  <tbody>
	  <?php while ($row = $result -> fetch_assoc()){ 
		  //print_r($row); exit(); 
		  ?>
    <tr>
      <th scope="row">1</th>
      <td><?php echo $row['title']; ?></td>
      <td><?php echo $row['body']; ?></td>
      <td><?php echo $row['created_by']; ?></td>
      <td><?php echo $row['create_date']; ?></td>
      <td><?php echo $row['is_active']; ?></td>
	</tr>
	  <?php } ?>
	
  </tbody>
</table>
		  </div>
		</row>
	</div>
	

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>