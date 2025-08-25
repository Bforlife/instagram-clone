<?php

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;
require '../vendor/autoload.php';


class update {
    protected $db;

    public function __construct() {
        require '../db/dbConfig.php';
        $database = new Database();
        $this->db = $database->dsn();

        // Cloudinary config
        Configuration::instance([
            'cloud' => [
                'cloud_name' => 'dautlarnb',
                'api_key'    => '473596117695386',
                'api_secret' => 'oWA5j9EeWh77EKn0ggrlEeRMznU'
            ],
            'url' => ['secure' => true]
        ]);
    }

    // Image validation
    public function isValidImage($path, $filetype) {
        if (!is_readable($path)) {
            return false;
        }

        $allowed_extension = array('jpg', 'png', 'jpeg');
        $extension = strtolower(pathinfo($filetype, PATHINFO_EXTENSION));

        if (!in_array($extension, $allowed_extension)) {
            return false;
        }

        $allowed_mime_type = array('image/jpg', 'image/png', 'image/jpeg');
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($path);

        if (!in_array($mime, $allowed_mime_type)) {
            return false;
        }

        return true;
    }

    //  Upload and update
    public function updateUserProfile($id, $fileTmpPath, $originalName) {
        // Validate image
        if (!$this->isValidImage($fileTmpPath, $originalName)) {
            return "Invalid image file. Please upload a JPG or PNG image.";
        }

        // Upload to Cloudinary
        $uploadResult = new UploadApi();
        $results = $uploadResult->upload($fileTmpPath);

        if (!isset($results['secure_url'])) {
            return "Upload failed or Cloudinary did not return a valid URL.";
        }

        $profileUrl = $results['secure_url'];

        // Update database
        $updateProfile = $this->db->prepare("UPDATE users SET profile = :profile WHERE id = :id");
        $updateProfileRes = $updateProfile->execute(array(
            'profile' => $profileUrl,
            'id'      => $id
        ));

        return $updateProfileRes ? "Profile updated successfully!" : "Failed to update profile in database.";
    }


    // age and gender  
public function updateUserDob($dob, $id, $gender)
{
    $update = $this->db->prepare("UPDATE users SET dob = :dob, gender = :gender WHERE id = :id");
    $result = $update->execute(array(
        ":dob" => $dob,
        ":id" => $id,
        ":gender" => $gender
    ));

    echo $result;

    return $result ? "DOB and gender status updated" : "Failed to update and gender DOB";
}
}
