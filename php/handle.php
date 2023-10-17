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

    if ($act == 'delete-product-in-cart') {
        $id = $_GET['id'];
        $idArray = explode(',', $id_products); // Chuyển chuỗi thành mảng
        $key = array_search($id, $idArray); // Tìm vị trí của phần tử cần xóa
    
        if ($key !== false) {
            unset($idArray[$key]); // Xóa phần tử khỏi mảng
            $id_products = implode(',', $idArray); // Chuyển mảng thành chuỗi lại
            $sql = "UPDATE user SET id_products = '$id_products' WHERE username = '$username'";
            if ($conn->query($sql) === TRUE) {
                header('Location: http://localhost/GroceryWeb/');
            } else {
                echo "Error updating record: " . $conn->error;
            }
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