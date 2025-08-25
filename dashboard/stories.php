<div id="storyCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="10000">
  <div class="carousel-inner d-flex">

    <div class="carousel-item active">
      <div class="d-flex justify-content-start gap-3">
        <div class="story">
          <img src="../assest/profile/profile1.jpg" class="story-avatar" alt="Axusi">
          <span class="story-username">Axusi</span>
        </div>
        <div class="story">
          <img src="../assest/profile/profile2.jpg" class="story-avatar" alt="devqueen">
          <span class="story-username">devqueen</span>
        </div>
        <div class="story">
          <img src="../assest/profile/profile3.jpg" class="story-avatar" alt="chillbae">
          <span class="story-username">chillbae</span>
        </div>
         <div class="story">
          <img src="../assest/profile/profile3.jpg" class="story-avatar" alt="chillbae">
          <span class="story-username">chillbae</span>
        </div>
         <div class="story">
          <img src="../assest/profile/profile3.jpg" class="story-avatar" alt="chillbae">
          <span class="story-username">chillbae</span>
        </div>
         <div class="story">
          <img src="../assest/profile/profile3.jpg" class="story-avatar" alt="chillbae">
          <span class="story-username">chillbae</span>
        </div>
        <div class="story">
          <img src="../assest/profile/profile4.jpg" class="story-avatar" alt="artgram">
          <span class="story-username">artgram</span>
        </div>
           <div class="story">
          <img src="../assest/profile/profile4.jpg" class="story-avatar" alt="artgram">
          <span class="story-username">artgram</span>
        </div>   <div class="story">
          <img src="../assest/profile/profile4.jpg" class="story-avatar" alt="artgram">
          <span class="story-username">artgram</span>
        </div>   <div class="story">
          <img src="../assest/profile/profile4.jpg" class="story-avatar" alt="artgram">
          <span class="story-username">artgram</span>
        </div>   <div class="story">
          <img src="../assest/profile/profile4.jpg" class="story-avatar" alt="artgram">
          <span class="story-username">artgram</span>
        </div>
      </div>
    </div>

    <div class="carousel-item">
      <div class="d-flex justify-content-start gap-3">
        <div class="story">
          <img src="../assest/profile/profile5.jpg" class="story-avatar" alt="Larisa">
          <span class="story-username">Larisa</span>
        </div>
        <div class="story">
          <img src="../assest/profile/profile6.jpg" class="story-avatar" alt="workMe">
          <span class="story-username">workMe</span>
        </div>
        <div class="story">
          <img src="../assest/profile/profile7.jpg" class="story-avatar" alt="vetKing">
          <span class="story-username">vetKing</span>
        </div>
        <div class="story">
          <img src="../assest/profile/profile8.jpg" class="story-avatar" alt="vimQueen">
          <span class="story-username">vimQueen</span>
        </div>
        <div class="story">
          <img src="../assest/profile/profile8.jpg" class="story-avatar" alt="vimQueen">
          <span class="story-username">vimQueen</span>
        </div><div class="story">
          <img src="../assest/profile/profile8.jpg" class="story-avatar" alt="vimQueen">
          <span class="story-username">vimQueen</span>
        </div><div class="story">
          <img src="../assest/profile/profile8.jpg" class="story-avatar" alt="vimQueen">
          <span class="story-username">vimQueen</span>
        </div><div class="story">
          <img src="../assest/profile/profile8.jpg" class="story-avatar" alt="vimQueen">
          <span class="story-username">vimQueen</span>
        </div><div class="story">
          <img src="../assest/profile/profile8.jpg" class="story-avatar" alt="vimQueen">
          <span class="story-username">vimQueen</span>
        </div><div class="story">
          <img src="../assest/profile/profile8.jpg" class="story-avatar" alt="vimQueen">
          <span class="story-username">vimQueen</span>
        </div>
      </div>
    </div>

  </div>

  <!-- Controls -->
  <button class="carousel-control-prev" type="button" data-bs-target="#storyCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#storyCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>



<!-- profile -->
<?php if (isset($_SESSION['username'])){ ?>
<div class="profileView">
  <div class="user-preview">
    <div style="display: flex; align-items: center;">
      <img src="<?php echo $_SESSION['profile'];?>" 
           style="width: 45px; height: 45px; border-radius: 50px; object-fit: cover; margin-left: 20px;">

      <div>
        <strong style="color: #fff; display: block; margin-left:10px;"><?php echo $_SESSION['username']; ?></strong>
        <span style="color: gray; font-size: 13px; padding-left:8px;"><?php echo $_SESSION['name']; ?></span>
      </div>
    </div>
  </div>
</div>
<?php } ?>
