

<!-- work on the display of this page -->
  <?php require 'phpHeaderFiles.php';
  ?>
  <?php require '../includes/nav.php'; ?>

  <main class="explore-container ">
  
    <section class="suggestions">
      <h4>Suggested</h4>
      <?php foreach($suggested as $row){ ?>
    <div class="user-card">
        <div class="user-info">
            <div>
                <img src="<?php  echo $row->profile;?>">
            </div>
            <div class="user_details" >
           <span class="fullname"><?php echo $row->full_name;?></span>
           <span class="followed">followed by john_nazy</span>
            </div>

            <div class="suggestedFollow">
                <button  id="suggestedFollow">Follow</button>
            </div>
          
        </div>
      </div>
      <?php } ?>
    </section>
  </main>

  <?php require '../includes/footer.php'; ?>
</body>
</html>
