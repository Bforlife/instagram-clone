<?php
session_start();

require '../classes/regClass.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $obj = new insert();

    if (!isset($_SESSION['id'])) {
        echo "You must be logged in to comment.";
        return;
    }

    $user_id = $_SESSION['id'];
    $comment = $_POST['comment'];
    $post_id = $_POST['post_id'];

    if (!empty($comment) && !empty($post_id)) {
        $newComment = $obj->insertComments($post_id, $user_id, $comment);

        if ($newComment) {
            echo json_encode([
                'success' => true,
                'comment' => $newComment 
            ]);
         return;
        }
      
         echo json_encode(['success' => false, 'error' => "Failed to add comment."]);
    }
} else {
    echo json_encode(['success' => false, 'error' => "Invalid comment or post ID."]);

}
?>
