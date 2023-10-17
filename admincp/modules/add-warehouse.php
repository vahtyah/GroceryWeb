<?php
  if(isset($_POST['add-warehouse-on-click'])){
    echo "CC";
    $name = $_POST['name'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];
  
    $sql = "INSERT INTO warehouses(name, location, capacity) VALUES('$name','$location','$capacity')";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php?action=warehouse');
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
  }
?>

<div class="container tm-mt-big tm-mb-big">
  <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
          <div class="col-12">
            <h2 class="tm-block-title d-inline-block">Add Warehouse</h2>
          </div>
        </div>
        <div class="row tm-edit-product-row">
          <div class="col-xl-12 col-lg-6 col-md-12">
            <form method="POST" action="" class="tm-edit-product-form" enctype="multipart/form-data">
              <!-- name -->
              <div class="form-group mb-3">
                <label for="name">Product Name
                </label>
                <input id="name" name="name" type="text" class="form-control validate" required />
              </div>
              <!-- price -->
              <div class="form-group mb-3">
                <label for="price">Location
                </label>
                <input id="price" name="location" type="text" class="form-control validate" required />
              </div>
              <!-- price -->
              <div class="form-group mb-3">
                <label for="price">Capacity
                </label>
                <input id="price" name="capacity" type="text" class="form-control validate" required />
              </div>
          </div>

          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block text-uppercase" name="add-warehouse-on-click"
              id="add-warehouse-on-click">Add Warehouse Now</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>