<?php
class Ordens extends Model {

    public function getInfo($id) {
    $array = array();

    $sql = "SELECT * FROM ordens WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":id", $id);
    $sql->execute();

    if($sql->rowCount() > 0) {
            $array = $sql->fetch();
    }

    return $array;
}


public function getAllOrdens() {
    $array = array();
    $cli = new Clientes();
 
    $sql = "SELECT * FROM ordens";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
        $array = $sql->fetchAll(\PDO::FETCH_ASSOC);

        foreach($array as $key => $item) {
            $cliInfo = $cli->get($item['id_cliente']);
       
            $array[$key]['nome_cliente'] = $cliInfo['nome'];
  
        }
    }
    return $array;
}

public function getAllOrdensNaoBaixados() {
    $array = array();
    $cli = new Clientes();
 
    $sql = "SELECT * FROM ordens WHERE status_orden = 0 ORDER BY data_execucao,hora_execucao ASC";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
        $array = $sql->fetchAll(\PDO::FETCH_ASSOC);

        foreach($array as $key => $item) {
            $cliInfo = $cli->get($item['id_cliente']);
       
            $array[$key]['nome_cliente'] = $cliInfo['nome'];
                 
        }
    }
    return $array;
}

public function getAllOrdensBaixados() {
    $array = array();
    $cli = new Clientes();
 
    $sql = "SELECT * FROM ordens WHERE status_orden = 1 ORDER BY data_fechamento,hora_fechamento ASC";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
        $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        
        foreach($array as $key => $item) {
            $cliInfo = $cli->get($item['id_cliente']);
       
            $array[$key]['nome_cliente'] = $cliInfo['nome'];
                 
        }
    }
    return $array;
}


public function get($id) {
    $array = array();

    $sql = "SELECT * FROM ordens WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();
    if($sql->rowCount() > 0) {
        $array = $sql->fetch(\PDO::FETCH_ASSOC);
        
}
    return $array;
}


public function addorden($id_cliente, $descricao, $data_execucao, $hora_execucao, $status_orden) {

    $sql = "INSERT INTO ordens (id_cliente, descricao, data_execucao, hora_execucao, status_orden) VALUES (:id_cliente, :descricao, :data_execucao, :hora_execucao, :status_orden)";
    $sql = $this->db->prepare($sql);
     $sql->bindValue(':id_cliente', $id_cliente);
     $sql->bindValue(':descricao', $descricao);
     $sql->bindValue(':data_execucao', $data_execucao);
     $sql->bindValue(':hora_execucao', $hora_execucao);
     $sql->bindValue(':status_orden', $status_orden);
    $sql->execute();

}

public function update($id_cliente, $descricao, $data_execucao, $hora_execucao, $status_orden, $id) {
    $sql = "UPDATE ordens SET id_cliente = :id_cliente, descricao = :descricao, data_execucao = :data_execucao, hora_execucao = :hora_execucao, status_orden = :status_orden WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':id_cliente', $id_cliente);
    $sql->bindValue(':descricao', $descricao);
    $sql->bindValue(':data_execucao', $data_execucao);
    $sql->bindValue(':hora_execucao', $hora_execucao);
    $sql->bindValue(':status_orden', $status_orden);
    $sql->bindValue(':id', $id);
    $sql->execute();
}

public function updatebaixar($id_cliente, $data_fechamento, $hora_fechamento, $valor, $informacao, $status_orden, $id) {
    $sql = "UPDATE ordens SET id_cliente = :id_cliente, data_fechamento = :data_fechamento, hora_fechamento = :hora_fechamento, valor = :valor, informacao = :informacao, status_orden = :status_orden WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':id_cliente', $id_cliente);
    $sql->bindValue(':data_fechamento', $data_fechamento);
    $sql->bindValue(':hora_fechamento', $hora_fechamento);
    $sql->bindValue(':valor', $valor);
    $sql->bindValue(':informacao', $informacao);
    $sql->bindValue(':status_orden', $status_orden);
    $sql->bindValue(':id', $id);
    $sql->execute();
}

}