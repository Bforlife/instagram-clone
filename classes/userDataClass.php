<?php 
class userData{
protected $db;
protected $id;
protected $username;
protected $email;
protected $profile_img;
protected $fullname;

protected $totalFollowers;
protected $totalFollowing;


 public function  __construct($id, $db)
 {
    $this->id=$id;
    $this->db=$db;
    $this->getUserData();

 }

 // get user info

 public function getUserData(){
    $sql = $this->db->prepare("SELECT * FROM  users WHERE id=:id");
    $sql->execute(array(":id"=>$this->id));
    if($sql->rowCount()>0){
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        $this->username = $row['username'];
        $this->profile_img = $row['profile'];
        $this->fullname=$row['full_name'];

    }else{
        return "No record found";
    }
 }



 public function getTotalFollowers() {
    $sql = $this->db->prepare("SELECT COUNT(*) AS total FROM follows WHERE followed_id = :id");
    $sql->execute([":id" => $this->id]);
    $row = $sql->fetch(PDO::FETCH_OBJ);
    return $row ? $row->total : 0;
}

public function getTotalFollowing() {
    $sql = $this->db->prepare("SELECT COUNT(*) AS total FROM follows WHERE follower_id = :id");
    $sql->execute([":id" => $this->id]);
    $row = $sql->fetch(PDO::FETCH_OBJ);
    return $row ? $row->total : 0;
}


public function fetchSearchedUser($username){
    $sql = $this->db->prepare("SELECT * FROM users WHERE username=:username");
    $sql->execute([':username'=>$username]);
    $result = $sql->fetch(PDO::FETCH_OBJ);
    return $result->id;
}





 public function getUserId(){
    return $this->id;
}

 public function getUsername(){
    return $this->username;
 }

 public function getProfileImg(){
    return $this->profile_img;
 }

public function getFullname(){
    return $this->fullname;
}







}

?>