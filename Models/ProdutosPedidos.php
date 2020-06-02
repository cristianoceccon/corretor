<?php 

class ProdutosPedidos extends Model {

    public function create(array $data)
    {   
    
        $sql = "INSERT INTO produtos_pedidos SET pedido_id = :pedido_id, produto_id = :produto_id, qtd = :qtd, valor = :valor";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':pedido_id', $data['pedido_id']);
        $sql->bindValue(':produto_id', $data['id']);
        $sql->bindValue(':qtd', $data['qtd']);
        $sql->bindValue(':valor', str_replace(',', '.', $data['valor']));
        $sql->execute();
        return true;
    }

    public function getByIdPedido($id)
    {   
        $produtos = new Produtos();
        $data = [];
        $sql = "SELECT * FROM produtos_pedidos WHERE pedido_id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            $data = $sql->fetchAll(\PDO::FETCH_ASSOC);
            foreach($data as $key => $item)
            {
                $produto = $produtos->get($item['produto_id']);
                $data[$key]['nome_produto'] = $produto['nome'];
            }

        }
        return $data;
    }

}