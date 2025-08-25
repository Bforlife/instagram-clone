
<div class="main-feed">
<?php foreach($posts as $row){ ?>
<div class="post">

<!-- Post Header -->
<div class=" post-header">
<img src="<?php echo $row->profile; ?>" alt="User" width="60" style="border-radius: 50%;">
<div>
<h3><?php echo $row->username; ?></h3>
<span ><?php echo $row->created_at; ?></span>
</div>
</div>

<div class="post-media">
<?php if ($row->media_type === 'image'){ ?>
<img src="<?php echo $row->image_url; ?>" alt="Post image" class="img-fluid">
<?php } elseif ($row->media_type === 'video'){ ?>
<div class="ratio ratio-16x9">
<video src="<?php echo $row->image_url; ?>" controls muted></video> 
</div>
<?php } ?>
</div>
<div class="like-message"></div>

<!-- Post Actions -->
<div class="post-actions">
<form class="likeForm" method="POST">
<input type="hidden" name="post_id" value="<?php echo $row->id; ?>">

<input type="submit" id="like_<?php echo $row->id; ?>" style="display: none;">
<label for="like_<?php echo $row->id; ?>" style="cursor: pointer;">

<?php $isLiked =$commentObj->isPostLiked($row->id,$id);
if($isLiked){?>
<i class="fas fa-heart" style="font-size: 20px; color: red;"></i>
<?php 
}else{
?>
<i class="far fa-heart" style="font-size: 20px; color: white;"></i>
<?php } ?>
</label>
</form>

<a href="?p=<?php echo $row->id; ?>"><i class="far fa-comment"></i></a>
<i class="far fa-paper-plane"></i>
<i class="far fa-bookmark bookmark"></i>
</div>
<div style="display: flex;  width: 20%;font-size:16px;gap:20px;">
    <div>
<span class="like-count"  style="font-size: 12px;padding-left:8px;"> <?php echo $commentObj->countLike($row->id); ?>

</span>
<p>Like</p>
    </div>
    <div>
<?php $count = $commentObj->getTotalComments($row->id); ?>
<span class="comment" style="font-size: 12px;padding-left:10px;"> <?php  echo $count; ?>
</span>

    </div>
</div>


<!-- Post Caption -->
<div class="post-caption">
<p><?php echo $row->caption; ?></p>
<strong><h3><?php echo $row->username; ?></h3></strong>


<!-- insert comment -->
<div>
<!-- <div class="err"></div> -->
<form  class="commentForm" method="post">
<input type="hidden" name="post_id" value="<?php echo $row->id; ?>">
<input type="text" placeholder="Add a comment..." name="comment" style="border:none; outline:none; text-decoration:none; width:68%; height:35px; ">
<input type="submit" class="btn btn-sm" style="background:#141414; color:#f5f4f3; border:1px solid #141414;" value="Post">
</form>
</div>
<!-- Last comment -->
<div style="padding: 4px 0px; font-size: 14px;">
<?php 
$lastComment = $commentObj->fetchLastCommentPost($row->id);  
if ($lastComment){ ?>
<span class="ms-1 latest-comment"><?php echo $lastComment->comment; ?></span>
<?php } else { ?>
<span>No comments yet</span>
<?php } ?>
</div>

<?php $count = $commentObj->getTotalComments($row->id); ?>
<a href="?p=<?php echo $row->id; ?>"> <span id="view" class="viewCommentsBtn"> View all <?php echo $count; ?> comments </span> </a>

</div>


</div>
<?php } ?>

<!-- closing main-feed -->

</div> 

<?php require "../includes/footer.php"; ?>

<script>


// Comment Form Submission
$(".commentForm").on("submit", function (e) {
e.preventDefault();
var form = $(this);
var latestCommentBox = form.closest(".post-caption").find(".latest-comment");


$.ajax({
url: '../controls/insertComments.php',
type: "POST",
data: new FormData(this),
contentType: false,
cache: false,
processData: false,
dataType: "json",
success: function (data) {

if (data.success) {
var c = data.comment;


var newCommentHtml = `
<div class=" align-items-start mb-2">
        <span class="ms-1 latest-comment">${c.comment}</span>
    
</div>
`;

// show new comment 
latestCommentBox.prepend(newCommentHtml);

form[0].reset();
} else {
alert(response.error);
}}
});
});


// Like Form Submission
$(".likeForm").on("submit", function (e) {
    e.preventDefault();

    var form = $(this);
var postId = form.find("input[name='post_id']").val();
var heartIcon = form.find("i"); 
var likeCount = form.closest(".post").find(".like-count");
var currentLikes = Number(likeCount.text());

$.ajax({
url: "../controls/insertLikes.php",
type: "POST",
data: form.serialize(),
dataType: "json",
success: function (response) {

if (response.status === "liked") {
    heartIcon.removeClass("far").addClass("fas").css("color", "red");
    likeCount.text(currentLikes + 1);
// display the counted number just according to user interaction

} else if (response.status === "unliked") {
    heartIcon.removeClass("fas").addClass("far").css("color", "white");
       likeCount.text(currentLikes > 0 ? currentLikes - 1 : 0);
}
      
}
});
});

</script>
