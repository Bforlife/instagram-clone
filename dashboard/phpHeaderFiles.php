<?php
session_start();
// fix the profile when you click on a user


require '../db/dbConfig.php';
        $database = new Database();
        $db = $database->dsn();

// require classes
require '../classes/userPosts.Class.php';
require '../classes/userComment.Class.php';
require '../classes/suggestedUsers.Class.php';




// commentData
$commentObj = new CommentData($db);
// postData
$obj = new PostData ($db);

// get user data class require
    require '../classes/userDataClass.php';
       
// Check if a new user session ID exists
if (isset($_SESSION['new_user_id'])) {
    $id = $_SESSION['new_user_id'];
    $user_data = new userData($id,$db);

    $username = $user_data->getUsername();
    $profile = $user_data->getProfileImg();
    $currentUserId = $user_data->getUserId();

if (isset($_GET['p'])) {
$postId = $obj->getPostById($_GET['p']);
$totalPosts=$obj->countPosts();

$comments = $commentObj->fetchCommentsForPost($postId->id);

}

// postData
$posts = $obj->getPosts(); 
$totalPosts=""; 

// COUNT AND FETCH POSTS FOR USER PROFILE
$uIdPostCount = $obj->getUserPostsCount($currentUserId);

$userPosts = $obj->getUserPosts($currentUserId);
// print_r($userPosts);




if (isset($_GET['p'])) {
$postId = $obj->getPostById($_GET['p']);
$totalPosts=$obj->countPosts();

$comments = $commentObj->fetchCommentsForPost($postId->id);

}


foreach($posts as $commentCount){
    $count = $commentObj->getTotalComments($commentCount->id);
 

}

// get last comment
foreach($posts as $row){

$lastComment = $commentObj->fetchLastCommentPost($row->id);
}


// suggested users
$suggestedObj = new SuggestedUsers_Class($db, $id);
$suggested = $suggestedObj->getSuggestedUsers();




}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nimsta | Daily Dose Of Vibes</title>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<!-- google font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mystery+Quest&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../assest/css/styles.css">
</head>
<body>


