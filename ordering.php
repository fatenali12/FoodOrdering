<?php


    ob_start();
   session_start();

  
    $pageTitle = "Ordering";

  
    
//    if (isset($_SESSION['admin'])){
    

        include 'admin/init.php';


        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

        if ($do == 'Add') {       

?>

        <!-- Starting Ordering Food -->

        <div class="order-box">

            <div class="container">

            <?php

                $itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval( $_GET['itemid']) : 0;
             

                $getAllItems = getAllForm('*', 'items', '', '', 'itemID');


                foreach($getAllItems as $item){


                    echo "<form action='ordering.php?do=Insert&itemid=".$item['itemID']."' method='POST'>";
                    
                }
                ?>

                <div class="order-info">

               

                    <div class="order-img">

                     
                        <?php
                        
                           
                            $itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval( $_GET['itemid']) : 0;

                            $stmt = $con->prepare("SELECT Image, itemName, Price FROM items WHERE itemID = ?");
                            $stmt->execute(array($itemid));
                            $getItems = $stmt->fetch();

                            $count = $stmt->rowCount();

                            echo'<span class="itemPrice">'. $getItems['Price'].'</span>';
                            
                          
                            echo'<img src="admin/uploads/Images/'. $getItems['Image'].'" alt="">';
                        ?>
                        
            
                    </div> 


                    <div class="order-form">

                        <h1>Please Enter Your InFo</h1>


                             <input type="hidden" name="itemid" value="<?php echo $itemid?>">
                        
                            <input type="text" name="username" placeholder="Enter Your Name">

                            <input type="text"  name="userphone" placeholder="Enter Your Phone Number">
                        
                            <input type="text" name="quantity" placeholder="Enter Quantity">

                            <textarea id="" name="address" placeholder="Enter Your Address"></textarea>

                            <input type="submit" value="Create">

                            <input type="submit" value="Cancel">

                            
                        </form>
                    </div> 
                </div>
            </div>
            
        </div>

    <!-- Ending Ordering Food -->

        <?php

        
        } elseif ($do == 'Insert') {


            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {


                $itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid'])? intval($_GET['itemid']) :0;

               

                $userName  = filter_var($_POST['username'], FILTER_SANITIZE_STRING) ;
                $userPhone = filter_var($_POST['userphone'], FILTER_SANITIZE_NUMBER_INT) ;
                $quantity  = filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT) ;
                $address   = filter_var($_POST['address'], FILTER_SANITIZE_STRING);

                $formErrors = array();

                if (empty($userName)) {

                    $formErrors[] = 'Name Can Not Be <strong> Empty</strong>';
                }
                if (empty($userPhone)) {

                    $formErrors[] = 'Phone Can Not Be <strong> Empty</strong>';
                }
                if (empty($quantity)) {

                    $formErrors[] = 'quantity Can Not Be <strong> Empty</strong>';
                }
                if (empty($address)) {

                    $formErrors[] = 'address  Can Not Be <strong> Empty</strong>';
                }
                if ($address >10) {

                    $formErrors[] = 'address  Can Not Be Less Than <strong> 10 Characters</strong>';
                }


                  // Loop InTo Errors Array And Echo It

                  foreach($formErrors as $error) {

                    echo '<div class="msg error">'.$error.'</div>';
                }

                
                if (empty($formErrors)) {

                 
                    $stmt  = $con->prepare("INSERT INTO 
                                            orders (UserName, PhoneNumber, Quantity, Address, AddedDate, UserID, itemID)
                                            VALUES (:oname, :ophone, :oquantity, :oaddress, NOW(), :ouser, :oitem)");

                    $stmt->execute(array(

                        'oname'     => $userName,
                        'ophone'    => $userPhone,
                        'oquantity' => $quantity,
                        'oaddress'  => $address,
                        'ouser'     => $_SESSION['ID'], 
                        'oitem'     => $itemid
                    )); 

                    $count = $stmt->rowCount();

                    $theMsg = "<div class='msg success'>".$count." Order Done</div>";
                    redirectHome($theMsg,'back');

                    
                } else {
                
                    $theMsg = "<div class='msg error'>Sorry You Can Not Browse This Page Directly</div>";
                    redirectHome($theMsg);
                }


            
            }
  
        } elseif ($do == 'Edit') { ?>

            <!-- Starting Ordering Food -->

            <div class="order-box">
    
                <div class="container">
    
                    <div class="order-info">
    
                        <div class="order-img">
    
                            <img src="layout/Images/07.jpg" id="orderimg" alt="" >
                
                        </div> 
    
                        
    
                        <div class="order-form">
    
                            <h1>Please Enter Your InFo</h1>
    
                            <form action="ordering.php?do=Insert" method="POST">
                            
                                <input type="text" name="username" placeholder="Enter Your Name">
    
                                <input type="text"  name="userphone" placeholder="Enter Your Phone Number">
                            
                                <input type="text" name="quantity" placeholder="Enter Quantity">
    
                                <textarea id="" name="address" placeholder="Enter Your Address"></textarea>
    
                                <input type="submit" value="Edit">
    
                                <input type="submit" value="Cancel">
    
                                
                            </form>
                        </div> 
                    </div>
                </div>
                
            </div>
    
   
        <!-- Ending Ordering Food -->

        <?php

        } elseif ($do == 'Update') {

        }

    // } else {
       
    //     header('Location: signin.php');
    //     exit();
    // }
    ?>



    <?php

    include $tpl."footer.php";
    ob_end_flush();



?>