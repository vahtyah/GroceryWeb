<?php
    if(isset($_GET['action']))
        $act = $_GET['action'];
    else $act = '';

    if($act == 'add-product')
        include("add-product.php");
    else if($act == 'edit-product')
        include("edit-product.php");
    else if($act == 'warehouse')
        include('warehouses.php');
    else if($act == 'add-warehouse')
        include('add-warehouse.php');
    else if($act == 'edit-warehouse')
        include('edit-warehouse.php');
    else
        include("products.php");
?>