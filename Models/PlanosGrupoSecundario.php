<?php
class PlanosGrupoSecundario extends Model {

    public function getInfo($id) {
    $array = array();

    $sql = "SELECT * FROM planosgruposecundario WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":id", $id);
    $sql->execute();

    if($sql->rowCount() > 0) {
            $array = $sql->fetch();
    }

    return $array;
}


public function getAllPlanosGrupoSecundario() {
    $array = array();
    $sql = "SELECT * FROM planosgruposecundario";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
        $array = $sql->fetchAll(\PDO::FETCH_ASSOC);

}
    return $array;
}

public function get($id) {
    $array = array();

    $sql = "SELECT * FROM planosgruposecundario WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();
    if($sql->rowCount() > 0) {
        $array = $sql->fetch(\PDO::FETCH_ASSOC);
        
}
    return $array;
}


public function addplanogruposecundario($nome) {

    $sql = "INSERT INTO planosgruposecundario (nome) VALUES (:nome)";
    $sql = $this->db->prepare($sql);
     $sql->bindValue(':nome', $nome);
    $sql->execute();

}

public function update($nome, $id) {
    $sql = "UPDATE planosgruposecundario SET nome = :nome WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':id', $id);
    $sql->execute();
}

}