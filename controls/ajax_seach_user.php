<?php 
// revisit
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
require '../classes/search.class.php';
require '../classes/suggestedUsers.Class.php';


$search= $_POST['search'];
$obj = new search_user();

$res = $obj->searchUser($search);




foreach($res as $row){
$isFollowing = $obj->isFollowing( $_SESSION['id'], $row['id']);
        
   $profileUrl = "../dashboard/profile.php?user_id=" . $row['id'];

?>
 
    <div >
      <a href="<?php echo $profileUrl; ?>">
        <img src="<?php echo $row['profile'] ?>" class="img-fluid">
      </a>
    </div>

    <div class="searchActions">
<div class="info"></div>
      <a href="<?php echo $profileUrl; ?>">
      <span><?php echo $row['username'] ?></span> <br>
      <small><?php echo $row['full_name'];?></small>
      </a>
 
    </div>
    
<!-- use what you have in the suggested follow to duplicate here -->
     
       <?php 
       if(!$isFollowing){?>
       <form class="follow-form" method="POST" style="position:absolute; right:30px;">
      <input type="hidden" name="followed_id" value="<?php echo $row['id']; ?>">
      <input type="submit" name="follower_id" value="Follow" class="follow-btn">
    </form>    
    <?php } else{?>
      
<form class="follow-form" method="POST" style="position:absolute; right:30px;">
      <input type="hidden" name="followed_id" value="<?php echo $row['id']; ?>">
      <input type="button" name="follower_id" value="Following" class="follow-btn">
    </form>
      <?php  }} ?>
<?php

}else{
    echo "No data found";
}

?>

<script>
$(".follow-form").on("submit", function(e) {
  e.preventDefault();

  var form = $(this);
  var submitBtn = form.find("input[type=submit]");

  submitBtn.val('Following...').prop('disabled', true).css('cursor', 'not-allowed');

  $.ajax({
    url: '../contols/insertFollows.php',
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