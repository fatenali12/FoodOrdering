<?php


    session_start();
    $pageTitle = 'LogIn';

    if (isset($_SESSION['admin'])) {

        header('Location: meals.php?do=Manage');
    }

    include 'init.php';


    // Check if The User Coming from Http Post Request

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        $username = $_POST['username'];
        $password = $_POST['password'];
        $hashedPass = sha1($password);

        // echo $username;
        // echo $hashedPass;

        $stmt = $con->prepare("SELECT 
                                    UserID, UserName, Password
                                FROM 
                                    users
                                WHERE
                                    UserName = ?
                                AND
                                    Password = ?
                                AND
                                    GroupID = 1
                                LIMIT 1");
        
        $stmt->execute(array($username, $hashedPass));
        $row = $stmt->fetch();
        $count = $stmt->rowCount();

        if ($count > 0) {

            $_SESSION['admin'] = $username ;  //  Register Session Name
            $_SESSION['ID']    = $row['UserID']; //  Register Session ID

            header('Location: meals.php?do=Manage');
            exit();
        } else {

            echo "<div class='the-errors msg error'>There Is No Such Admin</div>";

        }
    }

  


?>


<!-- Start SignIN Form -->

<div class="login-box" id="signin">
        <div class="login">


            <div class="login-form">

                <h2>Admin Login</h2>

                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="input-container">

                        
                            <input type="text" name="username" class="myinput" autocomplete="off" required>
                            <label for="">User Name</label>
                    
                        </div>
                        <div class="input-container">

                            <input type="password" name="password" class="myinput" autocomplete="new-password" required>
                            <label for="">Password</label>

                        </div>
                        <div>
                            
                            <input type="submit" name="signin" value="Sign in">
                        </div>

                        
                    </form>

            </div>

          
        </div>
    </div>
</div>

 <!-- End SignIN Form -->



<?php
    include $tpl.'footer.php'
?>