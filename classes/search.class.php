<?php 
    class search_user{
        
      protected $db;

    public function __construct() {
        require '../db/dbConfig.php';
        $database = new Database();
        $db = $database->dsn();
        $this->db = $db;
    }



public function searchUser($search) {
    $sql = $this->db->prepare(
        "SELECT * FROM users WHERE  full_name LIKE? OR username LIKE? OR contact LIKE?"
    );
   $search = '%'.$search.'%';
    $sql->execute(array($search,$search,$search));
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}




public function isFollowing( $user_id,$followed_id ){

 $sql = "SELECT * FROM follows WHERE follower_id = :user_id AND followed_id = :followed_id";
 $result = $this->db->prepare($sql);
 $result->execute(array(":user_id"=>$user_id, ":followed_id"=>$followed_id));

 if($result->rowCount()>0){
    return true;
 }else {
    return false;
 }

}
    }

?>