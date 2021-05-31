<?php
    include 'init.php';

    echo "Welcome";

    echo "Your Page ID Is ".$_GET['pageid'];
    

?>

<div class="ourmenu" style="background-color: #FFF;">

    <div class="container">
        <h1>Categories</h1>

    

    <?php

        if (isset($_GET['pageid']) && is_numeric($_GET['pageid'])) {

            $category = intval($_GET['pageid']);
            

            $check = checkItem('CateID', 'categories', $category);

            echo $check;

            if ($check == 0 ) {
                echo '<div class="the-errors msg error">There IS NO Such ID</div>';
            } else {

                $allItems = getAllForm("*", "items", "WHERE CateID={$category}", "", "itemID");

                foreach ($allItems as $item) {

                    echo ' <div class="menu-box">';
                        echo '<div class="info-box">';
                            echo '<img src="layout/Images/07.jpg" alt="" id="orderimg">';
                            echo '<h3>'.$item["Description"].'</h3>';
                            echo '<span>'.$item["Price"].'</span>';
                            echo '<a href="admin/ordering.php">Order Now</a>';
                        echo '</div>';
                    echo '</div>';
                }

            }
        } else {
            echo '<div class="the-errors error">You Must Add Page ID</div>';
        

        }

    ?>

    </div>
</div>


<?php
include $tpl.'footer.php';
?>