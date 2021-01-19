<!DOCTYPE html>
<html lang="zxx">

    <head>
        <title> E-Commerce </title>
        <!-- Meta tag Keywords -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8" />
        <meta name="keywords" content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
              />
        <script>
            addEventListener("load", function () {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            }
        </script>
        <!-- //Meta tag Keywords -->

        <!-- Custom-Files -->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <!-- Bootstrap css -->
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!-- Main css -->
        <link rel="stylesheet" href="css/fontawesome-all.css">
        <!-- Font-Awesome-Icons-CSS -->
        <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
        <!-- pop-up-box -->
        <link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
        <!-- menu style -->
        <!-- //Custom-Files -->

        <!-- web fonts -->
        <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
              rel="stylesheet">
        <!-- //web fonts -->

    </head>

    <body>
        <?php
        include './themepart/header.php';
        ?>

        <!-- banner-2 -->
        <div class="page-head_agile_info_w3l">

        </div>
        <!-- //banner-2 -->
        <!-- page -->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">
                <div class="container">
                    <ul class="w3_short">
                        <li>
                            <a href="index.php">Home</a>
                            <i>|</i>
                        </li>
                        <li>Mobiles</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- //page -->

        <!-- top Products -->
        <div class="ads-grid py-sm-5 py-4">
            <div class="container py-xl-4 py-lg-2">
                <!-- tittle heading -->
                <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                    <span>M</span>obiles
                    <!-- //tittle heading -->
                    <div class="row">
                        <!-- product left -->
                        <div class="agileinfo-ads-display col-lg-12">
                            <div class="wrapper">
                                <!-- first section -->
                                <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                                    <?php
                                    require './class/connection.php';
                                    
                                    ?>
                                    <div class="col">

                                        <div class="col-md-4 product-men">
                                            <?php
                                            if (isset($_GET['catid'])) {
                                                $catid = $_GET['catid'];
                                                $selectq = mysqli_query($connection, "select * from tbl_product where category_id='{$catid}'")or die(mysqli_error($connection));
                                            } else {
                                                $selectq = mysqli_query($connection, "select * from tbl_product")or die(mysqli_error($connection));
                                            }


                                            while ($row = mysqli_fetch_array($selectq)) {
                                                echo "</br></br><h2><b>{$row['product_name']}</b></h2>";

                                                echo "<img style='width:100px;'  src= './admin/upload/{$row['product_image']}'>";
                                                $oldprice = $row['product_price'] + 1000;


                                                echo "<h6>Rs.{$row['product_price']}   <del>Rs.$oldprice</del></h6>";
                                                
                                            ?>
                                            <form action="#" method="post">
                                                            <fieldset>
                                                                <input type="hidden" name="pid" value="<?php echo $pid; ?>" />
                                                                <input type="hidden" name="cmd" value="_cart" />
                                                                <input type="hidden" name="add" value="1" />
                                                                <input type="hidden" name="return" value=" " />
                                                                <input type="hidden" name="cancel_return" value=" " />
                                                                <a href ="single.php?pid= <?php echo  $row['product_id'] ?>">
                                                                <input type="button"  value="Quick View" class="button btn" ></a>
                                                            </fieldset>
                                                        </form>
                                            <?php 
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--//product left -->
                        <!--product right-->

                    </div>
            </div>
        </div>
        <!--//top products -->

        <!--middle section-->
        <div class = "join-w3l1 py-sm-5 py-4">
            <div class = "container py-xl-4 py-lg-2">
                <div class = "row">
                    <div class = "col-lg-6">
                        <div class = "join-agile text-left p-4">
                            <div class = "row">
                                <div class = "col-sm-7 offer-name">
                                    <h6>Smooth, Rich & Loud Audio</h6>
                                    <h4 class = "mt-2 mb-3">Branded Headphones</h4>
                                    <p>Sale up to 25% off all in store</p>
                                </div>
                                <div class = "col-sm-5 offerimg-w3l">
                                    <img src = "images/off1.png" alt = "" class = "img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col-lg-6 mt-lg-0 mt-5">
                        <div class = "join-agile text-left p-4">
                            <div class = "row ">
                                <div class = "col-sm-7 offer-name">
                                    <h6>A Bigger Phone</h6>
                                    <h4 class = "mt-2 mb-3">Smart Phones 5</h4>
                                    <p>Free shipping order over $100</p>
                                </div>
                                <div class = "col-sm-5 offerimg-w3l">
                                    <img src = "images/off2.png" alt = "" class = "img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--middle section-->
        <?php
        include './themepart/footer.php';
        ?>

        <!-- js-files -->
        <!-- jquery -->
        <script src="js/jquery-2.2.3.min.js"></script>
        <!-- //jquery -->

        <!-- nav smooth scroll -->
        <script>
            $(document).ready(function () {
                $(".dropdown").hover(
                        function () {
                            $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                            $(this).toggleClass('open');
                        },
                        function () {
                            $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                            $(this).toggleClass('open');
                        }
                );
            });
        </script>
        <!-- //nav smooth scroll -->

        <!-- popup modal (for location)-->
        <script src="js/jquery.magnific-popup.js"></script>
        <script>
            $(document).ready(function () {
                $('.popup-with-zoom-anim').magnificPopup({
                    type: 'inline',
                    fixedContentPos: false,
                    fixedBgPos: true,
                    overflowY: 'auto',
                    closeBtnInside: true,
                    preloader: false,
                    midClick: true,
                    removalDelay: 300,
                    mainClass: 'my-mfp-zoom-in'
                });

            });
        </script>
        <!-- //popup modal (for location)-->

        <!-- cart-js -->
        <script src="js/minicart.js"></script>
        <script>
            paypals.minicarts.render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

            paypals.minicarts.cart.on('checkout', function (evt) {
                var items = this.items(),
                        len = items.length,
                        total = 0,
                        i;

// Count the number of each item in the cart
                for (i = 0; i < len; i++) {
                    total += items[i].get('quantity');
                }

                if (total < 3) {
                    alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
                    evt.preventDefault();
                }
            });
        </script>
        <!-- //cart-js -->

        <!-- password-script -->
        <script>
            window.onload = function () {
                document.getElementById("password1").onchange = validatePassword;
                document.getElementById("password2").onchange = validatePassword;
            }

            function validatePassword() {
                var pass2 = document.getElementById("password2").value;
                var pass1 = document.getElementById("password1").value;
                if (pass1 != pass2)
                    document.getElementById("password2").setCustomValidity("Passwords Don't Match");
                else
                    document.getElementById("password2").setCustomValidity('');
                //empty string means no validation error
            }
        </script>
        <!-- //password-script -->

        <!-- smoothscroll -->
        <script src="js/SmoothScroll.min.js"></script>
        <!-- //smoothscroll -->

        <!-- start-smooth-scrolling -->
        <script src="js/move-top.js"></script>
        <script src="js/easing.js"></script>
        <script>
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();

                    $('html,body').animate({
                        scrollTop: $(this.hash).offset().top
                    }, 1000);
                });
            });
        </script>
        <!-- //end-smooth-scrolling -->

        <!-- smooth-scrolling-of-move-up -->
        <script>
            $(document).ready(function () {
                /*
                 var defaults = {
                 containerID: 'toTop', // fading element id
                 containerHoverID: 'toTopHover', // fading element hover id
                 scrollSpeed: 1200,
                 easingType: 'linear' 
                 };
                 */
                $().UItoTop({
                    easingType: 'easeOutQuart'
                });

            });
        </script>
        <!-- //smooth-scrolling-of-move-up -->

        <!-- for bootstrap working -->
        <script src="js/bootstrap.js"></script>
        <!-- //for bootstrap working -->
        <!-- //js-files -->

    </body>

</html>