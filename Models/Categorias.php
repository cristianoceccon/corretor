<?php
class Categorias extends Model {

	public function getAllCategorias(){
		$array = array();
        
        $sql = "SELECT * FROM categorias";
        $sql = $this->db->query($sql);

            if($sql->rowCount() > 0){
            	$array = $sql->fetchAll();
            }

		return $array;

	}

	public function add($categoria){
		$sql = "INSERT INTO categorias SET nome = :nome";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome', $categoria);
		$sql->execute();
	}

	public function get($id){
		$array = array();
		$sql = "SELECT * FROM categorias WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		    if($sql->rowCount() > 0){
               $array = $sql->fetch();
		    }
		return $array;
	}

	public function update($categoria, $id){
		$sql = "UPDATE categorias SET nome = :nome WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome', $categoria);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}
//VERIFICAR SE PRECISA MUDAR PRODUCTS POR PRODUTOS
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
		$sql = "DELETE FROM categorias WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}

}