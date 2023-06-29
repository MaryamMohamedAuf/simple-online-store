
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>wishlist</title>
    <style>
		*{
			box-sizing: border-box;
		}
		body{
			background-color:rgb(227, 224, 221)
		}
		h1{
			margin: 20px;
		}
		a{
			padding: 10px;
			margin: 10px;
			text-decoration: none;
			color: black;
			border-color: black;
			
		}
	.container {
	max-width:80%;
	margin: 0 auto;
	display: flex;
	flex-wrap: wrap ;
	justify-content: space-between;
	align-items: center;
}
.product {
	width:30%;
	height: 600px;
	margin: 10px;
	border: 2px solid gray;
	border-radius: 15px;
	box-shadow:5px 5px 10px 5px gray;
	padding: 20px;
	margin-bottom: 20px;
	overflow: hidden;
	
}
.product img{
	max-width: 300px;
	max-height: 300px;
	
}
.product button{
	margin: 10px;
	padding: 10px;
	border-radius: 10px;
	border-color: gray;
	background-color: transparent;
	
}
.product a{
	text-decoration: none;
	color: black;
}


</style>
</head>
<body>	
	
	<center><h1>wishlist Products</h1> </center>

	<div class="container">
		<?php
include 'connection.php';
session_start();
$user_id=$_SESSION['user_id'] ;

    $product_id = $_GET['id'];
    $sql="insert into wishlist
    (`user_id`,`product_id`)
    values('$user_id','$product_id' ) ";
	mysqli_query($connection, $sql);

	$query= "select DISTINCT product_id from 
	wishlist where `user_id`='$user_id'";
	$result=mysqli_query($connection, $query);
?>
<?php

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];
        $query2 = "SELECT * FROM pro WHERE `id` = '$product_id'";
        $result2 = mysqli_query($connection, $query2);

        if (mysqli_num_rows($result2) > 0) {

            $product = mysqli_fetch_array($result2);
			?>
				<div class="product">

            <h3> <?= $product['name'] ?> </h3>
			<p> <?= $product['description'] ?> </p>
            <p> <?= $product['price'] ?> </p>
            <p> <?= $product['discount'] ?>% </p>
			<img src=" <?= $product['image'] ?>"height="200px" width="200px" > 
				</div>

           <?php
		}
    }
} else {
    echo "<p>You have not added any products to your wishlist yet.</p>";
}

?>
	
</body>
</html>
