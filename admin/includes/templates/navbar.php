
  
    <!-- Starting Navbar -->

    <div class="nav">
        
        <div class="container">

            <div class="header-area">

                <span class="logo">Yummy</span>
                <div class="links-container">
                    <ul class="links" id="links">
                    <?php
                    if ($pageTitle == 'Ordering' || $pageTitle == 'Categories' || $pageTitle == 'OrdersList') {
                        echo'<li><a href="index.php" class="active">Home</a>';

                    }else {
                        echo'<li><a href="../index.php" class="active">Home</a>';
                    }
                    ?>

                    <?php

                    if (isset($_SESSION['ID']) && $pageTitle != 'Meals') {
                       echo '<li><a href="orderslist.php?userid='.$_SESSION['ID'] .'" >OrderList</a></li>';
                        
                    } 

                    if ($pageTitle == 'Meals') {
                        echo '<li><a href="../orderslist.php?userid='.$_SESSION['ID'] .'" >OrderList</a></li>';

                    }
                    
                
                    ?>
                    
                       
                    </ul>

                        
                    <button class="toggle-menu" id="toggle-menu">

                        <span></span>
                        <span></span>
                        <span></span>

                    </button>

                </div>
            </div>  
        </div>
    </div>
           
  
    <!-- Ending Navbar -->