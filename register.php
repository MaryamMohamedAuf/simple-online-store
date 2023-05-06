
<?php 
include 'connection.php';

if (!isset($_SESSION)){
    session_start();
}
if( isset($_POST ['register'])){
    $username=mysqli_real_escape_string($connection,$_POST['name']);
    $email=mysqli_real_escape_string($connection,$_POST['email']);
    $password1=mysqli_real_escape_string($connection,$_POST['password']);
    $password2=mysqli_real_escape_string($connection,$_POST['confirmpass']);

if ($password1 != $password2){
    echo "password doesn't match";
   }    
else{
    $sql="insert into user(name,email,password) 
    values('$username','$email','$password1')";
    mysqli_query ($connection,$sql);

    $_SESSION ['name']=$username;
    echo "welcome dear " . $_SESSION['name'];
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
     <title>registeration</title>
     <style>
        *{margin: 10px;}
        form{
            width: 100%;
            padding: 20px;
             margin: 20px;
             text-align: center;
            }
        
        form input { 
            width:30%;
        height: 50px;
       padding: 5px;
       margin: 5px;
       border-radius: 10px;}
      
     </style>
</head>
<body>
    <h1> <center>welcome</center></h1>
    <br>

  <form method="Post" action="register.php" >
    <br>
        <input type="name" name="name" placeholder="name" >
        <br>
<input type="email" name="email"placeholder="email" >
<br>
<input type="number" name="password" placeholder="password">
<br>
<input type="number" name="confirmpass" placeholder="confirm password">
<br>

    <input type="submit" name="register" value="register ">
            
                </form>

</body>
</html>


