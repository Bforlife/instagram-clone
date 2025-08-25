<?php

class SuggestedUsers_Class{

    protected $db;
    protected $suggestedUsers;


    public function __construct($db,$currentUserId){

        $this->db =$db;
       $this->suggestedUsers = $this->fetchSuggestedUsers($currentUserId);
        
    }

    //fetch  suggested users excluding the logged-in user
    public function fetchSuggestedUsers($currentUserId) {
     $suggested = "SELECT * FROM users ac WHERE NOT EXISTS( SELECT * FROM follows fl WHERE fl.followed_id=ac.id AND follower_id=:id  ) AND id!=:id ";
    $res = $this->db->prepare($suggested);
    $res->execute(array(":id"=>$currentUserId));
    return $res->fetchAll(PDO::FETCH_OBJ);



}

public function getSuggestedUsers(){
    return $this->suggestedUsers;

}
}

?>