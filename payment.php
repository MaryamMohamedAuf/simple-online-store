<?php

include 'connection.php';
$total_price=0;
    $product_id = $_GET['id'];
    session_start();
    $user_id=$_SESSION['user_id'] ;

    $sql = "select * from pro where `id` ='$product_id'";
    $res = mysqli_query($connection, $sql);
    $data = mysqli_fetch_array($res);

    $discount= $data['discount'];
    $price= $data['price'];

if(isset($_POST['total_price'])){
        $quantity = $_POST['quantity'];
    $discount_percentage = $price * ($discount/100);
    $total_price = $quantity * $price - ($discount_percentage*$quantity);
}
    
    if(isset($_POST['order'])){
        

 $query="insert into `payment`
    (user_id,product_id,quantity,total_price)
    values('$user_id','$product_id' , '$quantity', '$total_price') ";

        if (mysqli_query($connection, $query)) {
            $res = mysqli_affected_rows($connection);
            if ($res == 1) {
                echo "Product ordered successfully";
               header("location:home.php");
            } else {
                echo mysqli_error($connection);
            }
        }


    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order product</title>
    <style>
        * {
            margin: 10px;
        }

        form {
            width: 100%;
            padding: 20px;
            margin: 20px;
            text-align: center;
        }

        form input,
        textarea {
            width: 30%;
            height: 50px;
            padding: 5px;
            margin: 5px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <center>
        <h2>Order Product</h2>
    <?php echo "name: ".$data['name'] ?> <br>
    <?php echo "discription: ".$data['description'] ?> <br>
    <?php echo "price: ".$data['price'] ?> <br>
    <?php echo "available discount: ".$data['discount'] ."%"?> <br>
    <img height="200px" width="200px" src="<?php echo $data['image'] ?>">
</center>        


    <form method="post" >

        <input type="number" name="quantity" placeholder="enter quantity" value=$quantity><br>
          <?php echo "total price = " .$total_price ?>
          <br>
          <input type="submit" name="total_price" value="show total price ">

        <input type="submit" name="order" value="order Product">

    </form>

</body>

</html>