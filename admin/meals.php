
<?php

    ob_start();
    session_start();

    $pageTitle ='Meals';



    if (isset($_SESSION['admin'])) {
      

        include 'init.php';


        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';


        if ($do == 'Manage') {


            $stmt = $con->prepare("SELECT items.* , 
                                        categories.CateName As Category_Name
                                    FROM 
                                        items
                                    INNER JOIN
                                        categories
                                    ON
                                        categories.CateID = items.CateID");
            $stmt-> execute();
            $items = $stmt->fetchALL();

            // if (!empty($items)) {

            ?>

                
                <div class="container">

                    <h1>Manage Meals</h1>
                    
                    <div class="table-responsive">
                        <table border="1" class="main-table">
                            <tr>
                                <td>#ID</td>
                                <td>Name</td>
                                <td>Description</td>
                                <td>Price</td>
                                <td>Adding Date</td>
                                <td>Category</td>
                                <td>Control</td>
                            </tr>

                            <?php 

                            foreach($items as $item) {

                                echo "<tr>";
                                    echo "<td>".$item['itemID']."</td>";
                                    echo "<td>".$item['itemName']."</td>";
                                    echo "<td>".$item['Description']."</td>";
                                    echo "<td>".$item['Price']."</td>";
                                    echo "<td>".$item['Date']."</td>";
                                    echo "<td>".$item['Category_Name']."</td>";

                                    echo "<td>
                                        <a href='meals.php?do=Edit&itemid=".$item['itemID']."' class= edit '><i class='fa fa-edit'>Edit</i></a>
                                        <a href='meals.php?do=Delete&itemid=".$item['itemID']."' class=delete confirm'><i class='fa fa-close'>Delete</i></a>";
                                    "</td>";
                                echo "</tr>";


                            }

                            ?>  
                        </table>
                       <div class="add-btn">
                       <a href="?do=Add" class="add"><i class="fa fa-plus"> Add New Meal</i></a>
                       </div>
                    </div>


                </div>
            
            

            <?php 

           


            // echo "<a href='?do=Edit&itemid=".$items['itemID']."'>Edit</a>";

            // echo "<a class='confirm' href='?do=Delete&itemid=".$items['itemID']."'>Delete</a>";


            

       

        } elseif ($do == 'Add') {  ?>

            <!-- Add New Meal -->


   
            <div class="meals-box">
               
        
                <div class="container">
        
                    <div class="meals-info">
        
                        <h1>Enter Meal InFo</h1>
        
                        <form action="meals.php?do=Insert" method="POST" enctype="multipart/form-data">
        
                            
                           <div class="input-container">
                                <input 
                                class="myinput" 
                                type="text" 
                                name="mealname" 
                                placeholder="Enter The Meal Name"
                                required>
                           </div>
                            
                            <div class="input-container">
                                <input 
                                class="myinput"
                                type="text" 
                                name="mealdesc" 
                                placeholder="Enter The Meal Description" 
                                required>
                            </div>
        
                           <div class="input-container">
                                <input 
                                class="myinput"
                                type="file"  
                                name="mealimg"
                                placeholder="Enter The Image Url" 
                                required>
                           </div>
                            
                           <div class="input-container">
                                <input 
                                class="myinput"
                                type="text" 
                                name="mealprice" 
                                placeholder="Enter The Price" 
                                required>
                           </div>
                           <div>
                                <select class="select-box " name="mealCate" id="">
                                <option value="0">...</option>
                                <?php
                                    $getAllItems = getAllForm("*", "categories", "", "", "CateID");
                                   foreach($getAllItems as $item) {
                                       echo "<option value='".$item["CateID"]."'>".$item['CateName']."</option>";
                                   }

                                ?>
                                </select>
                           </div>
        
                        <div>
                            <input type="submit" value="Create">
            
                            <input type="submit" value="Cancel">
                        </div>
        
                                
                        </form>
                        
                    </div>
                </div> 
                   
            </div> 
            
        
             
           

        <?php       

        } elseif ($do == 'Insert') {

            echo "<h1>Insert Meal</h1>";


            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

              
                $imgName = $_FILES['mealimg']['name'];
                $imgSize = $_FILES['mealimg']['size'];
                $imgTmp  = $_FILES['mealimg']['tmp_name'];
                $imgType = $_FILES['mealimg']['type'];

            
                // List Of Allowed File Types To Upload
                

                $imgAllowedExtensions = array("jpeg", "jpg", "png", "gif");

                $extensioin = explode('.', $imgName);

                $imgExtention = strtolower(end($extensioin));



                $mName   =  $_POST['mealname'];
                $mdec    =  $_POST['mealdesc'];
                $mprice  =  $_POST['mealprice'];
                $mealCate = $_POST['mealCate'];

                


                $formErrors = array();

                if (empty($mName)) {

                    $formErrors[] = 'Meal Name Can Not Be <strong> Empty</strong>';
                }

                if (empty($mdec)) {

                    $formErrors[] = 'Meal Description Can Not Be <strong> Empty</strong>';
                }

             
                if (empty($mprice)) {

                    $formErrors[] = 'Meal Price Can Not Be <strong> Empty</strong>';
                }

                if ($mealCate == 0) {
                    $formError[] = 'You Must Choose The <strong>Category Name</strong>';
                }


                if (!empty($imgName) && !in_array($imgExtention, $imgAllowedExtensions)) {

                    $formError[] = 'This Extension Is Not </strong> Allowed</strong>';

                }

                if (isset($_FILES['mealimg']['name']) && empty($imgName)) {

                    $formError[] = 'Image IS </strong> Required</strong>';
                
                }
                if (isset($_FILES['mealimg']['size']) && ($imgSize) > 4194304 ) {

                    $formError[] = 'Image Can Not Be Larger Than </strong> 4MB</strong>';
                }


                  // Loop InTo Errors Array And Echo It

                foreach($formErrors as $error) {

                    echo '<div class="msg error">'.$error.'</div>';
                }

                
              

                if (empty($formErrors)) {

                    $image = rand(0, 10000000000) . '_' .  $imgName;

                    move_uploaded_file($imgTmp, 'uploads\Images\\'.$image);


                   
                    $stmt  = $con->prepare("INSERT INTO 
                                            items (itemName, Description, Image, Price,  Date, CateID)
                                            VALUES (:iname, :idec, :iImg, :iprice, NOW(), :iCate)");

                    $stmt->execute(array(

                        'iname'    => $mName,
                        'idec'     => $mdec,
                        'iImg'     => $image ,
                        'iprice'   => $mprice,
                        'iCate'    => $mealCate
                    
                    )); 

                
                    
                    $count = $stmt->rowCount();

                    $theMsg = "<div class='msg success'>".$count." Record Inserted</div>";
                    redirectHome($theMsg,'back');

                    
                }
            

            } else {
                
                $theMsg = "<div class='msg error'>Sorry You Can Not Browse This Page Directly</div>";
                redirectHome($theMsg);
            }


        } elseif ($do == 'Edit') { 



            $itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval( $_GET['itemid']) : 0;

            $stmt = $con->prepare("SELECT * FROM items WHERE itemID = ?");
            $stmt->execute(array($itemid));
            $items = $stmt->fetch();

            $count = $stmt->rowCount();


            if ($count > 0) {

            
            ?>

                <!-- Starting Meals Section -->

                <div class="meals-box">
                
            
                    <div class="container">
            
                        <div class="meals-info">
            
                            <h1>Edit Meal InFo</h1>
            
                            <form action="meals.php?do=Update" method="POST" enctype="multipart/form-data">


                            <!-- Start The Hidden Field ID -->
                            <input type="hidden" name="itemid" value="<?php echo $itemid?>">
                            <!-- End The Hidden Field ID -->    
            
                                
                            <div>
                                    <input 
                                    class="myinput" 
                                    type="text" 
                                    name="mealname" 
                                    placeholder="Enter The Meal Name"
                                    value="<?php echo $items['itemName']?>"
                                    required>
                            </div>
                                
                                <div>
                                    <input 
                                    type="text" 
                                    name="mealdesc" 
                                    placeholder="Enter The Meal Description" 
                                    value="<?php echo $items['Description']?>"
                                    required>
                                </div>
            
                            <div>
                                    <input 
                                    type="file"  
                                    name="mealimg" 
                                    placeholder="Enter The Image Url" 
                                    required
                                    >
                            </div>
                                
                            <div>
                                    <input 
                                    type="text" 
                                    name="mealprice" 
                                    placeholder="Enter The Price" 
                                    value="<?php echo $items['Price']?>"
                                    required>
                            </div>

                            <div>
                                <select class="select-box" name="mealCate" id="">
                                <option value="0">...</option>
                                <?php
                                    $getAllItems = getAllForm("*", "categories", "", "", "CateID");

                                   foreach($getAllItems as $item) {
                                       echo "<option value='".$item["CateID"]."'";

                                        if ($items['CateID'] == $item['CateID']) { echo "selected";}
                                       
                                       echo ">".$item['CateName']."</option>";
                                   }

                                ?>
                                </select>
                           </div>
            
                            <div>
                                <input type="submit" value="Update">
                                
                            </div>
        
                                    
                            </form>
                            
                        </div>
                    </div> 
                    
                </div> 
                
            
                <!-- Ending Meals Section -->

            <?php } ?>


        <?php       

        } elseif ($do == 'Update') {

            echo "<h1>Update Meal</h1>";


            if ($_SERVER['REQUEST_METHOD'] == 'POST') {



                
                $imgName = $_FILES['mealimg']['name'];
                $imgSize = $_FILES['mealimg']['size'];
                $imgTmp  = $_FILES['mealimg']['tmp_name'];
                $imgType = $_FILES['mealimg']['type'];

            
                // List Of Allowed File Types To Upload
                

                $imgAllowedExtensions = array("jpeg", "jpg", "png", "gif");

                $extensioin = explode('.', $imgName);

                $imgExtention = strtolower(end($extensioin));




                $id       = $_POST['itemid'];
                $mName    = $_POST['mealname'];
                $mDesc    = $_POST['mealdesc'];
                // $mImg     = $_POST['mealimg'];
                $mPrice   = $_POST['mealprice'];
                $mealCate = $_POST['mealCate'];
               

                $formErrors = array();

                if (empty($mName)) {
                    $formError[] = 'Name Can Not Be </strong>Empty</strong>';
                }

                if (empty($mdesc)) {
                    $formError[] = 'Description Can Not Be </strong>Empty</strong>';
                }

                if (empty($mprice)) {
                    $formError[] = 'price Can Not Be </strong>Empty</strong>';
                }

                if ($mealCate == 0) {
                    $formError[] = 'You Must Choose The <strong>Category Name</strong>';
                }

                

                if (!empty($imgName) && !in_array($imgExtention, $imgAllowedExtensions)) {

                    $formError[] = 'This Extension Is Not </strong> Allowed</strong>';

                }

                if (isset($_FILES['mealimg']['name']) && empty($imgName)) {

                    $formError[] = 'Image IS </strong> Required</strong>';
                
                }
                if (isset($_FILES['mealimg']['size']) && ($imgSize) > 4194304 ) {

                    $formError[] = 'Image Can Not Be Larger Than </strong> 4MB</strong>';
                }


                foreach ($formErrors as $error) {

                    echo '<div class="msg error">'.$error.'</div>';

                }
                
                if (empty($formErrors)) {



                    $image = rand(0, 10000000000) . '_' .  $imgName;

                    move_uploaded_file($imgTmp, 'uploads\Images\\'.$image);

                    $stmt = $con->prepare("UPDATE items 
                                            SET
                                                itemName = ?,
                                                Description = ?,
                                                Image  =  ?,
                                                Price  =  ?,
                                                CateID =  ?
                                                
                                            WHERE 
                                                itemID = ?");
                    $stmt->execute(array($mName, $mDesc, $image, $mPrice, $mealCate, $id)) ;
                    $count = $stmt->rowCount();


                    $theMsg = "<div class='msg success'>".$count." Record Updated</div>";
                    redirectHome($theMsg,'back');

                    
                }
            } else {
                $theMsg = "<div class='msg error'>Sorry You Can Not Browse This Page Directly</div>";
                redirectHome($theMsg);
            }

          

        } elseif ($do == 'Delete') {

            echo "<h1>Delete Meal</h1>";

            $itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval( $_GET['itemid']) : 0;

            $check = checkItem('itemID','items', $itemid);

            if($check > 0) {

                $stmt = $con->prepare("DELETE FROM 
                                            items 
                                        WHERE 
                                            itemID = :item");

                $stmt->bindParam(':item', $itemid);
                $stmt->execute();
                $count = $stmt->rowCount();

                $theMsg = "<div class='msg success'>".$count." Record Deleted</div>";
                redirectHome($theMsg,'back');

            } else {
                $theMsg = '<div class="msg error">This ID Is Not Exists</div>';
                redirectHome($theMsg);

            }


        }

    }else {
       
        header('Location: signin.php');
        exit();
    }

    


?>


<?php

    include $tpl."footer.php";

?>

