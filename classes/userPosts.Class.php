<?php
class PostData {
    protected $db;
    protected $posts;

    public function __construct($db) {
        $this->db = $db;
        $this->fetchAllPostsWithUserInfo();
    }

    // Fetch posts and user info
    protected function fetchAllPostsWithUserInfo() {
        $sql = "
            SELECT 
                posts.*, 
                users.username, 
                users.full_name, 
                users.profile
            FROM posts
            JOIN users ON posts.user_id = users.id
            ORDER BY posts.created_at DESC
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $this->posts = $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Getter for posts
    public function getPosts() {
        return $this->posts;
    }


// total posts 
    public function getPostById($id) {
        foreach ($this->posts as $post) {
            if ($post->id == $id) {
                return $post;
            }
        }
    }

    //User post count(uId = user_id)
    public function getUserPostsCount($uId) {
    $sql = $this->db->prepare("SELECT COUNT(*) AS total FROM posts WHERE user_id = :uid");
    $sql->execute([":uid" => $uId]);
    $row = $sql->fetch(PDO::FETCH_OBJ);
    return $row ? $row->total : 0;
}


    public function countPosts(){
       return count($this->posts);
    }
   
 
public function getUserPosts($uId) {
    $sql = $this->db->prepare("
        SELECT 
            posts.*, 
            users.username, 
            users.full_name, 
            users.profile
             
        FROM posts
        JOIN users ON posts.user_id = users.id
        WHERE posts.user_id = :uid
        ORDER BY posts.created_at DESC
    ");
    $sql->execute([":uid" => $uId]);
    return $sql->fetchAll(PDO::FETCH_OBJ);



   
}


}
?>
