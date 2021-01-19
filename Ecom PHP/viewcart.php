<?php
session_start();
?>
<!DOCTYPE html>
<html>

    <head>
        <title>E-Commerce Store</title>
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
        <!-- top-header -->
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
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- //page -->
        <!-- checkout page -->
        <div class="privacy py-sm-5 py-4">
            <div class="container py-xl-4 py-lg-2">
                <!-- tittle heading -->
                <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                    <span>C</span>heckout
                </h3>
                <!-- //tittle heading -->
                <div class="checkout-right">

                    <div class="table-responsive">
                        <?php
                        require './class/connection.php';

                        if (isset($_SESSION['productcart']) && !empty($_SESSION['productcart'])) {

                            echo "<table class = 'timetable_sub'>";
                            echo "<thead>";

                            echo "<th>SL No.</th>";
                            echo "<th>Product</th>";
                            echo "<th>Quality</th>";
                            echo "<th>Product Name</th>";

                            echo "<th>Price</th>";
                            echo "<th>Total Amount</th>";
                            echo "<th>Remove</th>";

                            echo "</thead>";
                            echo "<tbody>";
                            $i = 0;
                            $grandtotal = array();
                            foreach ($_SESSION['productcart'] as $key => $value) {
                                $i++;
                                $selectq = mysqli_query($connection, "select * from tbl_product where product_id='{$value}'")or die(mysqli_error($connection));
                                $product = mysqli_fetch_array($selectq);
                                $qty = $_SESSION['qtycart'][$key];

                                $subtotaltemp = $product['product_price'] * $qty;

                                echo "<tr class = 'rem1'>";
                                echo "<td>$i</td>";


                                echo "<td><img src= ./admin/upload/{$product['product_image']} alt = '' class = 'img-responsive' style='width:50px;'  ></td>";

                                echo "<td>$qty</td>";
                                echo "<td>{$product['product_name']}</td>";
                                echo "<td>{$product['product_price']}</td>";
                                echo "<td>$subtotaltemp</td>";
                                echo "<td><a href='?id=$key' >Remove</a></td>";
                                echo "</tr>";

                                $grandtotal[] = $subtotaltemp;
                            }

                            $finalsum = array_sum($grandtotal);
                            echo "<tr>";
                            echo "<td colspan=5><b>Total Amount</b></td>";
                            echo "<td>$finalsum</td>";
                            echo "<tr>";
                            echo "</tbody>";
                            echo "</table>";
                        } else {
                            echo "Cart is Empty";
                        }
                        ?>
                    </div>
                </div>
                <div class = "checkout-right-basket">
                    <a href = "product.php">Buy Product
                        <span class = "far fa-hand-point-right"></span>
                    </a>
                </div>
                <?php
                require './class/connection.php';
                if (isset($_SESSION['registerid'])) {


                    if ($_POST) {
                        $name = $_POST['name'];
                        $mobile = $_POST['mobile'];
                        $address = $_POST['address'];
                        $currentdate = date('d-m-y');

                        $insertq = mysqli_query($connection, "insert into tbl_order_master('order_date', 'order_status' ,'shipping_name', 'shipping_monumber', 'shipping_address') value('{$currentdate}','pending','{$name}','{$mobile}','{$address}')")or die(mysqli_error($connection));
                        $orderid = mysqli_insert_id($connection);
                        foreach ($_SESSION['productcart'] as $key => $value) {

                            $selectq = mysqli_query($connection, "select * from tbl_product where product_id='{$value}'")or die(mysqli_error($connection));
                            $product = mysqli_fetch_array($selectq);
                            $qty = $_SESSION['qtycart'][$key];

                            $insertdetail = mysqli_query($connection, "insert into order_details ('order_id','product_id','product_qty','product_price') values('{$orderid}','{$value}','{$qty}','{$product['product_price']}')")or die(mysqli_error($connection));
                        }
                        unset($_SESSION['productcart']);
                        unset($_SESSION['qtycart']);
                        unset($_SESSION['counter']);

                        echo "<script>alert('THANK YOU!!!! Your Order Has Been Placed');window.location='index.php'</script>";
                    }
                }
                ?>
                <div class = "checkout-left">
                    <div class = "address_form_agile mt-sm-5 mt-4">
                        <h4 class = "mb-sm-4 mb-3">Add a new Details</h4>
                        <form action = "viewcart.php" method = "post" class = "creditly-card-form agileinfo_form">
                            <div class = "creditly-wrapper wthree, w3_agileits_wrapper">
                                <div class = "information-wrapper">
                                    <div class = "first-row">
                                        <div class = "controls form-group">
                                            <input class = "billing-address-name form-control" type = "text" name = "name" placeholder = "Full Name" required = "">
                                        </div>
                                        <div class = "w3_agileits_card_number_grids">
                                            <div class = "w3_agileits_card_number_grid_left form-group">
                                                <div class = "controls">
                                                    <input type = "number" class = "form-control" placeholder = "Mobile Number" name = "mobile" required = "">
                                                </div>
                                            </div>
                                            <div class = "w3_agileits_card_number_grid_right form-group">
                                                <div class = "controls">
                                                    <input type = "text" class = "form-control" placeholder = "Address" name = "address" required = "">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class = "submit check_out btn">Delivery to this Address</button>
                                </div>
                            </div>
                        </form>
                        <div class = "checkout-right-basket">
                            <a href = "payment.html">Make a Payment
                                <span class = "far fa-hand-point-right"></span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--//checkout page -->

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

        <!--footer-->
        <?php
        include './themepart/footer.php';
        
        ?>
        <!-- //footer -->
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

        <!-- quantity -->
        <script>
            $('.value-plus').on('click', function () {
                var divUpd = $(this).parent().find('.value'),
                        newVal = parseInt(divUpd.text(), 10) + 1;
                divUpd.text(newVal);
            });

            $('.value-minus').on('click', function () {
                var divUpd = $(this).parent().find('.value'),
                        newVal = parseInt(divUpd.text(), 10) - 1;
                if (newVal >= 1)
                    divUpd.text(newVal);
            });
        </script>
        <!--quantity-->
        <script>
            $(document).ready(function (c) {
                $('.close1').on('click', function (c) {
                    $('.rem1').fadeOut('slow', function (c) {
                        $('.rem1').remove();
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function (c) {
                $('.close2').on('click', function (c) {
                    $('.rem2').fadeOut('slow', function (c) {
                        $('.rem2').remove();
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function (c) {
                $('.close3').on('click', function (c) {
                    $('.rem3').fadeOut('slow', function (c) {
                        $('.rem3').remove();
                    });
                });
            });
        </script>
        <!-- //quantity -->

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