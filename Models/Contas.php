<?php
class Contas extends Model {

	public function getAllContas(){
		$array = array();
        
        $sql = "SELECT * FROM contas";
        $sql = $this->db->query($sql);

            if($sql->rowCount() > 0){
            	$array = $sql->fetchAll();
            }

		return $array;

	}

	public function addconta($banco, $agencia, $operacao, $numero, $status_conta){
		$sql = "INSERT INTO contas SET banco = :banco, agencia = :agencia, operacao = :operacao, numero = :numero, status_conta = :status_conta";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':banco', $banco);
		$sql->bindValue(':agencia', $agencia);
		$sql->bindValue(':operacao', $operacao);
		$sql->bindValue(':numero', $numero);
		$sql->bindValue(':status_conta', $status_conta);
		$sql->execute();
	}

	public function get($id){
		$array = array();
		$sql = "SELECT * FROM contas WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		    if($sql->rowCount() > 0){
               $array = $sql->fetch();
		    }
		return $array;
	}

	public function update($banco, $agencia, $operacao, $numero, $status_conta, $id){
		$sql = "UPDATE contas SET banco = :banco, agencia = :agencia, operacao = :operacao, numero = :numero, status_conta = :status_conta WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':banco', $banco);
		$sql->bindValue(':agencia', $agencia);
		$sql->bindValue(':operacao', $operacao);
		$sql->bindValue(':numero', $numero);
		$sql->bindValue(':status_conta', $status_conta);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}
//VERIFICAR SE PRECISA MUDAR PRODUCTS POR PRODUTOS
	public function hasProducts($id){
		$sql = "SELECT COUNT(*) as c FROM produtos WHERE id_conta = :id";
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
		$sql = "DELETE FROM contas WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}

}