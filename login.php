<?php

include 'connection.php';
session_start();

       $user_id =0;

if ( isset($_POST ['login'])) {
   
    $username = mysqli_real_escape_string($connection, $_POST['name']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // Check if user exists in database
    $query = "SELECT * FROM user WHERE name='$username'";

    $result = mysqli_query($connection, $query);
    
    if (mysqli_num_rows($result) == 1){
        
        $id = mysqli_fetch_array($result);

        $user_id = $id['user_id'];
// Store user ID in session variable
      $_SESSION['user_id'] = $user_id;

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

  <form method="Post" >

<input type="text" name="name"placeholder="name" required>
<br>
<input type="number" name="password" placeholder="password" required>
<br>
    <input type="submit" name="login" value="login ">
            
                </form>

</body>
</html>