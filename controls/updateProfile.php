<?php
session_start();
require '../classes/updateClass.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    if (!empty($_FILES['profile']['tmp_name'])) {
        $fileTmpPath = $_FILES['profile']['tmp_name'];
        // this line is need to check the extension
        $originalName = $_FILES['profile']['name']; 

        $obj = new update();
        $updateProfile = $obj->updateUserProfile($id, $fileTmpPath, $originalName);

        echo $updateProfile;
    } else {
        echo "No file selected.";
    }
}
