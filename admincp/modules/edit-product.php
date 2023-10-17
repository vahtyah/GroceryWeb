<?php
$sql = "SELECT * FROM products WHERE id = $_GET[id]";
$query = mysqli_query($conn, $sql);
if ($query) {
  // Lấy một hàng dữ liệu từ kết quả truy vấn
  $row = mysqli_fetch_assoc($query);

  // Kiểm tra xem có hàng dữ liệu được trả về không
  if ($row) {
    // Truy cập các cột dữ liệu bằng tên cột
    $productId = $row['id'];
    $productName = $row['name'];
    $productPrice = $row['price'];
    $productDescription = $row['description'];
    $productImage = $row['image'];

  } else {
    echo "Không có dữ liệu phù hợp với yêu cầu.";
  }
} else {
  echo "Lỗi trong quá trình thực hiện truy vấn: " . mysqli_error($conn);
}
?>

<div class="container tm-mt-big tm-mb-big">
  <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
          <div class="col-12">
            <h2 class="tm-block-title d-inline-block">Edit Product</h2>
          </div>
        </div>
        <div class="row tm-edit-product-row">
          <div class="col-xl-6 col-lg-6 col-md-12">
            <form action="modules/handle.php?id=<?php echo $productId ?>" method="POST" class="tm-edit-product-form" enctype="multipart/form-data">
              <div class="form-group mb-3">
                <label for="name">Product Name
                </label>
                <input id="name" name="name" type="text" value=<?php echo $productName ?>
                  class="form-control validate" />
              </div>
              <div class="form-group mb-3">
                <label for="price">Price
                </label>
                <input id="price" name="price" type="text" value=<?php echo $productPrice ?>
                  class="form-control validate" />
              </div>
              <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control validate tm-small" rows="5"
                  required><?php echo $productDescription ?></textarea>
              </div>

              <!-- <div class="form-group mb-3">
                <label for="category">Warehouse</label>
                <select class="custom-select tm-select-accounts" id="category" name="warehouse">
                  <option selected="">Select warehouse</option>

                  <?php

                  $sql = "SELECT * FROM warehouses";
                  $query = mysqli_query($conn, $sql);
                  while ($row = mysqli_fetch_array($query)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                  }

                  ?>

                </select>
              </div> -->
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
            <div class="tm-product-img-edit mx-auto">
              <img id="selectedImage" src="../uploads/<?php echo $productImage; ?>" alt="Product image"
                class="img-fluid d-block mx-auto">
              <i class="fas fa-cloud-upload-alt tm-upload-icon"
                onclick="document.getElementById('fileInput').click();"></i>
            </div>
            <div class="custom-file mt-3 mb-3">
            <input id="fileInput" type="file" style="display:none;" name="image" onchange="displayImage(this);"/>
              <input type="button" class="btn btn-primary btn-block mx-auto" value="UPDATE PRODUCT IMAGE" name="image" id="image"
                onclick="document.getElementById('fileInput').click();" />
            </div>
          </div>
          <div class="col-12">
            <button name="edit-product-on-click" id="edit-product-on-click" type="submit"
              class="btn btn-primary btn-block text-uppercase">Update Now</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
        function displayImage(input) {
            var selectedImage = document.getElementById('selectedImage');
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    selectedImage.style.display = 'block';
                    selectedImage.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>