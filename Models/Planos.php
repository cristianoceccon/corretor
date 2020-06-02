<?php
class Planos extends Model {

    public function getInfo($id) {
    $array = array();

    $sql = "SELECT * FROM planos WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":id", $id);
    $sql->execute();

    if($sql->rowCount() > 0) {
            $array = $sql->fetch();
    }

    return $array;
}


public function getAllPlanos() {
    $array = array();
    $placategorias = new PlanosCategoria();
    $plagrupoprincipal = new PlanosGrupoPrincipal();
    $plagruposecundario = new PlanosGrupoSecundario();

    $sql = "SELECT * FROM planos";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
        $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        
        foreach($array as $key => $item) {
            $placategoriasInfo = $placategorias->get($item['id_categoria']);
            $plagrupoprincipalInfo = $plagrupoprincipal->get($item['id_grupo_principal']);
            $plagruposecundarioInfo = $plagruposecundario->get($item['id_grupo_secundario']);


            $array[$key]['nome_categoria'] = $placategoriasInfo['nome'];
            $array[$key]['nome_grupo_principal'] = $plagrupoprincipalInfo['nome'];
            $array[$key]['nome_grupo_secundario'] = $plagruposecundarioInfo['nome'];
        }
}
    return $array;
}

public function get($id) {
    $array = array();

    $sql = "SELECT * FROM planos WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();
    if($sql->rowCount() > 0) {
        $array = $sql->fetch(\PDO::FETCH_ASSOC);
        
}
    return $array;
}


public function addplano($nome, $id_categoria, $id_grupo_principal, $id_grupo_secundario) {

    $sql = "INSERT INTO planos (nome, id_categoria, id_grupo_principal, id_grupo_secundario) VALUES (:nome, :id_categoria, :id_grupo_principal, :id_grupo_secundario)";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':id_categoria', $id_categoria);
    $sql->bindValue(':id_grupo_principal', $id_grupo_principal);
    $sql->bindValue(':id_grupo_secundario', $id_grupo_secundario);
    $sql->execute();

}

public function update($nome, $id, $id_categoria, $id_grupo_principal, $id_grupo_secundario) {
    $sql = "UPDATE planos SET nome = :nome, id_categoria = :id_categoria, id_grupo_principal = :id_grupo_principal, id_grupo_secundario = :id_grupo_secundario WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':id', $id);
    $sql->bindValue(':id_categoria', $id_categoria);
    $sql->bindValue(':id_grupo_principal', $id_grupo_principal);
    $sql->bindValue(':id_grupo_secundario', $id_grupo_secundario);
    $sql->execute();
}

public function del($id){
    $sql = "DELETE FROM planos WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();
}

}