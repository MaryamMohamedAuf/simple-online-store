  
  <?php
include 'connection.php';
 
    $id=$_GET['id'];

    $query = "DELETE FROM pro WHERE `id`='$id'";

    if (mysqli_query($connection, $query))
     {
        $res = mysqli_affected_rows($connection);
        if ($res == 1){
            echo "Product deleted successfully";
            header("location:show_products.php");
        }else 
            echo  mysqli_error($connection);
    }

?>