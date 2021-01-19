<div class="agile-main-top">
    <div class="container-fluid">
        <div class="row main-top-w3l py-2">
            <div class="col-lg-8 header-right mt-lg-0 mt-2">
                <!-- header lists -->
                <ul>

                    <?php
                    if (isset($_SESSION['registerid'])) {


                        echo '<li class="text-center border-right text-white">';
                        echo'<a href="logout.php" class="text-white">
				<i class="fas fa-sign-in-alt mr-2"></i> Log out </a>';
                        echo '</li>';
                        echo '<li class="text-center border-right text-white">';
                        echo "welcome" . $_SESSION['registername'];
                        ;
                        echo '</li>';
                    } else {
                        echo '<li class="text-center border-right text-white">';
                        echo'<a href="login.php" class="text-white">
				<i class="fas fa-sign-in-alt mr-2"></i> Log In </a>';
                        echo '</li>';

                        echo '<li class="text-center border-right text-white">';
                        echo'<a href="register.php" class="text-white">
				<i class="fas fa-sign-in-alt mr-2"></i> Register </a>';
                        echo '</li>';
                    }
                    ?>

                </ul>
                <!-- //header lists -->
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal(select-location) -->
<div id="small-dialog1" class="mfp-hide">

</div>
<!-- //shop locator (popup) -->

<!-- modals -->

<!-- //modal -->
<!-- //top-header -->
<!-- header-bottom-->
<div class="header-bot">
    <div class="container">
        <div class="row header-bot_inner_wthreeinfo_header_mid">
            <!-- logo -->
            <div class="col-md-3 logo_agile">
                <h1 class="text-center">
                    <a href="index.php" class="font-weight-bold font-italic">
                        <img src="images/logo2.png" alt=" " class="img-fluid">E-Commrece Store
                    </a>
                </h1>
            </div>
            <!-- //logo -->
            <!-- header-bot -->
            <div class="col-md-9 header mt-4 mb-md-0 mb-4">
                <div class="row">
                    <!-- search -->
                    <div class="col-10 agileits_search">
                        <form class="form-inline" action="#" method="post">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" required>
                            <button class="btn my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                    <!-- //search -->
                    <!-- cart details -->
                    <div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
                        <div class="wthreecartaits wthreecartaits2 cart cart box_1">
                            <form class="last" action="viewcart.php">
                                <a href="product.php"><button class="btn w3view-cart"  value="">
                                        <i class="fas fa-cart-arrow-down"></i>
                                    </button>
                            </form>
                        </div>
                    </div>
                    <!-- //cart details -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- shop locator (popup) -->
<!-- //header-bottom -->
<!-- navigation -->
<div class="navbar-inner">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="agileits-navi_search">

            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto text-center mr-xl-5">
                    <li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
                        <a class="nav-link" href="index.php">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Products
                        </a>
                        <div class="dropdown-menu">

                            <div class="agile_inner_drop_nav_info p-2">
<?php
require './class/connection.php';
$categoryq = mysqli_query($connection, "select * from tbl_category") or die(mysqli_error($connection));
while ($category = mysqli_fetch_array($categoryq)) {
    echo "<a href='product.php?catid={$category['category_id']}'><h3>{$category['category_name']}</h3></a> </br>   ";
}
?>

                            </div>
                        </div>
                    </li>

                    <li class="nav-item mr-lg-2 mb-lg-0 mb-2">
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>

                    <li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pages
                        </a>
                        <div class="dropdown-menu">

                            <a class="dropdown-item" href="checkout.php">Checkout Page</a>
                            <a class="dropdown-item" href="payment.php">Payment Page</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- //navigation -->