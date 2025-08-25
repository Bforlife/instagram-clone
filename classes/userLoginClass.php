<?php

session_start();

class UserLogin {
    protected $db;

    public function __construct() {
        require '../db/dbConfig.php';
        $database = new Database();
        $db = $database->dsn();
        $this->db = $db;
    }



    public function user_login($contact, $password) {
    if (empty($contact) || empty($password)) {
        return "Enter your email address and password";
    }

    $sel = $this->db->prepare("SELECT * FROM users WHERE contact = :contact AND password = :password");
    $sel->execute(array(':contact' => $contact, ':password' => $password));
    $user = $sel->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // SESSION FOR USER LOGIN
        $_SESSION['new_user_id'] = $user['id']; 
        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['full_name'];
        $_SESSION['email'] = $user['contact'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['profile'] = $user['profile']; 

        return "success";
    } else {
        return "Invalid email or password";
    }
}

   }
?>