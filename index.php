
<?php

    $pageTitle = "Page Home";

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

    <div class="ourcategories">

        <h2>Our Categories</h2>

        <div class="container">

        <?php
            
        

            $getAllCates = getAllForm("*", "categories", "", "","CateID", "ASC");

         

            echo '<div class="cates-box">';
            foreach ($getAllCates as $cate) {

                echo '<div class="cates-info">';
                    echo '<div class="img-box">';
                        echo '<a href="categories.php?pageid='.$cate["CateID"].'"><img src="layout/Images/'. $cate["Image"].'" alt="" id="orderimg"></a>';
                    echo '</div>';
                    echo '<h3><i class="fa fa-steak fa-2x"></i><a href="categories.php?pageid='.$cate["CateID"].'"> '.$cate['CateName'].'</a></h3>';
                echo '</div>';
            }
                
            echo '</div>';

        ?>



        </div>
    </div>



    <!-- Ending OurMenu  -->




    <!-- Starting OurMenu -->

    <div class="ourmenu">

        <h2>Our Menu</h2>

        <div class="container">


            <?php

                $getAllItems = getAllForm('*', 'items', '', '', 'itemID','ASC');

                foreach($getAllItems as $item){

            ?>

                <div class="menu-box">
                    <div class="info-box">
                    <?php
                       echo'<img src="admin/uploads/Images/'.$item['Image'].'" alt="" id="orderimg">';
                    ?>
                        <h3><?php echo $item['Description']?></h3>
                        <span><?php echo $item['Price']?></span>
                        <?php
                            echo '<a href="ordering.php?do=Add&itemid='.$item['itemID'].'">Order Now</a> ';
                        ?>
                       
                    </div>
                </div>

                <?php } ?>

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

