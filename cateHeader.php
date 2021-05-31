<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php getTitle()?></title>
    <link href="https://fonts.googleapis.com/css2?family=Cedarville+Cursive&family=Kalam&family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="layout/css/normalize.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="layout/css/style.css?v=<?php echo time();?>">
</head>

<body>



    <!-- Starting  Nav Bullets -->

    <div class="nav-bullets">

        <div class="bullet" data-section=".about-us">

            <div class="tooltip">About Us</div>

        </div>

        <div class="bullet" data-section=".ourmenu">

            <div class="tooltip">Our Menu</div>

        </div>

        <div class="bullet" data-section=".ourdishes">

            <div class="tooltip">Our Dishes</div>

        </div>

        <div class="bullet" data-section=".testimonials">


            <div class="tooltip">Testimonials</div>

        </div>

        <div class="bullet" data-section=".contact">

            <div class="tooltip">Contact Us</div>

        </div>

    </div>



    <!-- Ending Nav Bullets -->



    <!-- Starting Upper Nav -->



    <div class="upper-section">



        <div class="container">

            <div class="upper-box">

                <div class="left">

                    <a href="#"><i class="fa fa-envelope">  Yamyfoodorderingsite@gmail.com</i></a>
                    <a href="#"><i class="fa fa-phone">  +(123)45678</i></a>

                </div>

                <div class="right">

                    <a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.google.com"><i class="fa fa-google"></i></a>
                    <a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>
                    <a href="signin.php"><i class="fa fa-sign-in"> Sign in</i></a>
                    <a href="signout.php"><i class="fa fa-sign-out"> Sign out</i></a>

                </div>

            </div>
        </div>
    </div>


    <!-- Ending Upper Nav -->

    


    <!-- Starting Navbar -->


    <div class="section-top">

        <div class="nav">
            <div class="container">

                <div class="header-area">

                    <span class="logo">YaMi</span>
                    <div class="links-container">
                        <ul class="links">
                            <li><a href="index.php" class="active">Home</a></li>
                            <li><a href="#" data-section=".about-us">About</a></li>
                            <li><a href="#" data-section=".ourmenu">Our Menu</a></li>
                            <li><a href="#" data-section=".ourdishes">Our Dishes</a></li>
                            <li><a href="#" data-section=".testimonials">Testimonials</a></li>
                            <li><a href="#" data-section=".contact">Contact Us</a></li>
                            <li><a href="#" class="adminlink">Admin</a></li>

                            <ul class="sublink">

                                <li><a href="#" class="anadmin">I'm an Admin</a></li>

                            </ul>
                            <ul class="mylist">

                                <li><a href="admin/meals.php">Add a new Meal</a></li>

                                <li><a href="admin/orderslist.php">List of Orders</a></li>

                            </ul>
                        </ul>


                        <button class="toggle-menu">

                        <span></span>
                        <span></span>
                        <span></span>

                    </button>


                    </div>

                </div>

            </div>
        </div>


    </div>

    <!-- Ending Navbar -->


    <h1>Hello</h1>





<?php
include 'includes/templates/footer.php';

?>