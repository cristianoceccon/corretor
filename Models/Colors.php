<?php
class Colors extends Model{
	public function getList(){
		$array = array();
		$sql = "SELECT *, (select count(*) from products_colors where products_colors.id_color = cores.id) as b FROM cores";
		$sql = $this->db->query($sql);
		   if($sql->rowCount() > 0){
             $array = $sql->fetchAll();
		   }

		return $array;
	}

	public function hasPorducts($id){
		$sql = "SELECT COUNT(*) as c FROM products_colors WHERE id_color = :id";
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

	public function add($name, $cod_exa){
		if(!empty($name) && !empty($cod_exa)){
			$sql = "INSERT INTO cores SET name = :name, cod_exa = :cod";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':name', $name);
			$sql->bindValue(':cod', $cod_exa);
			$sql->execute();
		}
	}

	public function edit($id, $name, $cod_exa){
		if(!empty($name) && !empty($id) && !empty($cod_exa)){
			$sql = "UPDATE cores SET name = :name, cod_exa = :cod WHERE id = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':name', $name);
			$sql->bindValue(':cod', $cod_exa);
			$sql->bindValue(':id', $id);
			$sql->execute();
		}
	}

	public function get($id){
		if(!empty($id)){
			$sql = "SELECT * FROM cores WHERE id = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id', $id);
			$sql->execute();
			   if($sql->rowCount() > 0){
			   	 $data = $sql->fetch(\PDO::FETCH_ASSOC);
			   	 return $data;
			   } else {
			   	 return '';
			   }
		}
	}

	public function del($id){
		if(!empty($id)){
           if($this->hasPorducts($id) == false){
              $sql = "DELETE FROM cores WHERE id = :id";
              $sql = $this->db->prepare($sql);
              $sql->bindValue(':id', $id);
              $sql->execute();
           }
		}
	}
}