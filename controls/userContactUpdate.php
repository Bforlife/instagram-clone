<?php
session_start();
require '../classes/updateClass.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $year = $_POST['year'];
    $month = str_pad($_POST['month'], 2, '0', STR_PAD_LEFT);
    $day = str_pad($_POST['day'], 2, '0', STR_PAD_LEFT);
    $gender = $_POST['gender'];


   if (empty($gender)) {
    echo "Please select a valid gender.";
    return;
}


    $dob = "$year-$month-$day"; 

    
// Validate Age
$dob = $year . '-' . $month . '-' . $day;
$birthDate = new DateTime($dob);
$today = new DateTime();
$age = $today->diff($birthDate)->y;

if ($age < 6) {
    echo "too_young";
    return;
}

    $obj = new update();

    $updateDob = $obj->updateUserDob($dob, $id,$gender); 

    echo $updateDob;

}


?>
