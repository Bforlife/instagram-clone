<?php
session_start();
require '../classes/regClass.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $obj = new insert();


    if (!isset($_SESSION['id'])) {
        echo "You must be logged in to like.";
        return;
    }

    $user_id = $_SESSION['id'];
    $post_id = $_POST['post_id'];

   if (!empty($post_id)) {
     
        $result = $obj->likePost($post_id, $user_id);

        echo json_encode($result);
    } else {
        echo json_encode(["error" => "Invalid post ID."]);
    }
        

}
?>
