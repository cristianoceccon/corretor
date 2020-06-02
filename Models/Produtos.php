<?php
class Produtos extends Model {

    public function getInfo($id) {
    $array = array();

    $sql = "SELECT * FROM produtos WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":id", $id);
    $sql->execute();

    if($sql->rowCount() > 0) {
        $array = $sql->fetch();
    }

    return $array;
}


public function getAllProdutos() {
    $array = array();
    $cat = new Categorias();

    $sql = "SELECT * FROM produtos";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
        $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        
        foreach($array as $key => $item) {
            $catInfo = $cat->get($item['id_categoria']);
            $array[$key]['nome_categoria'] = $catInfo['nome'];
        }
}
    return $array;
}

public function get($id) {
    $array = array();

    $sql = "SELECT * FROM produtos WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();
    if($sql->rowCount() > 0) {
        $array = $sql->fetch(\PDO::FETCH_ASSOC);
        
}
    return $array;
}


public function addproduto($nome, $descricao, $custo, $venda, $id_categoria) {

    $sql = "INSERT INTO produtos (nome, descricao, custo, venda, id_categoria) VALUES (:nome, :descricao, :custo, :venda, :id_categoria)";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':descricao', $descricao);
    $sql->bindValue(':custo', $custo);
    $sql->bindValue(':venda', $venda);
    $sql->bindValue(':id_categoria', $id_categoria);
    $sql->execute();

}

public function update($nome, $descricao, $id, $venda, $custo, $id_categoria) {
    $sql = "UPDATE produtos SET nome = :nome, descricao = :descricao, venda = :venda, custo = :custo, id_categoria = :id_categoria WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':descricao', $descricao);
    $sql->bindValue(':id', $id);
    $sql->bindValue(':venda', $venda);
    $sql->bindValue(':custo', $custo);
    $sql->bindValue(':id_categoria', $id_categoria);
    $sql->execute();
}

public function hasProducts($id){
    $sql = "SELECT COUNT(*) as c FROM produtos WHERE id_categoria = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();
    $data = $sql->fetch();
        if($data['c'] > 0){
          return true;
        } else {
          return false;
        }
}

public function del($id){
    $sql = "DELETE FROM produtos WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();
}

}