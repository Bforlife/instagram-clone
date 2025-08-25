<?php

    require '../classes/userLoginClass.php';
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $user = new UserLogin;
    
        $login_result = $user->user_login($email, $password);
        // print_r(   $login_result) ;
  
        echo $login_result;

        
    }

  
    ?>

