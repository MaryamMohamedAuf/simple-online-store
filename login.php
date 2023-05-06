<?php

include 'connection.php';

if ( isset($_POST ['add'])) {
   
    // Get form data
    $username = mysqli_real_escape_string($connection, $_POST['name']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // Check if user exists in database
    $query = "SELECT * FROM user WHERE name='$username'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) == 1) {
        header('Location: home.php');
    }
        else{
            echo"user not found";
        }
       
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
     <title>login</title>
     <style>
        *{margin: 10px;}
        h1{
            margin-top: 40px;
        }
        form{
            width: 100%;
            padding: 20px;
             margin: 20px;
             text-align: center;
            }
        
        form input { 
            width:20%;
        height: 30px;
       padding: 5px;
       margin: 5px;
       border-radius: 10px;}
      
     </style>
</head>
<body>
    <h1> <center>welcome</center></h1>
    <br>

  <form method="Post" action="home.php" >
    
<input type="text" name="name"placeholder="name" >
<br>
<input type="number" name="password" placeholder="password">
<br>
    <input type="submit" name="login" value="login ">
            
                </form>

</body>
</html>