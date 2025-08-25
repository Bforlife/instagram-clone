<?php
class Database{


    public function dsn(){
        $pdo = new pdo ('mysql:host=localhost;dbname=nimsta','root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
        
        
    }
    
    }

?>
