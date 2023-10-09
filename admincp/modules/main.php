<?php
    if(isset($_GET['action']))
        $act = $_GET['action'];
    else $act = '';

    if($act == 'add-product')
        include("add.php");
    else if($act == 'edit-product')
        include("edit.php");
    else
        include("menu.php");

?>