

<?php 

session_start(); 

require '../classes/regClass.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $obj = new insert();

    $full_name = $_POST['full_name'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $username = $_POST['username'];

    $empty = " "; 


    if ($obj->emailExists($contact)) {
        echo "duplicate";
        exit;
    }
$userId = $obj->registration($full_name, $username, $contact, $password);

if ($userId) {
    $_SESSION['new_user_id'] = $userId;
    echo $userId;
} else {
    echo "Failed to register user.";
}

}
?>
