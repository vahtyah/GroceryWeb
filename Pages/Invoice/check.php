<?php
session_start();
include('../../config/config.php');
$total_cost = $_GET['total_cost'];
$user = 'SELECT * FROM `user` WHERE username = "' . $_SESSION['username'] . '"';
$query_user = mysqli_query($conn, $user);
$row_user = mysqli_fetch_array($query_user);
$id_user = $row_user['id'];
$id_products = $row_user['id_products'];

$total_discount = "SELECT CalculateTotalDiscount('$id_products') AS total_discount";
$query_total_discount = mysqli_query($conn, $total_discount);
$row_total_discount = mysqli_fetch_array($query_total_discount);
$total_discount = $row_total_discount['total_discount'];

$sql = "CALL CreateCheck('$total_cost','$total_discount', '$id_products', '$id_user', @check_id)";
$query = mysqli_query($conn, $sql);
$result = mysqli_query($conn, "SELECT @check_id AS check_id");
$row = mysqli_fetch_assoc($result);
$check_id = $row['check_id'];

$array = explode(',', $id_products);
array_pop($array);


$total_cost_after_discout = "SELECT CalculateTotalPriceAfterDiscount('$total_cost', '$total_discount') AS total_cost_after_discount";
$query_total_cost_after_discout = mysqli_query($conn, $total_cost_after_discout);
$row_total_cost_after_discout = mysqli_fetch_array($query_total_cost_after_discout);
$total_cost_after_discount = $row_total_cost_after_discout['total_cost_after_discount'];

$sale_cost = $total_cost - $total_cost_after_discount
  ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Example 2</title>
  <link rel="stylesheet" href="style.css" media="all" />
</head>

<body>
  <header class="clearfix">
    <div id="logo">
      <img src="logo.png">
    </div>
    <div id="company">
      <h2 class="name">Company Name</h2>
      <div>455 Foggy Heights, AZ 85004, US</div>
      <div>(602) 519-0450</div>
      <div><a href="mailto:company@example.com">company@example.com</a></div>
    </div>
    </div>
  </header>
  <main>
    <div id="details" class="clearfix">
      <div id="client">
        <div class="to">INVOICE TO:</div>
        <h2 class="name">
          <?php echo $row_user['username'] ?>
        </h2>
        <div class="address">796 Silver Harbour, TX 79273, US</div>
        <div class="email"><a href="mailto:john@example.com">john@example.com</a></div>
      </div>
      <div id="invoice">
        <h1>INVOICE 3-2-1</h1>
        <div class="date">Date of Invoice: 01/06/2014</div>
        <div class="date">Due Date: 30/06/2014</div>
      </div>
    </div>
    <table border="0" cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          <th class="no">#</th>
          <th class="desc">DESCRIPTION</th>
          <th class="total">TOTAL</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $index = 0;
        foreach ($array as $value) {
          $sql = "SELECT * FROM `products` WHERE id = '$value'";
          $query = mysqli_query($conn, $sql);
          $row = mysqli_fetch_array($query);
          $index++;
          echo '
                <tr>
                  <td class="no">' . $index . '</td>
                  <td class="desc"><h3>' . $row['name'] . '</h3>' . $row['description'] . '</td>
                  <td class="total">' . $row['price'] . '</td>
                </tr>
              ';
        }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="1"></td>
          <td colspan="1">SUBTOTAL</td>
          <td>$
            <?php echo $total_cost ?>
          </td>
        </tr>
        <tr>
          <td colspan="1"></td>
          <td colspan="1">TAX
            <?php echo $total_discount ?>%
          </td>
          <td>$
            <?php echo $sale_cost ?>
          </td>
        </tr>
        <tr>
          <td colspan="1"></td>
          <td colspan="1">GRAND TOTAL</td>
          <td>$
            <?php echo $total_cost_after_discount ?>
          </td>
        </tr>
      </tfoot>
    </table>
    <div id="thanks">Thank you!</div>
    <div id="notices">
      <div>NOTICE:</div>
      <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
    </div>
  </main>
  <footer>
    Invoice was created on a computer and is valid without the signature and seal.
  </footer>
</body>

</html>