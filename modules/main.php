<?php
$name = isset($_POST['name']) ? $_POST['name'] : "";

$sql = "SELECT * FROM `products` WHERE name LIKE '$name%'";

$query_list = mysqli_query($conn, $sql);

?>

<!-- Start Top Search -->
<div class="top-search">
    <div class="container">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
            <input id="getName" type="text" class="form-control" placeholder="Search">
            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
        </div>
    </div>
</div>
<!-- End Top Search -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $('#getName').on("keyup", function () {
            var getName = $(this).val();

            // Sử dụng AJAX để gọi lại nội dung của main.php
            $.ajax({
                url: "search.php", // Đường dẫn đến file search.php
                type: "POST", // Phương thức gửi dữ liệu
                data: { name: getName }, // Dữ liệu gửi đi (nếu cần)
                success: function (response) {
                    // Thay đổi nội dung của div chứa sản phẩmA
                    $(".special-list").html(response);
                }
            });
        });
    });
</script>


<!-- Start Products  -->
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Fruits & Vegetables</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-lg-12">
                <div class="special-menu text-center">
                    <div class="button-group filter-button-group">
                        <button class="active" data-filter="*">All</button>
                        <button data-filter=".top-featured">Top featured</button>
                        <button data-filter=".best-seller">Best seller</button>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="row special-list">
            <?php
            while ($row = mysqli_fetch_array($query_list)) {
                ?>
                <form action="php/handle.php?action=add-product-in-cart&id=<?php echo $row['id'] ?>">

                    <div class="col-lg-3 col-md-6 special-grid best-seller">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <div class="type-lb">
                                    <p class="sale">Sale</p>
                                </div>
                                <img src="../GroceryWeb/uploads/<?php echo $row['image'] ?>" class="img-fluid" alt="Image">
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i
                                                    class="fas fa-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i
                                                    class="fas fa-sync-alt"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                    </ul>
                                    <a class="cart" href="php/handle.php?action=add-product-in-cart&id=<?php echo $row['id'] ?>">Add to Cart</a>
                                </div>
                            </div>
                            <div class="why-text">
                                <h4>
                                    <?php echo $row['name'] ?>
                                </h4>
                                <h4>
                                    <?php echo $row['description'] ?>
                                </h4>
                                <h5>
                                    <?php echo $row['price'] ?>
                                </h5>
                            </div>
                        </div>
                    </div>

                </form>
                <?php
            }
            ?>


        </div>
    </div>
</div>