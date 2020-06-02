<?php
class fluxo extends Model {

	public function getAll(){
		$array = array();
        
        $sql = "SELECT datalancamento, descricao, valorentrada, valorsaida, saldo FROM fluxo";
        $sql = $this->db->query($sql);
            if($sql->rowCount() > 0){
            	$array = $sql->fetchAll(\PDO::FETCH_ASSOC);
			}


		return $array;
	}


	public function addfluxo($descricao, $valorentrada, $saldo) {
		
		$sql = "INSERT INTO fluxo (descricao, valorentrada, saldo) VALUES (:descricao, :valorentrada, :saldo)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':descricao', $descricao);
		$sql->bindValue(':valorentrada', $valorentrada);
		$sql->bindValue(':saldo', $saldo+$valorentrada);
		$sql->execute();
	
	}

	public function delfluxo($descricao, $valorsaida, $saldo) {
		$sql = "INSERT INTO fluxo (descricao, valorsaida, saldo) VALUES (:descricao, :valorsaida, :saldo)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':descricao', $descricao);
		$sql->bindValue(':valorsaida', $valorsaida);
		$sql->bindValue(':saldo', $saldo-$valorsaida);
		$sql->execute();

	}

}



	
	/*

	public function update($brand, $id){
		$sql = "UPDATE brands SET name = :name WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':name', $brand);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}

	public function hasProducts($id){
		$sql = "SELECT COUNT(*) as c FROM products WHERE id_brand = :id";
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
		$sql = "DELETE FROM brands WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}
*/

