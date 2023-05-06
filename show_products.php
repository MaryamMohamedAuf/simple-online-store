<!DOCTYPE html>
<html>
<head>
	<title>show</title>
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
	.container {
	max-width:80%;
	margin: 0 auto;
	padding: 20px;
	display: flex;
	flex-wrap: wrap ;
	justify-content: space-between;
	align-items: center;
}
.product {
	width:30%;
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

</style>
</head>
<body>		
	<center><h1>Products</h1> </center>

	<div class="container">
		<?php 
		include 'connection.php';
           
	// Retrieve products from database
			$query = "SELECT * FROM pro";

			$result = mysqli_query($connection, $query);

			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result))
				 {
					echo "<div class='product'>";
					echo "<h2>" . $row['name'] . "</h2>";
					echo " <center> <img src= ' ". $row['image'] ." '</center> ";

					echo "<p>description : " . $row['description'] . "</p>";
					echo "<p>Price: $" . $row['price'] . "</p>";
					echo "</div>";
					
				}
			} 
            else {
				echo "<p>No products found.</p>";
			}

	
		?>
	</div>
</body>
</html>