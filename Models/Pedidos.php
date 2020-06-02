<?php
class Pedidos extends Model {

    public function create(array $data)
    {   
        $sql = "INSERT INTO pedidos SET user_id = :user_id, valor_total = :valor_total, venc_parc = :venc, 
        forma_pagamento_id = :forma_pagamento_id, plano_id = :plano_id, qtd_parc = :qtd_parc, 
        tipo_pagamento_id = :tipo_pagamento_id, valor_entrada = :valor_entrada, valor_parcela = :valor_parcela";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':user_id', intval($data['cliente_id']), PDO::PARAM_INT);
        $sql->bindValue(':valor_total', $data['valor_total']);
        $sql->bindValue(':venc', $data['date_venc']);
        $sql->bindValue(':forma_pagamento_id', intval($data['forma_pagamento_id']), PDO::PARAM_INT);
        $sql->bindValue(':plano_id', intval($data['plano_id']), PDO::PARAM_INT);
        $sql->bindValue(':qtd_parc', intval($data['qtd_parc']), PDO::PARAM_INT);
        $sql->bindValue(':tipo_pagamento_id', intval($data['tipo_pagamento_id']), PDO::PARAM_INT);
        $sql->bindValue(':valor_entrada', $data['valor_entrada'], PDO::PARAM_STR);
        $sql->bindValue(':valor_parcela', $data['valor_parcela'], PDO::PARAM_STR);
        $sql->execute();
        return $this->db->lastInsertId();
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

    public function lastId()
    {
        $sql = $this->db->query("SELECT MAX(id) as id FROM pedidos WHERE ativo = 1");
        $sql = $sql->fetch();
        return $sql['id'] + 1;
    }

    public function editstatuspedido($id_status_pedido, $id) {
        $sql = "UPDATE pedidos SET id_status_pedido = :id_status_pedido WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_status_pedido', $id_status_pedido);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

	public function del($id){
		$sql = "DELETE FROM pedidos WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();
    }
    
    public function finalizar($id){
        
		$sql = "UPDATE pedidos SET id_status_pedido = 1 WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();
    }
    
    public function cancelar($id){
		$sql = "UPDATE pedidos SET id_status_pedido = 2 WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}

}