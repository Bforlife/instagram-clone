<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
</head>
<body>

    <form id="postForm" enctype="multipart/form-data">
  <input type="file" name="post_image" required>
  <textarea name="caption" placeholder="Write a caption..."></textarea>
  <input type="submit" value="Post">
</form>

<div id="uploadMessage"></div>


<script src="jQuery/jQuery.js"></script>

<script>
  $("#postForm").on("submit", function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      url: "controls/uploadPosts.php",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
        $("#uploadMessage").html(response);
        $("#postForm")[0].reset();
      }
    });
  });
</script>

</body>
</html>