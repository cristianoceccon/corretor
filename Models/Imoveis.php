<?php
class Imoveis extends Model {

    public function getInfo($id) {
    $array = array();

    $sql = "SELECT * FROM imoveis WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":id", $id);
    $sql->execute();

    if($sql->rowCount() > 0) {
        $array = $sql->fetch();
    }

    return $array;
}


public function getAllImoveis() {
    $array = array();
    $cat = new Categorias();
    $user = new Clientes();

    $sql = "SELECT * FROM imoveis ORDER BY id DESC";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
        $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        
        foreach($array as $key => $item) {
            $catInfo = $cat->get($item['id_categoria']);
            $array[$key]['nome_categoria'] = $catInfo['nome'];
            $array[$key]['cliente'] = $user->get($item['id_cliente']);
            
        }
}
    return $array;
}

public function get(int $id)
{
    $cliente = new Clientes();
    $categoria = new Categorias();
    $sql = "SELECT * FROM imoveis WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();
    if($sql->rowCount() > 0)
    {
        $pedido = $sql->fetch(PDO::FETCH_ASSOC);
        $pedido['user'] = $cliente->get($pedido['id_cliente']);      
        $pedido['categoria'] = $cliente->get($pedido['id_categoria']);       
    }
    return $pedido;
}

public function addimoveis($id_cliente, $matricula, $id_categoria, $descricao, $exclusividade, $valor, $porcentagem, $data_inicial, $data_final) {

    $sql = "INSERT INTO imoveis (id_cliente, matricula, id_categoria, descricao, exclusividade, valor, porcentagem, data_inicial, data_final) VALUES (:id_cliente, :matricula, :id_categoria, :descricao, :exclusividade, :valor, :porcentagem, :data_inicial, :data_final)";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':id_cliente', $id_cliente);
    $sql->bindValue(':matricula', $matricula);
    $sql->bindValue(':id_categoria', $id_categoria);
    $sql->bindValue(':descricao', $descricao);
    $sql->bindValue(':exclusividade', $exclusividade);
    $sql->bindValue(':valor', $valor);
    $sql->bindValue(':porcentagem', $porcentagem);
    $sql->bindValue(':data_inicial', $data_inicial);
    $sql->bindValue(':data_final', $data_final);
    $sql->execute();

}

public function update($id, $id_cliente, $matricula, $id_categoria, $descricao, $exclusividade, $valor, $porcentagem, $data_inicial, $data_final) {
    $sql = "UPDATE imoveis SET id_cliente = :id_cliente, matricula = :matricula, id_categoria = :id_categoria, descricao = :descricao, exclusividade = :exclusividade, valor = :valor, porcentagem = :porcentagem, data_inicial = :data_inicial, data_final = :data_final WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->bindValue(':id_cliente', $id_cliente);
    $sql->bindValue(':matricula', $matricula);
    $sql->bindValue(':id_categoria', $id_categoria);
    $sql->bindValue(':descricao', $descricao);
    $sql->bindValue(':exclusividade', $exclusividade);
    $sql->bindValue(':valor', $valor);
    $sql->bindValue(':porcentagem', $porcentagem);
    $sql->bindValue(':data_inicial', $data_inicial);
    $sql->bindValue(':data_final', $data_final);
    $sql->execute();
}

public function list()
{   
    $user = new Clientes();
    $array = [];
    $sql = "SELECT * FROM imoveis";
    $sql = $this->db->query($sql);
    if($sql->rowCount() > 0)
    {
        $array = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($array as $key => $item)
        {   
            $array[$key]['cliente'] = $user->get($item['id_cliente']);
        }
    }
    return $array;
}



public function del($id){
    $sql = "DELETE FROM imoveis WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();
}

public function publicar($id){
    $sql = "UPDATE imoveis SET publicado = 1 WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();
}

}