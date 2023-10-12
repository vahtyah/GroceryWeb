<?php
    include('../config/config.php');
    session_start();
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    $id_products = $row['id_products'];

    if(isset($_GET['action']))
        $act = $_GET['action'];
    else $act = '';

    if($act == 'delete-product-in-cart'){
        $id = $_GET['id'];
        $id_products = str_replace($id . ',', '', $id_products);
        //delete last element of $id_products
        $sql = "UPDATE user SET id_products = '$id_products' WHERE username = '$username'";
        if ($conn->query($sql) === TRUE) {
            header('Location: http://localhost/GroceryWeb/');
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    else if($act == 'add-product-in-cart'){
        $id = $_GET['id'];
        $id_products = $id_products.$id. ',' ;
        $sql = "UPDATE user SET id_products = '$id_products' WHERE username = '$username'";
        if ($conn->query($sql) === TRUE) {
            header('Location: http://localhost/GroceryWeb/');
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }    
?>