
<?php require 'phpHeaderFiles.php';?>

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
<!--  -->

<!-- main container -->

<div class="app-container">

<!-- TOP STORIES -->
<div class="stories-bar">
<?php require "stories.php"; ?>
</div>


<div class="sidebar">
<?php require "../includes/nav.php"; ?>

</div>


<div class="main-layout">

<!-- MAIN FEED -->
<div class="feed">
<?php require "mainContent.php"; ?>

</div>

<div class="suggested">
<?php require "suggestedFollow.php"; ?>
</div>



<?php  echo $_SESSION['id']; ?>

</div>
</div>

<!-- custom modal for comment section -->
<?php
if(isset($_GET['p'])){ 
   if ($postId){
  ?>
<div class="comment-model">
<!-- close btn -->
<button type="button" class="btn-close closeComment" id="closeModalBtn"></button>

<div class="modal-dialog modal-dialog-centered modal-xl"> 
<div class="modal-content model-content">
<div class="modal-body p-0">

<div class="row g-0">
<!-- Media (image or video) -->
<div class="col-md-7 bg-dark d-flex align-items-center justify-content-center" style="height: 90vh;">
<?php if ($postId->media_type === 'image'){ ?>
<img src="<?php echo $postId->image_url; ?>" class="img-fluid" style="max-height: 100%; max-width: 100%; object-fit: contain;">
<?php } elseif ($postId->media_type === 'video'){ ?>
<div class="ratio ratio-16x9 w-100">
<video src="<?php echo $postId->image_url; ?>" controls muted style="max-height: 100%; max-width: 100%; object-fit: contain;"></video>
</div>
<?php } ?>
</div>


<!-- Comments & caption -->
<div class="col-md-5 d-flex flex-column justify-content-between commentCaption">


<div class="p-3">
<!-- User Info -->
<div class="d-flex align-items-center mb-2 profile-comment">
<img src="<?php echo $postId->profile; ?> ?>" class=" me-2">

<strong class="profileCommentname"> <p><?php echo $postId->username;?></p></strong>


<!-- span for ellipse icon -->
<span class="menu" id="openOptionsModal">
<i class="fa-solid fa-ellipsis"></i>
</span>            
</div>
</div>

          <!-- Comments Section -->
<div class="d-flex flex-column px-3 flex-grow-1 comments" style="overflow-y: auto; max-height: 90vh; margin-bottom:30px;">

  <!-- Scrollable Comments -->
  <div id="scrollablecomments" class="flex-grow-1 mb-3 pe-1" style="overflow-y: auto;">
    <?php foreach ($comments as $comment) { ?> 
      <div class="d-flex align-items-start mb-3">
        <img src="<?php echo $comment->profile; ?>" class="rounded-circle me-2" style="width: 36px; height: 36px; object-fit: cover;">
        <div>
          <div>
            <strong><?php echo $comment->full_name; ?></strong>
            <span class="ms-1"><?php echo $comment->comment; ?></span>
          </div>
          <small style="color:#ccc;"><?php echo $comment->created_at; ?></small>
        </div>
      </div>
    <?php } ?>
  </div>

  <!-- post actions -->
  <div class=" pt-2 fs-6">
    <div class="post-actions mb-2 d-flex gap-3">
      <form  method="post" id="like_form">
        <input type="hidden" value="<?php echo $postId->id; ?>" name="user_id">
        <input type="hidden" value="<?php echo $user_data->getUserId(); ?>" name="post_id">
        <!-- <button class=" btn btn-sm" style="border:none;outline:none;color:white">like</button> -->
      </form>
      <i class="far fa-heart"></i>
      <i class="far fa-comment" id="view"></i>
      <i class="far fa-paper-plane"></i>
      <i class="far fa-bookmark ms-auto"></i>
    </div>
    <div>
     <div style="font-size:8px; display: flex;">
      <div style="padding-left:10px"> 
      
      <h6 class="mb-0">  <?php echo $commentObj->countLike($postId->id); ?></h6>
      </div>

      <div style=" padding-left:12px">
        <?php $count = $commentObj->getTotalComments($postId->id); ?>
      <span><?php echo $count; ?></span>

      </div>
     </div>
      <small  style="color:#ccc;"><?php echo $postId->created_at; ?></small>
    </div>
  </div>

  <!-- Add Comment Form -->
   <!-- <div class="err"></div> -->
  <?php if (isset($postId)) { ?>
    <form id="commentForm" method="POST" class="d-flex align-items-center gap-2  mt-3 pt-2">
      <img src="<?php echo $postId->profile; 

      ?>" class="rounded-circle" style="width: 36px; height: 36px; object-fit: cover;">
      <input type="hidden" name="post_id" value="<?php echo $postId->id; ?>">
      <input type="text" class="form-control border-0 shadow-none" name="comment" placeholder="Add a comment..." required>
      <input type="submit" class="btn btn-sm" style="background:#141414; color:#f5f4f3; border:1px solid #141414" value="Post">
    </form>
  <?php } ?>
</div>

      </div>
    </div>
  </div>


</div>

<?php }} ?>

<!--  -->

          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- model for ellipse menu -->
<div class="options-modal d-none" id="optionsModal">
  <ul class="options-list">
    <li class="text-danger">Report</li>
    <li>Unfollow</li>
    <li>Add to favourites</li>
    <li> Go to post</li>
    <li>Share to...</li>
    <li>Copy link</li>
    <li>Embed</li>
    <li>About this account</li>
    <li id="cancelOptions" class="fw-bold">Cancel</li>
  </ul>
</div>


<!-- offcanvas for the display the search input -->
<div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel" >
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


<?php require '../includes/footer.php';?>


<script>

document.addEventListener("DOMContentLoaded", function () {
    
    // Close modal and remove ID from URL
    const closeModalBtn = document.getElementById("closeModalBtn");
    if (closeModalBtn) {
        closeModalBtn.addEventListener("click", function () {
            const url = new URL(window.location.href);
            url.searchParams.delete('p');
            window.history.pushState({}, document.title, url.pathname);
        });
    }

    // Show modal
    $(document).on("click", "#view", function (e) {
        e.preventDefault();
        $(".comment-model").fadeIn(); 
    });

 
    $(document).on("click", "#closeModalBtn", function () {
        $(".comment-model").hide();
    });

});

  // Submit post to backend
  $("#postForm").on("submit", function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      url: "../controls/uploadPosts.php",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function(response) {
        alert(response);
        console.log(response);
        $("#uploadMessage").html(response);
        $("#postForm")[0].reset();
        
      }
    });
  });


  // Submit comment to backend
  $("#commentForm").on("submit", function(e) {
  e.preventDefault();

  var form = $(this);
  var submitBtn = form.find("input[type=submit]");
  submitBtn.val('Posting...').prop('disabled', true);

  $.ajax({
    url: '../controls/insertComments.php',
    type: 'POST',
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    dataType: 'json',
    success: function(response) {
      console.log(response); 

      if (response.success) {
        var c = response.comment;
        var newCommentHtml = `
          <div class="d-flex align-items-start mb-3">
            <img src="${c.profile}" class="rounded-circle me-2" style="width: 36px; height: 36px; object-fit: cover;">
            <div>
              <div>
                <strong>${c.full_name}</strong>
                <span class="ms-1">${c.comment}</span>
              </div>
              <small style="color:#ccc;">${c.created_at}</small>
            </div>
          </div>
        `;

        // inserts the new comments on top of the older comments
        $("#scrollablecomments").prepend(newCommentHtml); 

        form[0].reset();

      submitBtn.val('Post').prop('disabled', false);
    }
    
  }});
});


  // user create post form

  $('#postInput').on('change', function (e) {
  const files = e.target.files;
  const previewContainer = $('#previewContainer');
  previewContainer.html(""); 

  if (files.length === 0) return;

  $('#nextToStep2').prop('disabled', false);
  $('#postInput').hide();


  for (let i = 0; i < files.length; i++) {
    const file = files[i];
    const fileType = file.type;
    const reader = new FileReader();

    reader.onload = function (event) {
      const url = event.target.result;

      let previewHTML = `
        <div class="col">
          <div class="card shadow-sm">
            ${fileType.startsWith("image/") 
              ? `<img src="${url}" class="card-img-top" style="max-height: 200px; object-fit: cover;">`
              : `<video controls style="width: 100%; max-height: 200px;"><source src="${url}" type="${fileType}"></video>`}
          </div>
        </div>
      `;

      previewContainer.append(previewHTML);
    };

    reader.readAsDataURL(file);
  }
});


 //step 2 to add caption
    $('#nextToStep2').on('click', function () {
      $('#step1').addClass('d-none');  
      $('#step2').removeClass('d-none'); 
    });

    // When the back button is clicked
    $('#backToStep1').on('click', function () {
      // Hides caption step
      $('#step2').addClass('d-none');   
      $('#step1').removeClass('d-none');
      // if the user goes back, show the input again
       $('#postInput').show(); 
    });



  


  // script for ellipse menu icon
    // Open modal
  $('#openOptionsModal').click(function () {
    $('#optionsModal').fadeIn().removeClass('d-none').css('display', 'flex');
  });

  // Closes the modal 
  $('#cancelOptions').click(function () {
    $('#optionsModal').fadeOut();
  });

  // Closes the modal when clicking outside the modal content
  $('#optionsModal').click(function (e) {
    if (e.target.id === 'optionsModal') {
      $(this).fadeOut();
    }
  });


  // insert like


</script>



</body>
</html>