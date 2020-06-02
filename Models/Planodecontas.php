<?php
class Planodecontas extends Model {

	public function getAllPlanodecontas(){
		$array = array();
        
        $sql = "SELECT * FROM planodecontas";
        $sql = $this->db->query($sql);

            if($sql->rowCount() > 0){
            	$array = $sql->fetchAll();
            }

		return $array;

	}

	public function add($planodeconta){
		$sql = "INSERT INTO planodecontas SET nome = :nome";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome', $planodeconta);
		$sql->execute();
	}

	public function get($id){
		$array = array();
		$sql = "SELECT * FROM planodecontas WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		    if($sql->rowCount() > 0){
               $array = $sql->fetch();
		    }
		return $array;
	}

	public function update($planodeconta, $id){
		$sql = "UPDATE planodecontas SET nome = :nome WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome', $planodeconta);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}
//VERIFICAR SE PRECISA MUDAR PRODUCTS POR PRODUTOS
	public function hasProducts($id){
		$sql = "SELECT COUNT(*) as c FROM produtos WHERE id_planodeconta = :id";
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
		$sql = "DELETE FROM planodecontas WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}

}