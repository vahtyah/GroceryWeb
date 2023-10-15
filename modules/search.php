<?php
include('../config/config.php');
$name = $_POST['name'];
$sql = "SELECT * FROM `products` WHERE name LIKE '$name%'";
$query_list = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($query_list)) {
    echo'<form action="php/handle.php?action=add-product-in-cart&id='. $row['id'] .'">

    <div class="col-lg-3 col-md-6 special-grid best-seller">
        <div class="products-single fix">
            <div class="box-img-hover">
                <div class="type-lb">
                    <p class="sale">Sale</p>
                </div>
                <img src="../GroceryWeb/uploads/'. $row['image'] .'" class="img-fluid" alt="Image">
                <div class="mask-icon">
                    <ul>
                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i
                                    class="fas fa-eye"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i
                                    class="fas fa-sync-alt"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i
                                    class="far fa-heart"></i></a></li>
                    </ul>
                    <a class="cart" href="php/handle.php?action=add-product-in-cart&id='. $row['id'] .'">Add to
                        Cart</a>
                </div>
            </div>
            <div class="why-text">
                <h4>
                '. $row['name'] .'
                </h4>
                <h4>
                '. $row['description'] .'
                </h4>
                <h5>
                $'. $row['price'] .'
                </h5>
            </div>
        </div>
    </div>

</form>';
}
?>