<div class="container tm-mt-big tm-mb-big">
  <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
          <div class="col-12">
            <h2 class="tm-block-title d-inline-block">Add Product</h2>
          </div>
        </div>
        <div class="row tm-edit-product-row">
          <div class="col-xl-6 col-lg-6 col-md-12">
            <form method="POST" action="modules/handle.php" class="tm-edit-product-form" enctype="multipart/form-data">
              <!-- name -->
              <div class="form-group mb-3">
                <label for="name">Product Name
                </label>
                <input id="name" name="name" type="text" class="form-control validate" required />
              </div>
              <!-- price -->
              <div class="form-group mb-3">
                <label for="price">Price
                </label>
                <input id="price" name="price" type="text" class="form-control validate" required />
              </div>
              <!-- description -->
              <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control validate" rows="3"
                  required></textarea>
              </div>
              <div class="form-group mb-3">
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
              </div>

          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
            <label style="display: inline-block; position: relative; cursor: pointer;">
              <img id="selectedImage" src="../uploads/upload.png" alt="Product image" class="img-fluid d-block mx-auto">
              <i class="fas fa-cloud-upload-alt tm-upload-icon" onclick="document.getElementById('fileInput').click();"
                onclick="document.getElementById('fileInput').click();" style="
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1;"></i>
            </label>
            <div class="custom-file mt-3 mb-3">
              <input id="fileInput" type="file" style="display:none;" name="image" onchange="displayImage(this);" />
              <input type="button" class="btn btn-primary btn-block mx-auto" value="UPLOAD PRODUCT IMAGE" name="image"
                id="image" onclick="document.getElementById('fileInput').click();" />
            </div>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block text-uppercase" name="add-product-on-click"
              id="add-product-on-click">Add Product Now</button>
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