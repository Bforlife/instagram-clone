<?php

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

require '../vendor/autoload.php';
session_start();
require '../classes/regClass.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $obj = new insert();

    if (!isset($_SESSION['id'])) {
        echo "You must be logged in to post.";
        return;
    }

    $user_id = $_SESSION['id'];
    $caption = $_POST['caption'];

    if (!empty($_FILES['post_media']['tmp_name'][0])) {
    // Cloudinary config
    Configuration::instance([
        'cloud' => [
            'cloud_name' => 'dautlarnb',
            'api_key'    => '473596117695386',
            'api_secret' => 'oWA5j9EeWh77EKn0ggrlEeRMznU'
        ],
        'url' => ['secure' => true]
    ]);

    $uploadApi = new UploadApi();
    $totalFiles = count($_FILES['post_media']['tmp_name']);
    $successCount = 0;

    for ($i = 0; $i < $totalFiles; $i++) {
        $tmpPath = $_FILES['post_media']['tmp_name'][$i];
        $fileType = $_FILES['post_media']['type'][$i];

        $resourceType = str_starts_with($fileType, 'video/') ? 'video' : 'image';

        $result = $uploadApi->upload($tmpPath, [
            'resource_type' => $resourceType,
            'format' => $resourceType === 'video' ? 'mp4' : null
        ]);

        if (isset($result['secure_url'])) {
            $media_url = $result['secure_url'];

            // Save each media file as a separate post
            $saved = $obj->addPost($user_id, $media_url, $caption, $resourceType);

            if ($saved) {
                $successCount++;
            }
        }
    }

    echo ($successCount > 0) 
        ? "$successCount file(s) uploaded and saved!" 
        : "Upload failed.";
} else {
    echo "No media files selected.";
}
}


?>