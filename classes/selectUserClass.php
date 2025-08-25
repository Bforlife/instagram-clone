<?php


class selectUserClass{
    protected $db;
    public $username;
    public $email;
    public $profile ;


    public function __construct($db) {
        $this->db = $db;
    }
// select a specific userid
     public function getUsersId($id){
            $select = $this->db->prepare("SELECT * FROM users WHERE id=:id");
            $select->execute(array(":id"=>$id));

            if($select->rowCount() > 0){
            $users = $select->fetch(PDO::FETCH_OBJ);
            $this->set_username($users->username);
            return $users;
       
    }}

    public function set_username($username){
        return $this->username = $username;
    }

    // select posts and join users table

    //  public function fetchAllPostsWithUserInfo() {
    //     $userPosts = "
    //         SELECT 
    //             posts.*, 
    //             users.username, 
    //             users.full_name, 
    //             users.profile
    //         FROM posts
    //         JOIN users ON posts.user_id = users.id
    //         ORDER BY posts.created_at DESC
    //     ";

    //     $results = $this->db->prepare($userPosts);
    //     $results->execute();
    //     return $results->fetchAll(PDO::FETCH_OBJ);
    // }



// fetch posts with single user
// public function fetchSinglePostWithUser($id) {
//     $singlePost = "
//         SELECT 
//             posts.*, 
//             users.id AS user_id, 
//             users.username, 
//             users.full_name, 
//             users.profile
//         FROM posts
//         JOIN users ON posts.user_id = users.id
//         WHERE posts.id = :id
//         LIMIT 1
//     ";

//     $response = $this->db->prepare($singlePost);
//     $response->execute(array(':id' => $id));
//     return $response->fetch(PDO::FETCH_OBJ);
// }


// comments

// public function fetchCommentsForPost($post_id) {
//     $comment = "
//         SELECT comments.*, users.full_name, users.profile
//         FROM comments
//         JOIN users ON comments.user_id = users.id
//         WHERE comments.post_id = :post_id
//         ORDER BY comments.created_at ASC
//     ";
//     $commentResponse = $this->db->prepare($comment);
//     $commentResponse->execute(array(':post_id' => $post_id));
//     return $commentResponse->fetchAll(PDO::FETCH_OBJ);
// }



// fetch few suggested suggested users excluding the logged-in user
// public function fetchFewSuggestedUsers($currentUserId) {
//      $suggested = "SELECT * FROM users a WHERE NOT EXISTS( SELECT 1 FROM follows fl WHERE fl.followed_id=a.id AND follower_id=:id  ) AND id!=:id ";
//     $res = $this->db->prepare($suggested);
//     $res->execute(array(":id"=>$currentUserId));
//     return $res->fetchAll(PDO::FETCH_OBJ);
}

// // select users
// public function getUserByUsername($username){
//     $selectUsername = $this->db->prepare("SELECT full_name, id, profile,username FROM users WHERE username = :username LIMIT 1");
//     $selectUsername->execute(array(":username" => $username));

//     $data=  $selectUsername->fetch(PDO::FETCH_OBJ);
//     return $data->id;
  
// }




// }

?>