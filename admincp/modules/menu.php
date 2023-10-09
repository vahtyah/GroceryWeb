<?php
$sql = "SELECT * FROM `products`";

$query_list = mysqli_query($conn, $sql);

?>

<div class="container mt-5">
    <div class="tm-content-row">
        <div class="tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-products">
                <div class="tm-product-table-container">
                    <table class="table table-hover tm-table-small tm-product-table">
                        <thead>
                            <tr>
                                <th scope="col">&nbsp;</th>
                                <th scope="col">PRODUCT NAME</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">DESCRIPTION</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            while ($row = mysqli_fetch_array($query_list)) {
                                ?>
                                <tr>
                                    <th scope="row"><input type="checkbox" /></th>
                                    <td class="tm-product-name">
                                        <a href="?action=edit-product&id=<?php echo $row['id'] ?>" class="product-link">
                                            <?php echo $row["name"] ?>
                                        </a>

                                    </td>
                                    <td>
                                        <?php echo $row["price"] ?>
                                    </td>
                                    <td>
                                        <?php echo $row["description"] ?>
                                    </td>

                                    <td>
                                        <a type="submit" href="modules/handle.php?id=<?php echo $row['id'] ?>"
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
                <a href="index.php?action=add-product" class="btn btn-primary btn-block text-uppercase mb-3">Add new
                    product</a>
                <button class="btn btn-primary btn-block text-uppercase">
                    Delete selected products
                </button>
            </div>
        </div>
    </div>
</div>

<?php

?>