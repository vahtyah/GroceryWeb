<?php
include('../../config/config.php');
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$image = time() . '_' . $_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];

if (isset($_POST['add-product-on-click'])) {
    $warehouse_id = $_POST['warehouse'];
    $sql = "INSERT INTO products(name, price, description,warehouse_id, image) VALUES('$name', $price, '$description','$warehouse_id', '$image')";
    if ($conn->query($sql) === TRUE) {
        echo "Sản phẩm đã được thêm thành công!";
        if (move_uploaded_file($image_tmp, '../../uploads/' . basename($image))) {
            echo "Hình ảnh đã được tải lên thành công.";
            header('Location:../index.php');
        } else {
            echo "Có lỗi xảy ra khi tải lên hình ảnh.";
        }
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
} elseif (isset($_POST['edit-product-on-click'])) {
    $warehouse_id = $_POST['warehouse'];
    $id = $_GET['id'];
    echo $_FILES['image']['name'];
    // Truy vấn để lấy tên tệp tin hình ảnh của sản phẩm cần xóa
    if (!empty($_FILES['image']['name'])) {
        $sql_select_image = "SELECT image FROM products WHERE id = $id";
        $result = $conn->query($sql_select_image);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $imageToDelete = $row['image'];

            echo $image;

            // Xóa tệp tin hình ảnh trong thư mục '../../uploads/'
            $imagePath = '../../uploads/' . $imageToDelete;
            if (file_exists($imagePath) && is_file($imagePath)) {
                unlink($imagePath);
                echo "Hình ảnh đã được xóa thành công!";
            }


            $sql = "UPDATE products SET 
            name = '$name',
            price = '$price',
            description = '$description',
            warehouse_id = '$warehouse_id',
            image = '$image'
            WHERE id = $id";


            if ($conn->query($sql) === TRUE) {
                echo "Sản phẩm đã được thêm thành công!";
                if (move_uploaded_file($image_tmp, '../../uploads/' . basename($image))) {
                    echo "Hình ảnh đã được tải lên thành công.";
                    header('Location:../index.php');
                } else {
                    echo "Có lỗi xảy ra khi tải lên hình ảnh.";
                }
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Không tìm thấy thông tin về sản phẩm cần xóa.";
        }
    } else {
        $sql = "UPDATE products SET 
            name = '$name',
            price = '$price',
            description = '$description',
            warehouse_id = '$warehouse_id'
            WHERE id = $id";


        if ($conn->query($sql) === TRUE) {
            echo "Sản phẩm đã được thêm thành công!";
            header('Location:../index.php');
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    }

} elseif (isset($_POST['add-warehouse-on-click'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];

    $sql = "INSERT INTO warehouses(name, location, capacity) VALUES('$name','$location','$capacity')";
    if ($conn->query($sql) === TRUE) {
        echo "Sản phẩm đã được thêm thành công!";
        header('Location:../index.php');
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
} else {
    $id = $_GET['id'];
    // Truy vấn để lấy tên tệp tin hình ảnh của sản phẩm cần xóa
    $sql_select_image = "SELECT image FROM products WHERE id = $id";
    $result = $conn->query($sql_select_image);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imageToDelete = $row['image'];

        // Xóa tệp tin hình ảnh trong thư mục '../../uploads/'
        $imagePath = '../../uploads/' . $imageToDelete;
        if (file_exists($imagePath) && is_file($imagePath)) {
            unlink($imagePath);
            echo "Hình ảnh đã được xóa thành công!";
        }

        // Tiếp theo, xóa sản phẩm khỏi cơ sở dữ liệu
        $sql_delete = "DELETE FROM products WHERE id = $id";
        if ($conn->query($sql_delete) === TRUE) {
            echo "Sản phẩm đã được xóa thành công!";
            header('Location:../index.php');
        } else {
            echo "Lỗi: " . $sql_delete . "<br>" . $conn->error;
        }
    } else {
        echo "Không tìm thấy thông tin về sản phẩm cần xóa.";
    }
}