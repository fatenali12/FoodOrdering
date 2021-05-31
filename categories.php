
<?php

    ob_start();
    session_start();


    $pageTitle = "Categories";

    include 'admin/init.php';
   


?>

<div class="ourmenu" style="background-color: #FFF;">

    <div class="container">

    <?php

        $getAllCates = getAllForm("*", "categories", "WHERE CateID={$_GET['pageid']}", "","CateID", "ASC");

        foreach ($getAllCates as $cate) {
            echo "<h1>".$cate['CateName']." Menu</h1>";
        }

    ?>



    <?php


            
        if (isset($_GET['pageid']) && is_numeric($_GET['pageid'])) {

            $category = intval($_GET['pageid']);
            

            $check = checkItem('CateID', 'categories', $category);

           

            if ($check == 0 ) {
                echo '<div class="the-errors msg error">There IS NO Such ID</div>';
            } else {

                $allItems = getAllForm("*", "items", "WHERE CateID={$category}", "", "itemID");

                foreach ($allItems as $item) {

                    echo ' <div class="menu-box">';
                        echo '<div class="info-box">';
                            echo'<img src="admin/uploads/Images/'.$item['Image'].'" alt="" id="orderimg">';
                            echo '<h3>'.$item["Description"].'</h3>';
                            echo '<span>'.$item["Price"].'</span>';
                            echo '<a href="ordering.php?do=Add&itemid='.$item['itemID'].'">Order Now</a> ';
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
ob_end_flush();
?>