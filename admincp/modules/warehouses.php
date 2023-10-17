<?php
$sql = "SELECT * FROM `warehouses`";

$query_list = mysqli_query($conn, $sql);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM `warehouses` WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    if($query){
        header('Location: index.php?action=warehouse');
    }else{
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

?>

<div class="container mt-5">
    <div class="tm-content-row">
        <div class="tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-products">
                <div class="tm-product-table-container">
                    <table class="table table-hover tm-table-small tm-product-table">
                        <thead>
                            <tr>
                                <!-- <th scope="col">&nbsp;</th> -->
                                <th scope="col">NAME</th>
                                <th scope="col">LOCATION</th>
                                <th scope="col">CAPACITY</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            while ($row = mysqli_fetch_array($query_list)) {
                                ?>
                                <tr>
                                    <!-- <th scope="row"><input type="checkbox" /></th> -->
                                    <td class="tm-product-name">
                                        <a href="?action=edit-warehouse&id=<?php echo $row['id'] ?>" class="product-link">
                                            <?php echo $row["name"] ?>
                                        </a>

                                    </td>
                                    <td>
                                        <?php echo $row["location"] ?>
                                    </td>
                                    <td>
                                        <?php echo $row["capacity"] ?>
                                    </td>

                                    <td>
                                        <a type="submit" href="?action=warehouse&id=<?php echo $row['id'] ?>"
                                            class="tm-product-delete-link">
                                            <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <!-- table container -->
                <a href="index.php?action=add-warehouse" class="btn btn-primary btn-block text-uppercase mb-3">Add new
                    warehouse</a>
                <!-- <button class="btn btn-primary btn-block text-uppercase">
                    Delete selected products
                </button> -->
            </div>
        </div>
    </div>
</div>

<?php

?>