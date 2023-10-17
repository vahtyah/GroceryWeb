<?php
session_start();
$username = isset($_SESSION['username']) ? strstr($_SESSION['username'], '@', true) : "Admin";
?>
<nav class="navbar navbar-expand-xl">
    <div class="container h-100">
        <a class="navbar-brand" href="index.php">
            <h1 class="tm-site-title mb-0">Product Admin</h1>
        </a>
        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars tm-nav-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto h-100">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <i class="fas fa-shopping-cart"></i>
                        Products
                        <span class="sr-only">(current)</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="?action=warehouse">
                        <i class="fas fa-file-alt"></i>
                        Warehouse
                    </a>
                </li>
                
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link d-block" href="http://localhost/GroceryWeb/?action=logout">
                        <?php echo $username ?>, <b>Logout</b>
                    </a>
                </li>
            </ul>
        </div>

    </div>
    </div>
</nav>