<?php
    include 'connection.php';

    $id = $_GET['id'];

    $sql = "select * from pro where `id` ='$id'";
    $res = mysqli_query($connection, $sql);
    $data = mysqli_fetch_array($res);

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        // Check if a new image was uploaded
        if (isset($_FILES['image'])) {
            $image_name = $_FILES['image']['name'];
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $upload_dir = 'uploads/';
            $image_path = $upload_dir . $image_name;

            if (move_uploaded_file($image_tmp_name, $image_path)) {
                
                $query = "UPDATE pro SET `image`='$image_path', `name`='$name',
                          `description`='$description', `price`='$price'
                          WHERE `id`='$id'";
            }
         else {
            $query = "UPDATE pro SET `name`='$name', `description`='$description',
                      `price`='$price' WHERE `id`='$id'";
        }

    }
        else {
            $query = "UPDATE pro SET `name`='$name', `description`='$description',
                      `price`='$price' WHERE `id`='$id'";
        }

        if (mysqli_query($connection, $query)) {
            $res = mysqli_affected_rows($connection);
            if ($res == 1) {
                echo "Product updated successfully";
                mysqli_close($connection);
                header("location:show_products.php");
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
    <title>edit</title>
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
        <h2>Update Product</h2>
    </center>
    <form method="post" enctype="multipart/form-data">

        <input type="text" name="name" placeholder="Name" value="<?php echo $data['name'] ?>"> <br>
        <input type="text" name="description" placeholder="Description" value="<?php echo $data['description'] ?>"><br>
        <input type="number" name="price" placeholder="Price" value="<?php echo $data['price'] ?>"><br>
        <center> <img height="200px" width="200px" src="<?php echo $data['image'] ?>"></center>
        <input type="file" name="image"><br>

        <input type="submit" name="update" value="Update Product">

    </form>

</body>

</html>