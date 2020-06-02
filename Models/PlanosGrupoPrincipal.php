<?php
class PlanosGrupoPrincipal extends Model {

    public function getInfo($id) {
    $array = array();

    $sql = "SELECT * FROM planosgrupoprincipal WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":id", $id);
    $sql->execute();

    if($sql->rowCount() > 0) {
            $array = $sql->fetch();
    }

    return $array;
}


public function getAllPlanosGrupoPrincipal() {
    $array = array();
    $sql = "SELECT * FROM planosgrupoprincipal";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
        $array = $sql->fetchAll(\PDO::FETCH_ASSOC);

}
    return $array;
}

public function get($id) {
    $array = array();

    $sql = "SELECT * FROM planosgrupoprincipal WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();
    if($sql->rowCount() > 0) {
        $array = $sql->fetch(\PDO::FETCH_ASSOC);
        
}
    return $array;
}


public function addplanogrupoprincipal($nome) {

    $sql = "INSERT INTO planosgrupoprincipal (nome) VALUES (:nome)";
    $sql = $this->db->prepare($sql);
     $sql->bindValue(':nome', $nome);
    $sql->execute();

}

public function update($nome, $id) {
    $sql = "UPDATE planosgrupoprincipal SET nome = :nome WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':id', $id);
    $sql->execute();
}

}