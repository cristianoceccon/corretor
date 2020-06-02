<?php 
class Tokenusers extends model {

    public function insertTokenUser($id_user, $token){
        $sql = "INSERT INTO token_users SET id_user = :id_user, token = :token";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_user', $id_user);
        $sql->bindValue(':token', $token);
        $sql->execute();
    }

    public function verifyToken($token){
        $array = array();
        $sql = "SELECT * FROM token_users WHERE token = :token AND used = 0";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':token', $token);
        $sql->execute();

            if($sql->rowCount() > 0){
               $array = $sql->fetch();
            }

        return $array;
    }

    public function updateToken($token){
        $sql = "UPDATE token_users SET used = 1 WHERE token = :token";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':token', $token);
        $sql->execute();
    }
}