


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <title>Ecommerce</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="store.webp">
    <style>
        body{
            background-color: rgb(227, 224, 221);
        }
        h3, h2{
            font-size: xx-large;
        }
   header{
    height: 40px;
    display: flex;
    justify-content: space-between;
    }
    h1{
        font-size: 30px;
      display: flex;
      align-items: center;
    }
    nav 
    {
        display: flex;
      align-items: center;
    }
    nav a{
        text-decoration: none;
          margin: 10px;
          color: rgb(128, 0, 126);
          font-size: 20px;
    }
    nav span{
        font: size 30px;
        color: black;
    }
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
footer{
    margin: 20px;
}

    </style>
</head>
<body>
    <header>
<h1> LOGO </h1>
<nav>
    <a href="register.php" target="_blank"> register </a>
    <a href="login.php" target="_blank"> login </a>
	<a href="allOrders.php" target="_blank"> allOrders </a>


</nav>
 </header>   
  <center>
     <img src="store.webp"
             alt=" photo"  width="100%" height="100%">
              
     <h2>about us?</h2>
    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel maiores veniam
         autem accusamus  repellendus nostrum saepe, non dolorem, <br>
         soluta harum recusandae commodi velit est eius quidem earum cum eligendi!
         autem accusamus  repellendus nostrum saepe, non dolorem, 
   </p></center>

        <center> <h3>Products</h3> </center>

	<div class="container">
		<?php 
		include 'connection.php';
           
	// Retrieve products from database
			$query = "SELECT * FROM pro";

			$result = mysqli_query($connection, $query);

			if (mysqli_num_rows($result) > 0) {

				while ($row = mysqli_fetch_array($result))
				 {
				?>
					<div class='product'>
					<h2> <?= $row['name'];?> </h2>
		   <center> <img src= <?php echo $row['image']; ?> </center>
					<p> description: <?php echo $row['description']; ?></p>
					<p> Price: <?php echo $row['price']; ?></p>
					<p> discount: <?php echo $row['discount']; ?> %</p>

					<button> <a href="cart.php?id=<?php echo $row['id']; ?>">add to cart</a></button>
					<button><a href="favorities.php?id=<?php echo $row['id']; ?>">add to favorities</a></button>
					<button><a href="wishlist.php?id=<?php echo $row['id']; ?>">add to wishlist</a></button>

			</div>	
			<?php	
			}
		} 
            else {
				echo "No products found";
			}
			?>
<p> 
	</div>
<footer>
    <center> <strong> copy&copy;IA section</center>
 </footer>
</body>
</html>