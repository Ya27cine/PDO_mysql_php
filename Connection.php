<?php

class Connection{

    private $host, $username, $password;
    protected $link;
    
    public function __construct($h, $u, $p){
    
        $this->host = $h;
        $this->username = $u;
        $this->password = $p;
    }
    
    public function connect(){
        try {
            $this->link = new PDO(  $this->host,  $this->username,   $this->password);
            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo " vous etes connecte";
        } catch (\Throwable $th) {
                    echo $th;
        }
    }

    
    public function getPost(): array{

        $getData = $this->link->prepare("SELECT * FROM post ORDER BY id ASC");
        $getData->execute();
        $data = $getData->fetchAll();

        return $data;
    }

    public function insertPost( Post $p): bool{

        $_sql = "INSERT INTO post (`title`, `content`, `pub`, `author`) 
                                                VALUES
                                  ('[$p->title]','[$p->content]','[$p->pub]','[$p->author]') ";

        return ($this->link->query( $_sql ))? true : false;
    }

}
?>
