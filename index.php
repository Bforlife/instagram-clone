<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | Nimsta</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assest/css/styles.css">

  <!-- google font -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mystery+Quest&display=swap" rel="stylesheet">
  
</head>
<body>

<div class="loginForm">
  <!-- logo -->
<div class="regLogo">
    <img src="assest/logo/instasignuplogo.png" width="700">
  </div>


  <div class="login-container register-wrapper">
    <h3>Instagram</h3> 
<div class="err"></div>
    <form  class="login-form">
      <input type="email" name="email" placeholder="Email" required />
      <input type="password" name="password" placeholder="Password" required />
      <input type="submit" value="Log In">
    </form>

    <div class="login-footer">
      Don't have an account? <a href="reg.php">Sign up</a>
    </div>

</div>


</div>
  </div>


  
  <!-- ending div -->
   </div>

<script src="jQuery/jQuery.js"></script>

    <script>
        $(document).ready(function(){

            $(".login-form").submit(function(e){
                e.preventDefault();
                $(".btn").val('Loging...').prop('disabled',true).css('cursor' ,'not-allowed');
                $.ajax({
                    url:'controls/userlogin.php',
                    method:'POST',
                    data: new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    success:function(data){
                        if(data.trim() == "success"){
                            window.location="dashboard/index.php"
                        }
                        else{
                            $(".err").html(data);
                        }

                         $(".btn").val('Login').prop('disabled',false).css('cursor' ,'pointer');
                    }


                })
            })

            
        })
    </script>


</body>
</html>
