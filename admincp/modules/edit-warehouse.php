<?php
$sql = "SELECT * FROM warehouses WHERE id = $_GET[id]";
$query = mysqli_query($conn, $sql);
if ($query) {
  $row = mysqli_fetch_assoc($query);
  if ($row) {
    $name = $row['name'];
    $location = $row['location'];
    $capacity = $row['capacity'];

  } else {
    echo "Không có dữ liệu phù hợp với yêu cầu.";
  }
} else {
  echo "Lỗi trong quá trình thực hiện truy vấn: " . mysqli_error($conn);
}

if(isset($_POST['edit-warehouse-on-click'])){
  $name = $_POST['name'];
  $location = $_POST['location'];
  $capacity = $_POST['capacity'];

  $sql = "UPDATE warehouses SET name = '$name', location = '$location', capacity = '$capacity' WHERE id = $_GET[id]";
  $query = mysqli_query($conn, $sql);
  if($query){
    header('Location: index.php?action=warehouse');
  }else{
    echo "Lỗi trong quá trình thực hiện truy vấn: " . mysqli_error($conn);
  }
}
?>

<div class="container tm-mt-big tm-mb-big">
  <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
          <div class="col-12">
            <h2 class="tm-block-title d-inline-block">Edit Warehouse</h2>
          </div>
        </div>
        <div class="row tm-edit-product-row">
          <div class="col-xl-12 col-lg-6 col-md-12">
            <form action="" method="POST" class="tm-edit-product-form" enctype="multipart/form-data">
              <div class="form-group mb-3">
                <label for="name">Name
                </label>
                <input id="name" name="name" type="text" value=<?php echo $name ?>
                  class="form-control validate" />
              </div>
              <div class="form-group mb-3">
                <label for="price">Location
                </label>
                <input id="price" name="location" type="text" value=<?php echo $location ?>
                  class="form-control validate" />
              </div>
              <div class="form-group mb-3">
                <label for="price">Capacity
                </label>
                <input id="price" name="capacity" type="text" value=<?php echo $capacity ?>
                  class="form-control validate" />
              </div>
          </div>

          <div class="col-12">
            <button name="edit-warehouse-on-click" id="edit-product-on-click" type="submit"
              class="btn btn-primary btn-block text-uppercase">Update Now</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
