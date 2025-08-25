
<!-- nav.php -->
<div class="sidebarr">
<div class="logo"> <h3>Instagram</h3></div>


<nav class="nav-links">
    <!-- Home -->
<div class="nav-item"><a href="index.php"><span><i class="fas fa-home"></i></span> <span>Home</span></a></div>
<!-- search -->
<div class="nav-item">
<a href="" role="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"> 
<span><i class="fas fa-search"></i> </span>  
<span>Search</span></a>
</div>
<!-- explore -->
<div class="nav-item">
<a href="explore.php">
<span>
<i class="fas fa-compass"></i> 

</span>

<span>Explore</span>
</a>
</div>
<!-- reel -->
<div class="nav-item">
    <a href="reels.php"><span>
        <i class="fas fa-video"></i> 
    </span>
</span>
<span>Reel</span>
</a>
</div>
<!-- message -->
<div class="nav-item">
<a href="#">
    <span> <i class="fas fa-comment-dots"></i>  </span>
    <span> Message </span>
</a>

</div>
<!-- notification -->
<div class="nav-item">
    <a href="#">  <span><i class="fas fa-heart"></i>  </span>
    <span> Notification </span>
</a>

</div>

<!-- Create -->
<div class="nav-item">
<a href="" id="createPostBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
<span> <i class="fas fa-plus-square"></i>  </span>
<span> Create </span>
</a>
</div>

<!-- dashboard -->
<div class="nav-item">
  <a href="#">   <span>
<i class="fas fa-dashboard"></i>
    </span>
    <span>
        Dashboard
    </span>
 </a>
</div>

<!-- profile -->
<div class="nav-item">
 <a href="profile.php">
    <span>
        <img src="<?php echo $user_data->getProfileImg();  ?>" class="profileImage" alt="">
    </span>
    <span>
<?php echo $user_data->getUsername(); ?>
    </span>
   </a>

</div>
</nav>
<!-- ending div -->
</div>

<!-- offcanvas for the display the search input -->
<div class="offcanvas offcanvas-start" style="z-index: 10000000;" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel" >
  <div class="offcanvas-header">
    <button type="button" class="btn-close 
    searchBtnClose" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body" >
 <form id="searchForm" method="GET" class="d-flex align-items-center gap-2  mt-3 pt-2">
      <input type="text" class=" searchTerms border-0 shadow-none" name="search" placeholder="Find Your interest..." required>
      <input type="submit" class="btn btn-sm searchInputBtn" value="Search">
    </form>

    <div id="searchDisplay">
    <div>
      <img src="assest/profile/profile10.jpg" class="img-fluid">
    </div>

    <div class="searchActions">
      <span>beddings_couture</span> <br>
      <small>beddings_couture</small>
    </div>
    </div>
  </div>
</div>




<!-- create modal -->


<!-- modal for posts -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable modal-lg">
<div class="modal-content">
<div class="modal-header">
<h1 class="modal-title fs-5 text-dark" id="staticBackdropLabel">Create Posts</h1>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">

<!-- create posts form -->

<form id="postForm" enctype="multipart/form-data">
<!-- Step 1: Upload Image -->
<div id="step1">
<input type="file" name="post_media[]" id="postInput" class="form-control mb-3" accept="image/*,video/*" multiple required>



<!--  preview for images and videos -->
<div id="previewContainer" class="row row-cols-2 row-cols-md-3 g-3 mb-3">

<img id="imagePreview" style="max-width: 100%; display: none;" />
<video id="videoPreview" style="max-width: 100%; display: none;" controls></video>
</div>


<button type="button" class="btn btn-dark w-10" id="nextToStep2" disabled>Next</button>
</div>

<!-- Step 2: Caption -->
<div id="step2" class="d-none">
<textarea name="caption" class="form-control mb-3" placeholder="Write a caption..."></textarea>
<button type="button" class="btn btn-info w-10" id="backToStep1">Back</button>
<input type="submit" value="Post" class="btn btn-dark w-10">
</div>
</form>

<div id="uploadMessage" class="text-center mt-2"></div>


</div>

</div>
</div>
</div>
 



