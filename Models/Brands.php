<?php
class Brands extends Model {

	public function getAllMarcas(){
		$array = array();
        
        $sql = "SELECT *, (select count(*) from products where products.id_brand = brands.id) as b FROM brands";
        $sql = $this->db->query($sql);

            if($sql->rowCount() > 0){
            	$array = $sql->fetchAll();
            }

		return $array;

	}

	public function add($brand){
		$sql = "INSERT INTO brands SET name = :name";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':name', $brand);
		$sql->execute();
	}

	public function get($id){
		$array = array();
		$sql = "SELECT * FROM brands WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		    if($sql->rowCount() > 0){
               $array = $sql->fetch();
		    }
		return $array;
	}

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

}