
<?php

    $pageTitle = "Home Page";
    include "init.php";
   


?>
    <!-- Starting Slider -->

    <div class="about-us">

        <div class="container">


            <h2>Welcome to food Delivery</h2>

            <p>Food Delivery is the best way to find local resturents that deliver to you or quickly order food online. Whether looking for breakfast,lunch,dinner or late night snack , we have it all .
            </p>

            <img src="layout/Images/01.jpeg" id="myimg" alt="">

        </div>

    </div>



    <!-- Ending Slider -->

    <div class="ourdishes">

        <h2>Our Dishes</h2>

        <div class="container">


            <div class="dishes-box">
                <div class="dishes-info">
                    <img src="layout/Images/bbq1.jpg" alt="" id="orderimg">
                    <h3><i class="fa fa-steak fa-2x"></i>BBQ</h3>
                </div>
            </div>


            <div class="dishes-box">
                <div class="dishes-info">
                    <img src="layout/Images/seafood1.jpg" alt="">
                    <h3><i class="fa fa-fish fa-2x"></i>SEA FOOD</h3>
                </div>
            </div>

            <div class="dishes-box">
                <div class="dishes-info">
                    <img src="layout/Images/PIZZA1.jpg" alt="" id="orderimg">
                    <h3><i class="fa fa-pizza-slice fa-2x"></i>PIZZA</h3>
                </div>
            </div>

            <div class="dishes-box">
                <div class="dishes-info">
                    <img src="layout/Images/burger1.jpg" alt="">
                    <h3><i class="fa fa-cheeseburger fa-2x"></i> BURGER</h3>
                </div>
            </div>



            <div class="dishes-box">
                <div class="dishes-info">
                    <img src="layout/Images/spaghettii1.jpg" alt="">
                    <h3><i class="far fa-utensil-fork fa-2x"></i> SPAGHETTI</h3>
                </div>
            </div>

            <div class="clear"></div>



            <div class="dishes-box">
                <div class="dishes-info">
                    <img src="layout/Images/salad1.jpg" alt="">
                    <h3><i class="fa fa-salad"></i> APPETIZER</h3>
                </div>
            </div>

            <div class="dishes-box">
                <div class="dishes-info">
                    <img src="layout/Images/soup1.jpg" alt="">
                    <h3><i class="fa fa-soup"></i> SOUPS</h3>
                </div>
            </div>


            <div class="dishes-box">
                <div class="dishes-info">
                    <img src="layout/Images/sandwish.jpg" alt="">
                    <h3><i class="fa fa-sandwich"></i> SANDWISH</h3>
                </div>
            </div>


            <div class="dishes-box">
                <div class="dishes-info">
                    <img src="layout/Images/dessert.jpg" alt="">
                    <h3><i class="fa fa-birthday-cake"></i> DESSERTS</h3>
                </div>
            </div>


            <div class="dishes-box">
                <div class="dishes-info">
                    <img src="layout/Images/drink1.jpg" alt="">
                    <h3><i class="fa fa-win-glass fa-2x"></i> SOFT DRINKS</h3>
                    <!-- <h3><i class="fa fa-wine-glass-alt fa-2x"></i> SOFT DRINKS</h3> -->
                </div>
            </div>




        </div>
    </div>



    <!-- Ending OurMenu  -->




    <!-- Starting OurMenu -->

    <div class="ourmenu">

        <h2>Our Menu</h2>

        <div class="container">


            <div class="menu-box">
                <div class="info-box">
                    <img src="layout/Images/07.jpg" alt="" id="orderimg">
                    <h3>Mushroom and cream cheese pizza</h3>
                    <span>$18.99</span>
                    <a href="admin/ordering.php">Order Now</a>
                </div>
            </div>


            <div class="menu-box">
                <div class="info-box">
                    <img src="layout/Images/08.jpg" alt="">
                    <h3>Creamy garlic prawn fettuccine</h3>
                    <span>$14.99</span>
                    <a href="admin/ordering.php" class="orderbtn" data-image="Images/08.jpg" onclick="navigate()">Order Now</a>
                </div>
            </div>



            <div class="menu-box">
                <div class="info-box">
                    <img src="layout/Images/09.jpeg" alt="">
                    <h3>Cheesy surprise meatballs with dottie spinach salad</h3>
                    <span>$20.78</span>
                    <a href="admin/ordering.php">Order Now</a>
                </div>
            </div>


            <div class="menu-box">
                <div class="info-box">
                    <img src="layout/Images/10.jpg" alt="">
                    <h3>Chicken schnitzel with apple salad</h3>
                    <span>$18.64</span>
                    <a href="admin/ordering.php">Order Now</a>
                </div>
            </div>


            <div class="menu-box">
                <div class="info-box">
                    <img src="layout/Images/11.jpg" alt="">
                    <h3>The Ultimate Aussie Burger with The Lot</h3>
                    <span>$16.00</span>
                    <a href="admin/ordering.php">Order Now</a>
                </div>
            </div>

            <div class="menu-box">
                <div class="info-box">
                    <img src="layout/Images/12.jpg" alt="">
                    <h3>Barbecued chicken tacos with charred nectarine</h3>
                    <span>$15.12</span>
                    <a href="admin/ordering.php">Order Now</a>
                </div>
            </div>


            <div class="menu-box">
                <div class="info-box">
                    <img src="layout/Images/13.jpg" alt="">
                    <h3>Ramen burger with noodle buns and soy-sesame</h3>
                    <span>$14.20</span>
                    <a href="admin/ordering.php">Order Now</a>
                </div>
            </div>



            <div class="menu-box">
                <div class="info-box">
                    <img src="layout/Images/14.jpg" alt="">
                    <h3>Our most recent Recipes of the Day</h3>
                    <span>$10.88</span>
                    <a href="ordering.php">Order Now</a>
                </div>
            </div>


        </div>
    </div>



    <!-- Ending OurMenu  -->


    <!-- Starting Testimonials-->

    <div class="testimonials">

        <div class="container">

            <h2>Testimonials</h2>

            <div class="ts-box">

                <p>I can't say enough about your Luxrest Restaurant! The reasonable prices, and great atmosphere are only topped by the delicious food. Fantastic local restaurant serving fresh, delicious.</p>

                <div class="person-info">
                    <img src="layout/images/person-1.jpg" alt="">
                    <h4>Mark Matt</h4>
                    <p>Sales Director</p>
                </div>

            </div>


            <div class="ts-box">

                <p>I can't say enough about your Luxrest Restaurant! The reasonable prices, and great atmosphere are only topped by the delicious food. Fantastic local restaurant serving fresh,delicious.</p>

                <div class="person-info">
                    <img src="layout/images/person-2.jpg" alt="">
                    <h4>Brian Walters</h4>
                    <p>Assistant Manager</p>
                </div>
            </div>




            <div class="ts-box">

                <p>I can't say enough about your Luxrest Restaurant! The reasonable prices, and great atmosphere are only topped by the delicious food. Fantastic local restaurant serving fresh,delicious.</p>

                <div class="person-info">
                    <img src="layout/images/person-3.jpg" alt="">
                    <h4>Alexandra Filmore</h4>
                    <p>Sales Director</p>
                </div>
            </div>






            <div class="ts-box">

                <p>All of the items I tried were absolutely delicious. I surprised my husband and brought home a sampling of a number of menu items. I will come back again for the food .</p>

                <div class="person-info">
                    <img src="layout/images/person-4.jpg" alt="">
                    <h4>Alexandra Filmore</h4>
                    <p>Sales Director</p>
                </div>
            </div>





            <div class="ts-box">

                <p>All of the items I tried were absolutely delicious. I surprised my husband and brought home a sampling of a number of menu items. I will come back again for the food .</p>

                <div class="person-info">
                    <img src="layout/images/person-5.jpg" alt="">
                    <h4>Alexandra Filmore</h4>
                    <p>Sales Director</p>
                </div>
            </div>


            <div class="ts-box">

                <p>All of the items I tried were absolutely delicious. I surprised my husband and brought home a sampling of a number of menu items. I will come back again for the food .</p>

                <div class="person-info">
                    <img src="layout/images/person-1.jpg" alt="">
                    <h4>Alexandra Filmore</h4>
                    <p>Sales Director</p>
                </div>
            </div>



        </div>
    </div>





    <!-- Ending Testimonials-->



    <!-- Starting Contact Us -->


    <div class="contact">
        <div class="overlay"></div>
        <div class="container">
            <h2>Contact Us</h2>

            <form action="">

                <div class="left">

                    <input type="text" name="username" placeholder="Your Name">
                    <input type="text" name="phone" placeholder="Your Phone">
                    <input type="email" name="email" placeholder="Your Email">
                    <input type="text" name="username" placeholder="subject">

                </div>


                <div class="right">

                    <textarea name="message" placeholder="Your Message"></textarea>
                    <input type="submit" value="Send">

                </div>
            </form>
        </div>
    </div>




    <!-- Ending Contact Us -->



<?php

    include $tpl."footer.php";


?>

