<?php
class Vendas extends Model {


    public function getAllVendas() {
    $array = array();

    $sql = $this->db->query("
        SELECT 
            vendas.id,
            vendas.data_venda
            vendas.preco_total
            vendas.status,
            clientes.nome
        FROM vendas
        LEFT JOIN clientes ON clientes.id = vendas.id_cliente");
    $sql->bindValue(":id", $id);
    $sql->execute();
    if($sql->rowCount() > 0) {
        $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        
}
    return $array;
}

public function get($id) {
    $array = array();

    $sql = "SELECT * FROM vendas WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();
    if($sql->rowCount() > 0) {
        $array = $sql->fetch(\PDO::FETCH_ASSOC);
        
}
    return $array;
}


public function addvendas($cliente, $produto, $quantidade, $valorunit, $valortotal) {

        $valortotal = $quantidade * $valorunit;
    
    

    $sql = "INSERT INTO vendas (cliente, produto, quantidade, valorunit, valortotal) VALUES (:cliente, :produto, :quantidade, :valorunit, :valortotal)";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':cliente', $cliente);
    $sql->bindValue(':produto', $produto);
    $sql->bindValue(':quantidade', $quantidade);
    $sql->bindValue(':valorunit', $valorunit);
    $sql->bindValue(':valortotal', $valortotal);
    $sql->execute();

}

public function update($cliente, $id, $valorunit, $custo) {
    $sql = "UPDATE vendas SET cliente = :cliente, valorunit = :valorunit, custo = :custo WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':cliente', $cliente);
    $sql->bindValue(':id', $id);
    $sql->bindValue(':valorunit', $valorunit);
    $sql->bindValue(':custo', $custo);
    $sql->execute();
}

}