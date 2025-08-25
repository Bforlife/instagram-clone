<?php require 'phpHeaderFiles.php';?>
<div class="sidebar" >
  <?php require '../includes/nav.php'; 
  
  if (isset($_GET['username'])) {
    $username = $_GET['username'];
    $searchedUserProfileId = $user_data->fetchSearchedUser($username);
    //  $searchedUserProfileId=$user_data->getUsername();
     $user_data = new userData($searchedUserProfileId,$db);
    
} else {
    $username = $_SESSION['username'];
}
  
  ?>
  </div>

  <div class="profileBody">
  <div class="profile-header">
    <img src="<?php  echo $user_data->getProfileImg();  ?>" alt="Profile Pic">
    <div class="profile-info">
      <div id="userDetails">
      <div><h4><?php echo $user_data->getUsername();?></h4></div>
      <div><button class="editProfileBtn">Edit Profile</button></div>
      <div><button class="editProfileBtn" >View archive</button></div>
      <div>
        <i class="fa fa-phone"></i>
      </div>
      </div>

      <div class="followData"> 
        <span> <?php echo $uIdPostCount; ?>  <span class="followDataDetails">posts</span> </span>
      <span> <?php echo $user_data->getTotalFollowers(); ?> <span class="followDataDetails">followers</span> </span>

      <span><?php echo  $user_data->getTotalFollowing();?> <span class="followDataDetails">following</span> </span>
      </div>

      <div class="bio">
        <span><?php echo $user_data->getFullname(); ?></span>
    <p>
         
        Adult entertainment service<br>
        All you want in life is at the other side of fear.<br>
        Courage is rightly considered the foremost of all virtues, upon it... <br>
         <a href="#"> wa.link/80s5mf</a> and 1 more
        </p>
   
       
      </div>
    </div>
  </div>

  <div class="highlight-section">
    <div class="highlight">Highlights</div>
    <div class="new">+</div>
  </div>

  <div class="tabs">
    <span>POSTS</span>
    <span>REELS</span>
    <span>SAVED</span>
    <span>TAGGED</span>
  </div>

  <div class="posts">
    
    <?php foreach($userPosts as $post){ ?>
    <img src="<?php echo $post->image_url; ?>" alt="Post 1">
     
    <?php }?>
  </div>
  <!-- ending div -->
</div>
  <?php require '../includes/footer.php'; ?>
