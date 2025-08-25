<?php
class CommentData {
    protected $db;
    protected $comments;

    public function __construct($db) {
        $this->db = $db;
    }

    // Fetch all comments for a given post
    public function fetchCommentsForPost($post_id) {
        $sql = "
            SELECT comments.*, users.full_name, users.profile
            FROM comments
            JOIN users ON comments.user_id = users.id
            WHERE comments.post_id = :post_id
            ORDER BY comments.created_at ASC
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':post_id' => $post_id]);
        $this->comments = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $this->comments;

        // loop the data and get all the info needed
    }


    // fetch one comment with limit(ask boss to guide you on merging with the one above)
        public function fetchLastCommentPost($post_id) {
        $sql = "
            SELECT comments.*, users.full_name, users.profile
            FROM comments
            JOIN users ON comments.user_id = users.id
            WHERE comments.post_id = :post_id
            ORDER BY comments.created_at DESC
            LIMIT 1
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array(':post_id' => $post_id));
        return $stmt->fetch(PDO::FETCH_OBJ);
    }



    // fetch the total comments
    public function getTotalComments($post_id){

        $sql = $this->db->prepare("SELECT COUNT(*) as total FROM comments WHERE post_id = :post_id");

        $sql->execute(array(":post_id"=>$post_id));
        $queryRes = $sql->fetch(PDO::FETCH_OBJ)->total;

      return $queryRes; 

    }


    public function countLike($post_id){
      // Count total likes 
    $countStmt = $this->db->prepare("SELECT COUNT(*) as total FROM likes WHERE post_id = :post_id");
    $countStmt->execute([':post_id' =>$post_id]);
    $count = $countStmt->fetch(PDO::FETCH_OBJ)->total;
  
    echo  $count;

}





public function isPostLiked($post_id,$user_id){
$countStmt = $this->db->prepare("SELECT * FROM likes WHERE post_id = :post_id AND user_id = :user_id");
    $countStmt->execute([':post_id' =>$post_id, ':user_id'=>$user_id]);
    if($countStmt->rowCount()>0){
        return true;
    }else{
        return false;
    }
}

}
?>
