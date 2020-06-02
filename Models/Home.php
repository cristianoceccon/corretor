<?php
class Home extends Model {
    public function list()
    {   
    $produtosPedidos = new ProdutosPedidos();
    $user = new Clientes();
    $array = [];
    $sql = "SELECT * FROM pedidos";
    $sql = $this->db->query($sql);
    if($sql->rowCount() > 0)
    {
        $array = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($array as $key => $item)
        {   
            $array[$key]['cliente'] = $user->get($item['user_id']);
            $array[$key]['produtos'] = $produtosPedidos->getByIdPedido($item['id']);
        }
    }
    return $array;
}

public function get(int $id)
{
    $produtosPedidos = new ProdutosPedidos();
    $cliente = new Clientes();
    $pedido = [];
    $sql = "SELECT * FROM pedidos WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();
    if($sql->rowCount() > 0)
    {
        $pedido = $sql->fetch(PDO::FETCH_ASSOC);
        $pedido['produtos'] = $produtosPedidos->getByIdPedido($pedido['id']);
        $pedido['user'] = $cliente->get($pedido['user_id']);          
    }
    return $pedido;
}

}