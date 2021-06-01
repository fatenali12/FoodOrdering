<?php

ob_start();

$getTitle ='Signin/Signup';


if (isset($_SESSION['user'])) {

    header('Location: index.php');
    
}



include "includes/functions/functions.php";  
include 'admin/connect.php'; 



// Check if The User Coming from Http Post Request


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (isset($_POST['signin'])) {

    
        $user        = $_POST['username'];
        $pass        = $_POST['password'];
        $hashedpass  = sha1($pass);


        // echo $user;
        // echo  $hashedpass;



        //   Check if The User Exist In DataBase

            $stmt = $con->prepare('SELECT 
                                    UserID, UserName, Password
                                FROM 
                                    users 
                                WHERE
                                    UserName = ?
                                AND
                                    Password = ?');
           $stmt->execute(array($user, $hashedpass)) ;  

            $get   = $stmt->fetch();
            $count = $stmt->rowCount();

         

        if ($count > 0) {

            $_SESSION['user'] = $user;              // Register Session Name

            $_SESSION['uid']  = $get['UserID'];    // Register Session [user] ID
           
            header('Location: index.php');
            exit();

        } else {

            echo "<div class='the-errors msg error'>There Is No Such User</div>";

        }

    } else {

        $formErrors = array();

        $username = $_POST['username'];
        $pass = $_POST['password'];
        $conpass = $_POST['confirm-password'];
        $email = $_POST['email'];

        if (isset($username)) {
            $filteredUser = filter_var($username, FILTER_SANITIZE_STRING);
        }

        if (strlen($filteredUser) < 4) {

            $formErrors[] = 'User Name Must Be More Than 4 Characters';

        }

        if (isset($pass) && isset($conpass)) {

            if (empty($pass)) {
                $formErrors[] = 'Password Can Not Be Empty';
            }

            $pass = sha1($pass);
            $conpass = sha1($conpass);


            if ($pass != $conpass) {
                $formErrors[] = 'Sorry Password Is Not Match';
            }
        }

        if (isset($email)) {
            $filteredEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
        }

        if (filter_var($filteredEmail, FILTER_VALIDATE_EMAIL) !=true) {
            $formErrors[] = 'This Email Is Not Valid';

        }

        if (empty($filteredEmail)) {
            $formErrors[] = 'Email Can Not Be Empty';

        }

        // Check If There Is No Error Proceed The user Add


        if (empty($formErrors)) {

             // Check If User Exists In dataBase

            $check = checkItem('Username', 'users', $username);

            if ($check > 0) {

                $formErrors[] = 'This Username Is Exists';

            } else {

                 // Insert user Info InTO Database


                $stmt = $con->prepare("INSERT INTO 
                                            users (UserName, Password, Email, GroupID, RegStatus, RegDate)
                                        VALUES(:uName, :uPassword, :uEmail, 0, 0, NOW()) ");

                $stmt->execute(array(
                    'uName' => $username, 
                    'uPassword' =>sha1($pass), 
                    'uEmail' => $email
                ));

                // Echo Success Message

                $successMsg = 'Congrats You Are Successfuly Registerd' ;
            }

        }

    }
    
}


?>




<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $getTitle ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Cedarville+Cursive&family=Kalam&family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="layout/css/normalize.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="layout/css/style.css?v=<?php echo time();?>">


</head>

<body>
    
    <div class="upper-section">

       

        <div class="container">

            <div class="upper-box">

                <div class="left">

                    <a href="#" ><i class="fa fa-envelope">  Yamyfoodorderingsite@gmail.com</i></a>
                    <a href="#"><i class="fa fa-phone">  +(123)45678</i></a>
                        
                </div>
            
                <div class="right">
            
                    <a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.google.com"><i class="fa fa-google"></i></a>
                    <a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>
                    <!-- <a href="Signin.php"><i class="fa fa-sign-in"> Sign in</i></a> -->
                    <!-- <a href="signout.php"><i class="fa fa-sign-out"> Sign out</i></a> -->
            
                </div>

            </div>   
        </div>    
    </div>
    




    <!-- Ending Upper Nav -->

  

    <!-- Starting Navbar -->

    <div class="nav">
        
        <div class="container">

            <div class="header-area">

                <span class="logo">YaMi</span>
                <div class="links-container">
                    <ul class="links" id="links">
                        
                        <!-- <li><a href="index.html" class="active">Home</a></li> -->
                        <li><a href="index.php" class="active">Home</a></li>
                        <div class="login-appear">
                            <li><a href="Signin.php"><i class="fa fa-sign-in"> Sign in</i></a></li>
                            <li><a href="Signup.php"><i class="fa fa-sign-out"> Sign out</i></a></li>
                        </div>
                          
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



<!-- End SignIN Form -->


<div class="container">


   <!-- Starting Errors  -->

   <div class="the-errors">
        <?php

            if (!empty($formErrors)) {

                foreach($formErrors as $error) {

                    echo '<div class="msg error">'.$error.'</div>';
                }
            }



            if (isset($successMsg)) {

                echo '<div class ="msg success">'. $successMsg.'</div>';
            }


        ?>

    </div>
    <!-- Ending Errors  -->

    <div class="login-box" id="signin">
        <div class="login">


            <div class="login-form">

                <h2>Welcome Back</h2>

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

                    <a href="#">New User <span id="formin">Sign Up</span></a>
            </div>

          
        </div>
    </div>
</div>

 <!-- End SignIN Form -->


<!-- Start SignUP Form -->

<div class="container">

    <div class="login-box" id="signup">

        <div class="login signup-box">

       
            <div class="login-form">

                <h2>Welcome</h2>

                <form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="input-container">

                        <input 
                        type="text" 
                        name="username" 
                        class="myinput" 
                        autocomplete="off"
                         required>
                        <label for="">User Name</label>
                
                    </div>

                    <div class="input-container">

                        <input 
                        type="password" 
                        name="password" 
                        class="myinput" 
                        autocomplete="new-password"
                        required >
                        <label for="">password</label>

                    </div>

                    <div class="input-container">

                        <input 
                        type="password" 
                        name="confirm-password" 
                        class="myinput"
                        required >
                        <label for="">Confirm Password</label>

                    </div>

                    <div class="input-container">

                        <input 
                        type="email" 
                        name="email" 
                        class="myinput"
                        required >
                        <label for="">Email</label>

                    </div>
                    
                    
                   
                    <div>
                        
                        <input type="submit" name="signup" value="Sign Up">
                    </div>

                </form>

                <a href="#">New User <span id="formup">Sign IN</span></a>
            </div>

         
            
        </div>
    </div>


     
</div>



<!-- End SignUP Form -->






<!-- Starting Footer  -->

<div class="footer">
    <div class="container">

        <p>Copyright &copy; Designed By Faten Ali</p>

        <div class="contact-links">

            <a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a>
            <a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
            <a href="https://www.google.com"><i class="fa fa-google"></i></a>
            <a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>
            
        </div>
    </div>
</div>  



<!-- Ending Footer -->


    

    <!-- <script src="layout/js/main.js?v=<?php echo time();?>"></script> -->

    <script src="layout/js/script.js?v=<?php echo time();?>"></script>
</body>
</html>



<?php

ob_end_flush();


?>