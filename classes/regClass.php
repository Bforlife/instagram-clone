<?php
// session_start();
class insert {
    protected $db;

    public function __construct() {
        require '../db/dbConfig.php';
        $database = new Database();
        $db = $database->dsn();
        $this->db = $db;
    }

    // Validate email
        public function emailExists($contact) {
        $check = $this->db->prepare("SELECT id FROM users WHERE contact = :contact");
        $check->execute(array(':contact' => $contact));
        return $check->rowCount() > 0;
    }


      public function registration($full_name,$username, $contact, $password) {
        // Insert values into users table
        $empty = " ";

        $insertUser = $this->db->prepare("INSERT INTO users
        (full_name, contact, password, username, dob, profile,gender)
        VALUES
        (:full_name, :contact, :password, :username, :dob, :profile,:gender)");

        $insertUser->execute(array(
           
            ":full_name" => $full_name,
            ":password" => $password,
            ":contact" => $contact,
            ":username" => $username,
            ":dob" => $empty,
            ":profile" => $empty,
            ":gender" => $empty

        ));

          if ($insertUser) {
            $user = $this->getLastUserId();
            $userId = $user->id;

            $_SESSION['new_user_id'] = $userId;
            return $userId;
        } else {
            return false;
        }


    }


// this method is here because i need to use the call the methos in the upadte function above
     public function getLastUserId(){
            $select = $this->db->prepare("SELECT * FROM users  ORDER BY id DESC LIMIT 1");
            $select->execute();
            if($select->rowCount() > 0){
            $users = $select->fetch(PDO::FETCH_OBJ);
            return $users;
       
    }}

    

    // upload posts
public function addPost($user_id, $media_url, $caption, $media_type) {
  $posts = $this->db->prepare("INSERT INTO posts (user_id, image_url, media_type, caption)
    VALUES (:user_id, :media_url, :media_type, :caption)");

  $posts->execute(array(
    ':user_id' => $user_id,
    ':media_url' => $media_url,
    ':media_type' => $media_type,
    ':caption' => $caption
  ));

  return $posts;
}



// insert comments

public function insertComments($post_id, $user_id, $comment) {
    $comments = $this->db->prepare("INSERT INTO comments (post_id, user_id, comment)
     VALUES (:post_id, :user_id, :comment)");
    $comments->execute(array(
        ':post_id' => $post_id,
        ':user_id' => $user_id,
        ':comment' => $comment
    ));
      if ($comments) {
        // Fetch the inserted comments
        $lastId = $this->db->lastInsertId();

        $sql = $this->db->prepare("SELECT comments.*, users.full_name, users.profile
                                     FROM comments
                                     JOIN users ON comments.user_id = users.id
                                     WHERE comments.id = :id");
        $sql->execute([':id' => $lastId]);

        return $sql->fetch(PDO::FETCH_ASSOC);
    }
    return false;

}



public function likePost($post_id, $user_id) {
    $check = $this->db->prepare("SELECT * FROM likes WHERE post_id = :post_id AND user_id = :user_id");
    $check->execute([
        ':post_id' => $post_id,
        ':user_id' => $user_id
    ]);

    if ($check->rowCount() > 0) {
        // remove like
        $delete = $this->db->prepare("DELETE FROM likes WHERE post_id = :post_id AND user_id = :user_id");
        $delete->execute([
            ':post_id' => $post_id,
            ':user_id' => $user_id
        ]);

        $status = "unliked";
    } else {
        // insert like
        $likes = $this->db->prepare("INSERT INTO likes (post_id, user_id) VALUES (:post_id, :user_id)");
        $likes->execute([
            ':post_id' => $post_id,
            ':user_id' => $user_id
        ]);

       $status = "liked";
    }

 

    return [
        "status" => $status
    ];
}




// insert follows

public function followUser($follower_id, $followed_id) {

  

        if ($follower_id == $followed_id) {
            return "You cannot follow yourself.";
        }

        // Check if already following
        $check = $this->db->prepare("SELECT * FROM follows WHERE followed_id = :followed_id AND follower_id = :follower_id");
        $check->execute(array(
            ':followed_id' => $followed_id,
            ':follower_id' => $follower_id
        ));

        if ($check->rowCount() > 0) {
            return "Already following.";
        }

        // Insert new follow record
        $insert = $this->db->prepare("INSERT INTO follows (followed_id, follower_id) VALUES (:followed_id, :follower_id)");
        $success = $insert->execute(array(
            ':followed_id' => $followed_id,
            ':follower_id' => $follower_id
        ));

  
       return $success ? "Followed successfully" : "Error following.";
    }



}

?>