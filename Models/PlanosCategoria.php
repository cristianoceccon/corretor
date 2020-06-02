<?php
class PlanosCategoria extends Model {

    public function getInfo($id) {
    $array = array();

    $sql = "SELECT * FROM planoscategoria WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":id", $id);
    $sql->execute();

    if($sql->rowCount() > 0) {
            $array = $sql->fetch();
    }

    return $array;
}


public function getAllPlanosCategoria() {
    $array = array();
    $planoscategoria = new PlanosCategoria();

    $sql = "SELECT * FROM planoscategoria";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
        $array = $sql->fetchAll(\PDO::FETCH_ASSOC);

      
}
    return $array;
}

public function get($id) {
    $array = array();

    $sql = "SELECT * FROM planoscategoria WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();
    if($sql->rowCount() > 0) {
        $array = $sql->fetch(\PDO::FETCH_ASSOC);
        
}
    return $array;
}


public function addplanocategoria($nome) {

    $sql = "INSERT INTO planoscategoria (nome) VALUES (:nome)";
    $sql = $this->db->prepare($sql);
     $sql->bindValue(':nome', $nome);
    $sql->execute();

}

public function update($nome, $id) {
    $sql = "UPDATE planoscategoria SET nome = :nome WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':id', $id);
    $sql->execute();
}

}