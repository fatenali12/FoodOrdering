<?php

    ob_start();
    session_start();


    $pageTitle = "OrdersList";



    if (isset($_SESSION['admin'])){

        include 'admin/init.php';

      

?>



    <!-- Starting Ordering Food -->

   
    <div class="orders-list">

        <div class="container">       
           
            <?php


               $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0 ;


                $stmt = $con->prepare("SELECT
                                        orders.* , users.UserName, items.itemName , items.Price, items.Image
                                    FROM 
                                        orders 
                                    INNER JOIN
                                        users
                                    ON 
                                        users.UserID = orders.UserID
                                    INNER JOIN
                                        items
                                    ON
                                        items.itemID = orders.itemID
                                    WHERE
                                        orders.UserID = ?    

                                    ");

                $stmt->execute(array($userid));   
                $allOrders = $stmt->fetchAll();
                $count = $stmt->rowCount();

              

            // if ($count > 0) {
                ?>

                    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
                        <input type="hidden" name="userid" value="<?php echo $userid?>">
                    </form>
                <?php


                   


                    
                    echo '<div class="orderlist-box">';

                    foreach ($allOrders as $allOrder) {
            
                        echo '<div class="order-info">';
                        

                            echo '<div class="orderlist-img">';
                                echo'<img src="admin/uploads/Images/'.$allOrder['Image'].'" alt="" id="orderimg">';
                            echo '</div>';
                        
        
                            echo '<div class="orderlist-text">';
                                        
                                echo '<h1 id="ordername">'.$allOrder['itemName'].'</h1>';
            
                                echo '<div class="orderdetails">';
                                    echo '<h5>Order For '.$allOrder['UserName'].'</h5>';
                                    echo '<ul>';
                                        

                                        echo'<li>Quientity : <span>'.$allOrder['Quantity'].'</span></li>';
                                        echo'<li>Address   : <span>'.$allOrder['Address'].'</span></li>';
                                        echo'<li>Date      : <span>'.$allOrder['AddedDate'].'</span></li>';
                                        echo'<li id="orderprice">Price : <span>'.$allOrder['Price'].'</span></li>';
                
                                    echo'</ul>';
                                echo '</div>';
                            echo '</div>';

                        echo '</div>';

                    
                    }  
                    echo '</div>';
                
               


            // } else {
            //     echo '<div class="msg error">There Is No Orders For You</div>';
            // }

           ?>

        </div>
           
    </div>
            

            
   

    <!-- Ending Ordering Food -->

    <?php

} else {

    header('Location: signin.php');
    exit();
}    

include $tpl."footer.php";
ob_end_flush();


?>