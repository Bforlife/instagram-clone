
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="assest/css/styles.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mystery+Quest&display=swap" rel="stylesheet">

<!-- fontaweasome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body style="background-color: #141414;">

    <div class="reg-background">
      <!-- logo -->

  <div class="regLogo" id="mainLogo">
  <img src="assest/logo/instasignuplogo.png" width="700">
</div>


  <!-- registration form -->
    <div class="register-wrapper">

    <h3>Instagram</h3>
    <span>Sign up to see photos and videos from your friends.</span>
  <!-- Step 1: User Personal Details -->

  <form class="register-form step-form step-1" method="POST">

    <!-- fullname -->
    <input type="email" name="contact" placeholder="Email" required>

  <!-- email -->
     <input type="password" name="password" placeholder="password" required>


     <!-- password -->

    <input type="text" name="full_name" placeholder="Fullname" required>


    <input type="text" name="username" placeholder="Username" required>



 <!-- submit btn -->
    <button type="submit" class="next-btn">Create Account</button>
  </form>


  <!-- Step 2: Birthday -->

  <form class="register-form step-form step-4" method="POST" style="display:none;">
  <h3><i class="fa-solid fa-cake-candles fa-rotate-by fa-lg" style="color: #ffffff; --fa-rotate-angle: 37deg;"></i></h3>


  <label class="birthdayText">Add Your Birthday</label>
  <p class="notice">This won't be part of your public profile</p>

  <div class="birthdaySelect">

    <input type="hidden" name="id" value="<?php echo $userId; ?>">


    <!-- Year -->
    <select name="year" required>
      <option value="<?php echo $y; ?>">Year</option>
      <?php
        for ($y = 2025; $y >= 1950; $y--) {
          echo "<option value='$y'>$y</option>";
        }
      ?>
    </select>

  

<select name="month" required>
  <option value=''>Month</option>
  <?php
    for ($m = 1; $m <= 12; $m++) {
      $value = str_pad($m, 2, '0', STR_PAD_LEFT);
      $monthName = date("F", mktime(0, 0, 0, $m, 1));
      echo "<option value='$value'>$monthName</option>";
    }
  ?>
</select>


    <!-- Day -->
  <select name="day" required>
  <option value='<?php echo $d; ?>'>Day</option>
  <?php
  
      for ($d = 1; $d <= 31; $d++) {
    $day = str_pad($d, 2, '0', STR_PAD_LEFT);
    echo "<option value='$day'>$day</option>";
  }
  ?>
</select>
  </div>

  <div class="gender">
<!-- gender -->
 <select class="form-select form-select-lg m-auto" name="gender">
  <option value=""> Gender</option>
  <option value="male">Male</option>
  <option value="female">Female</option>
  <option value="Others">Others</option>
</select>

</div>

  <!-- previous btn -->
  <div class="form-buttons mt-5 mb-3" style="display: flex; gap: 10px; justify-content: space-between;">
  <button type="button" class="prev-btn">Previous</button>
</div>

  <button type="submit" class="submit-btn">Next</button> 
</form>


<!-- Step 3: Profile -->
  <form class="register-form step-form step-4 profile-step" method="POST" enctype="multipart/form-data" style="display:none;">
  <label>Choose your Profile Picture</label>
  
  <!-- Image preview -->
<img id="profilePreview" src="" style="display: none;"/>
<input type="hidden" name="id" value="<?php echo $userId;?>">
<input type="file" name="profile" id="profileInput"  accept="image/*" required>

<!-- Change Photo button-->
<button type="button" id="changePhotoBtn" style="display:none;" class="btn btn-secondary">
  Change Photo
</button>

<!-- previous btn -->
  <div class="form-buttons" style="display: flex; gap: 10px; justify-content: space-between;">
  <button type="button" class="prev-btn">Previous</button>
</div>

 <button type="submit" class="submit-btn">Finish</button>
</form>


<div id="anAcount">
  
    <p>By signing up, you agree to our Terms, Privacy Policy and Cookies Policy .</p>
  <h5>Already have an account? </h5>
  <h6><a href="index.php">Login</a>
 </h6>
  </div>
  
<!-- googleplay services -->
  <div class="googleplay">
 

  <div class="googleImage">
    <img src="assest/images/googlplay.png" width="130">

    <img src="assest/images/microsoft.png" width="130">

</div>
</div>


</div>

<!-- ending div --> 
 </div>


<script src="bootstrap/js/bootstrap.min.js"></script>
 <script src="jQuery/jQuery.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function () {
    $(".register-form").on("submit", function (e) {
      e.preventDefault();

      const form = $(this);
      let formData;
      let url = "";

      // Step 1 - Account Creation
      if (form.hasClass("step-1")) {
        url = "controls/reg.php";
        // Allows only text inputs
        formData = form.serialize(); 

    
        
        $.post(url, formData, function (response) {
          console.log("Step 1 Response:", response);

              // email validation

        if (response.trim() === "duplicate") {
      alert("This email has already been used. Please use another email.");
      return;
    }

    
          $("input[name='id']").val(response.trim()); 
          showNextForm(form);
        });

      } 
      // Step 2 - Birthday/Gender Update
      else if (form.hasClass("step-4") && !form.hasClass("profile-step")) {
        url = "controls/userContactUpdate.php"; 
        formData = form.serialize();

        $.post(url, formData, function (response) {
          // alert is user is too_young
          if (response.trim() === "too_young") {
         alert("You must be at least 6 years old to register.");
        return;
}

          console.log("Step 2 Response:", response);
          showNextForm(form);
        });

      } 
      // Step 3 - Profile Upload
      else if (form.hasClass("profile-step")) {
        url = "controls/updateProfile.php";

        // includes files and all hidden inputs
        formData = new FormData(this); 

        $.ajax({
          url: url,
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          success: function (response) {
            console.log("Step 3 Response:", response);
            alert('Account Created and Profile Updated');
            window.location.href = "index.php";
          },
          error: function (xhr, status, error) {
            console.error("Upload error:", error);
            alert("Image upload failed.");
          }
        });
      }
    });

    function showNextForm(currentForm) {
      currentForm.hide();
      const nextForm = currentForm.next(".step-form");

      if (nextForm.length > 0) {
        nextForm.fadeIn();
        if (nextForm.hasClass("profile-step")) {
          $("#mainLogo").hide();
        }
      } else {
        window.location.href = "index.php";
      }
    }

    $(".prev-btn").on("click", function () {
      const currentForm = $(this).closest(".register-form");
      const prevForm = currentForm.prev(".step-form");

      currentForm.hide();
      prevForm.fadeIn();

      if (currentForm.hasClass("profile-step")) {
        $("#mainLogo").show();
      }
    });

    // Profile Image Preview

    $("#profileInput").on("change", function () {
  var file = this.files[0];
  if (file) {
    // this allows for 10mb limit
    if (file.size > 10 * 1024 * 1024) {
      alert("Image is too large. Please choose one under 10MB.");
      // of the file upload is too large reset the input
      $(this).val(""); 
      return;
    }

    var reader = new FileReader();
    reader.onload = function (e) {
      $("#profilePreview").attr("src", e.target.result).show();
      $("#profileInput").hide();
      $("#changePhotoBtn").show();
    };
    reader.readAsDataURL(file);
  }
});


    $("#changePhotoBtn").on("click", function () {
      $("#profilePreview").hide().attr("src", "");
      $("#profileInput").val("").show();
      $(this).hide();
    });
  });
</script>






</body>
</html>