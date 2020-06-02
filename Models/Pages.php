<?php
class Pages extends Model {

	public function getAll(){
		$array = array();
        
        $sql = "SELECT id, title FROM pages";
        $sql = $this->db->query($sql);

          if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
          }

            
           
		return $array;
    }
    
    public function verifyTitle($title){
        $sql = "SELECT * FROM pages WHERE title = :title";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':title', $title);
        $sql->execute();
            if($sql->rowCount() > 0){
                return true;
            } else {
                return false;
            }
    }

    public function add($title, $body){
        $body = str_replace("../../../", "".BASE_URL_SITE."", $body);
        $sql = "INSERT INTO pages SET title = :title, body = :body";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':title', $title);
        $sql->bindValue(':body', $body);
        $sql->execute();
    }

    public function del($id){
        $sql = "DELETE FROM pages WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    public function get($id){
        $array = array();

        $sql = "SELECT * FROM pages WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

            if($sql->rowCount() > 0){
               $array = $sql->fetch();
            }

        return $array;
    }

    public function edit($title, $body, $id){
        $sql = "UPDATE pages SET title = :title, body = :body WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':title', $title);
        $sql->bindValue(':body', $body);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}