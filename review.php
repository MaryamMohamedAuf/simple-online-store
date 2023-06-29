<?php

include 'connection.php';
session_start();
$user_id=$_SESSION['user_id'] ;

    $product_id = $_GET['id'];

if(isset($_POST['message'])){
    $message=$_POST['message'];
}
if(isset($_POST['submit'])){
    $sql="insert into review
    (`user_id`,`product_id`, `message`)
    values('$user_id','$product_id', '$message' ) ";
	mysqli_query($connection, $sql);
           header('Location: home.php');
    
}
	
?>

    <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>review</title>
    <style>
      form{
            width: 100%;
            padding: 20px;
             margin: 20px;
             text-align: center;
            }
        
        form input { 
            width:50%;
        height: 100px;
       padding: 10px;
       margin: 5px;
       border-radius: 10px;
    }
    form button{
        padding: 10px;
       margin: 5px;
       border-radius: 10px;
    }
    </style>
</head>
    <body>  
    <center> 
    <form method="post">
        <input type="text" width="500"
        placeholder="write your feedback hear"
        name="message">
        <br>
        <button type="submit" name="submit">submit</button>
    </form>
</center>
</body>
</html>