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

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu">
                            <a href="#">
                                <i class="fa fa-shopping-bag"></i>
                                <span class="badge">3</span>
                                <p>My Cart</p>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->




                <!-- LOGIN -->
                <div class="attr-nav">
                    <ul>
                        <a href="#modal-signin" data-toggle="modal" class="nav-link btn btn-sm btn-primary"
                            style="color: #fff;">
                            SIGN IN <i class="fas fa-sign-in-alt"></i>
                        </a>
                    </ul>
                </div>

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
                                <form class="form-styled bg-white" method="post" role="form">

                                    <!-- Heading -->
                                    <h4 class="text-center mb-4">
                                        Welcome
                                    </h4>


                                    <!-- Email -->
                                    <div class="form-group">

                                        <!-- Email -->
                                        <label>Email address</label>
                                        <div class="input-group">
                                            <input type="email" class="form-control order-1" name="email" id="email">
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
                                                <input type="checkbox" class="custom-control-input"
                                                    id="sign-in-checkbox">
                                                <label class="custom-control-label" for="sign-in-checkbox">
                                                    Remember me
                                                </label>
                                            </div>

                                        </div>
                                        <div class="col-md">

                                            <!-- Button -->
                                            <div class="text-center text-md-right">
                                                <button type="submit" class="btn btn-secondary btn-sm"
                                                data-toggle="modal" data-target="#modal-signup" data-dismiss="modal">
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
                                <form class="form-styled bg-white" method="post" role="form">

                                    <!-- Heading -->
                                    <h4 class="text-center mb-4">
                                        Welcome
                                    </h4>

                                    <!-- Email -->
                                    <div class="form-group">

                                        <!-- Email -->
                                        <label>Email address</label>
                                        <div class="input-group">
                                            <input type="email" class="form-control order-1" name="email" id="email">
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
                                            <input type="password" class="form-control order-1" name="password"
                                                id="password">
                                        </div>

                                    </div>

                                    <!-- Footer -->
                                    <div class="form-row align-items-center">
                                        <div class="col-md-auto">

                                            <!-- Checkbox -->
                                            <div class="custom-control custom-checkbox mb-3 mb-md-0">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="sign-in-checkbox">
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
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-01.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Delica omtantur </a></h6>
                            <p>1x - <span class="price">$80.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-02.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Omnes ocurreret</a></h6>
                            <p>1x - <span class="price">$60.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-03.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Agam facilisis</a></h6>
                            <p>1x - <span class="price">$40.00</span></p>
                        </li>
                        <li class="total">
                            <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: $180.00</span>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->