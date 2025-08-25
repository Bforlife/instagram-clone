<?php


session_start();
require '../classes/regClass.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['id'])) {
        echo "You must be logged in.";
        return;
    }

    $follower_id = $_SESSION['id'];
    $followed_id = $_POST['followed_id'];

    $obj = new insert();
    $result = $obj->followUser($follower_id, $followed_id);

    echo $result;

   
}
?>
