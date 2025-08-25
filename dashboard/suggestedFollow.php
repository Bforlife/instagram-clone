<!-- Suggested User Header -->

<div class="see-all">
  <div><span>Suggested for you</span></div>
  <div id="see_all"><a href="suggested.php">See All</a></div>
</div>
<?php 

?>
    <div class="info"></div>

<!-- Single Suggested User -->
 <?php foreach($suggested as $row){ 
?>
  
<div class="suggested-user">
<div class="profile-pic">
  <a href="profile.php?username=<?php echo $row->username; ?>">
    <img src="<?php echo $row->profile; ?>" alt="" 
         style="border-radius: 50px; width:40px; height:40px;">
  </a>
</div>
    <!-- use get to fetch the username from the url -->
 <div class="user-info">
  <a href="profile.php?username=<?php echo $row->username; ?>" 
     style="text-decoration:none;">
    <span><?php echo $row->username; ?></span>
  </a>
</div>

  <div class="follow-action">
    <form class="follow-form" method="POST">
      <input type="hidden" name="followed_id" value="<?php echo $row->id; ?>">
      <input type="submit" name="follower_id" value="Follow" class="follow-btn">
    </form>         
 </div>
</div>
<?php } ?>


<?php require "../includes/footer.php"; 
?>
<script>
$(".follow-form").on("submit", function(e) {
  e.preventDefault();

  var form = $(this);
  var submitBtn = form.find("input[type=submit]");

  submitBtn.val('Following...').prop('disabled', true).css('cursor', 'not-allowed');

  $.ajax({
    url: '../controls/insertFollows.php',
    type: 'POST',
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    success: function(data) {
      let result = data.trim();

      if (result === "Followed successfully") {
        $(".info").html('<span class="text-success">' + result + '</span>');

        submitBtn.val('Following').prop('disabled', true).css('cursor', 'not-allowed');

      } else if (result === "Already following") {
        $(".info").html('<span class="text-warning">' + result + '</span>');

        submitBtn.val('Following').prop('disabled', true).css('cursor', 'not-allowed');
      } else {
        $(".info").html('<span class="text-danger">' + result + '</span>');
        submitBtn.val('Follow').prop('disabled', false).css('cursor', 'pointer');
      }
    }
  });
});


</script>