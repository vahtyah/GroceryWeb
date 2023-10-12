<?php
if(isset($_GET['action']))
    $act = $_GET['action'];
else $act = '';

if($act == 'sign-up'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $re_password = $_POST['re-password'];
    if($password == $re_password){
        $sql = "INSERT INTO user (username, password, id_products)
        VALUES ('$username', '$password', '')";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['username'] = $username;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else{
        echo '<script language="javascript">alert("Mật khẩu không trùng khớp"); window.location="index.php";</script>';
    }
}
elseif($act == 'sign-in'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sqlUser = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $query = mysqli_query($conn, $sqlUser);
    $count = mysqli_num_rows($query);
    if($count > 0){
        $_SESSION['username'] = $username;
    }
    else{
        $sqlAdmin = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
        $query = mysqli_query($conn, $sqlAdmin);
        $count = mysqli_num_rows($query);
        if($count > 0){
            $_SESSION['username'] = $username;
            header('location: http://localhost/GroceryWeb/admincp/');
        }
        else{
            $_SESSION['wrong'] = "1";
            header('location: http://localhost/GroceryWeb');
        }
    }
}
elseif($act == 'logout'){
    unset($_SESSION['username']);
}
elseif($act == 'addProduct'){
    echo "addProduct";
    $id = $_GET['id'];
    if(isset($_SESSION['username'])){
        $user = $_SESSION['username'];
        $sql = "SELECT * FROM user WHERE username = '$user'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);
        $id_products = $row['id_products'];
        $id_products = $id_products. ',' .$id;
    }
}

if (isset($_SESSION['wrong'])) {
    if ($_SESSION['wrong'] == "1") {
        echo '<script language="javascript">alert("Sai tên đăng nhập hoặc mật khẩu"); window.location="index.php";</script>';
        $_SESSION['wrong'] = "0";
    }
}
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $sql = 'SELECT * FROM user WHERE username = "' . $username . '"';
    $query = mysqli_query($conn, $sql);
    if ($query == false)
        echo "query false";
    $row = mysqli_fetch_array($query);
    $array = array();
    if ($row) {
        $id_products = $row['id_products'];
        if ($id_products != "") {
            $array = explode(',', $id_products);
            array_pop($array);
        }

        //FUNCTION
        $totalPrice = "SELECT CalculateTotalPrice('$id_products') AS total_price";
        $query = mysqli_query($conn, $totalPrice);
        $row = mysqli_fetch_array($query);
        $totalPrice = $row['total_price'];
    }
}

?>



<!-- Start Main Top -->
<header class="main-header">
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
        <div class="container">
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu"
                    aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html"><img src="images/logo.png" class="logo" alt=""></a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.html">About Us</a></li>
                    <li class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">SHOP</a>
                        <ul class="dropdown-menu">
                            <li><a href="shop.html">Sidebar Shop</a></li>
                            <li><a href="shop-detail.html">Shop Detail</a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="my-account.html">My Account</a></li>
                            <li><a href="wishlist.html">Wishlist</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="gallery.html">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact-us.html">Contact Us</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
            <?php
            if (isset($_SESSION['username'])) {
                echo '
                <div class="attr-nav">
                <ul>
                    <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                    <li class="side-menu">
                        <a href="#">
                            <i class="fa fa-shopping-bag"></i>
                            <span class="badge">' . count($array) . '</span>
                            <p>My Cart</p>
                        </a>
                    </li>
                </ul>
            </div>
                <div class="attr-nav">
                    <ul>
                        <a class="nav-link d-block" href="http://localhost/GroceryWeb/?action=logout">
                            ' . strstr($_SESSION['username'], '@', true) . ', <b>Logout</b>
                        </a>
                    </ul>
                </div>';
            } else {
                echo '
            <div class="attr-nav">
                <ul>
                    <a href="#modal-signin" data-toggle="modal" class="nav-link btn btn-sm btn-primary"
                        style="color: #fff;">
                        SIGN IN <i class="fas fa-sign-in-alt"></i>
                    </a>
                </ul>
            </div>';
            }
            ?>

            <!-- SIGN IN -->
            <div class="modal fade" id="modal-signin" tabindex="-1" role="dialog" aria-labelledby="modal-signin"
                data-backdrop="false" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modal-video-header">
                                SIGN IN
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">

                            <!-- Form -->
                            <form class="form-styled bg-white" method="post" role="form"
                                action="?action=sign-in">

                                <!-- Heading -->
                                <h4 class="text-center mb-4">
                                    Welcome
                                </h4>


                                <!-- Email -->
                                <div class="form-group">

                                    <!-- Email -->
                                    <label>Email address</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control order-1" name="username" id="email">
                                    </div>

                                </div>

                                <!-- Password -->
                                <div class="form-group">

                                    <!-- Name -->
                                    <label>Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control order-1" name="password"
                                            id="password">
                                    </div>

                                </div>

                                <!-- Footer -->
                                <div class="form-row align-items-center">
                                    <div class="col-md-auto">

                                        <!-- Checkbox -->
                                        <div class="custom-control custom-checkbox mb-3 mb-md-0">
                                            <input type="checkbox" class="custom-control-input" id="sign-in-checkbox">
                                            <label class="custom-control-label" for="sign-in-checkbox">
                                                Remember me
                                            </label>
                                        </div>

                                    </div>
                                    <div class="col-md">

                                        <!-- Button -->
                                        <div class="text-center text-md-right">
                                            <button type="" class="btn btn-secondary btn-sm" data-toggle="modal"
                                                data-target="#modal-signup" data-dismiss="modal">
                                                Sign up
                                            </button>
                                            <button type="submit" class="btn btn-primary btn-sm" name="submit"
                                                id="submit">
                                                Sign in now
                                            </button>

                                        </div>

                                    </div>
                                </div> <!-- / .form-row -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SIGN UP -->
            <div class="modal fade" id="modal-signup" tabindex="-1" role="dialog" aria-labelledby="modal-signup"
                data-backdrop="false" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modal-video-header">
                                SIGN UP
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">

                            <!-- Form -->
                            <form class="form-styled bg-white" method="post" role="form" action="?action=sign-up">

                                <!-- Heading -->
                                <h4 class="text-center mb-4">
                                    Welcome
                                </h4>

                                <!-- Email -->
                                <div class="form-group">

                                    <!-- Email -->
                                    <label>Email address</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control order-1" name="username" id="email">
                                    </div>

                                </div>

                                <!-- Password -->
                                <div class="form-group">

                                    <!-- Name -->
                                    <label>Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control order-1" name="password"
                                            id="password">
                                    </div>

                                </div>

                                <!-- RE Password -->
                                <div class="form-group">

                                    <!-- Name -->
                                    <label>Re Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control order-1" name="re-password"
                                            id="password">
                                    </div>

                                </div>

                                <!-- Footer -->
                                <div class="form-row align-items-center">
                                    <div class="col-md-auto">

                                        <!-- Checkbox -->
                                        <div class="custom-control custom-checkbox mb-3 mb-md-0">
                                            <input type="checkbox" class="custom-control-input" id="sign-in-checkbox">
                                            <label class="custom-control-label" for="sign-in-checkbox">
                                                Remember me
                                            </label>
                                        </div>

                                    </div>
                                    <div class="col-md">

                                        <!-- Button -->
                                        <div class="text-center text-md-right">
                                            <button type="submit" class="btn btn-primary btn-sm" name="submit"
                                                id="submit">
                                                Sign up now
                                            </button>
                                        </div>

                                    </div>
                                </div> <!-- / .form-row -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- Start Side Menu -->
        <div class="side">
            <a href="#" class="close-side"><i class="fa fa-times"></i></a>
            <li class="cart-box">
                <ul class="cart-list">
                    <?php
                    foreach ($array as $value) {
                        $sql = 'SELECT * FROM products WHERE id = ' . $value;
                        if ($sql == false)
                            echo "sql false";
                        $query = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($query);
                        if ($row == true)
                            echo '
                            <li>
                                <form action="php/handle.php?action=delete-product-in-cart&id=' . $row['id'] . '" method="POST">
                                <a href="#" class="photo"><img src="../GroceryWeb/uploads/' . $row['image'] . '" class="cart-thumb" alt="" /></a>
                                <h6><a href="#">' . $row['name'] . '</a></h6>
                                <p>1x - <span class="price">$' . $row['price'] . '</span></p>
                                <input type="submit" name="delete-product-in-cart" value="X" class="btn btn-default hvr-hover btn-cart" />
                                </form>
                            </li>
                            ';
                    }
                    ?>
                    <li class="total">
                        <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                        <span class="float-right"><strong>Total</strong>:$<?php echo $totalPrice ?> </span>
                    </li>
                </ul>
            </li>
        </div>
        <!-- End Side Menu -->
    </nav>
    <!-- End Navigation -->
</header>
<!-- End Main Top -->