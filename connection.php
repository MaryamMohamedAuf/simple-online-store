<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ia";
$connection= mysqli_connect ($servername ,$username ,$password, $dbname);


if (!$connection)
{
    die ("connectionfaild:" .mysqli_connect_error());

}

?>