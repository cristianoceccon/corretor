<?php
class Permission extends Model {

    public function getPermissionGroupName($id_permission){
        $sql = "SELECT name FROM permission_groups WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id_permission);
        $sql->execute();
           if($sql->rowCount() > 0){
             $data = $sql->fetch();
             return $data['name'];
           } else {
              return '';
           }
    }

    public function editName($id, $name){
        $sql = "UPDATE permission_groups SET name = :name WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':name', $name);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    public function clearLinks($id){
        $sql = "DELETE FROM permission_links WHERE id_permission_group = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

	public function getPermission($id_permission) {
        $array = array();

		$sql = "SELECT id_permission_item FROM permission_links WHERE id_permission_group = :id_permission";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_permission', $id_permission);
		$sql->execute();
            if($sql->rowCount() > 0){
            	$data = $sql->fetchAll();
            	$ids = array();

            	foreach($data as $data_item){
            	   $ids[] = $data_item['id_permission_item'];
            	}

            	$sql = "SELECT slug FROM permission_items WHERE id IN (".implode(',', $ids).")";
            	$sql = $this->db->query($sql);
            	   if($sql->rowCount() > 0) {
            	   	$data = $sql->fetchAll();
            	   	  foreach($data as $data_item){
            	   	  	$array[] = $data_item['slug'];
            	   	  }

            	   }
            }

        return $array;
	}

    public function getAllGroups(){
        $array = array();
        $sql = "SELECT permission_groups.*, (select count(users.id) from users where users.id_permission = permission_groups.id) as total_users FROM permission_groups";
        $sql = $this->db->query($sql);
          if($sql->rowCount() > 0){
            $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
          }
        return $array;
    }

    public function deleteGroup($id_group){
        $sql = "SELECT id FROM users WHERE id_permission = :id_group";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_group', $id_group);
        $sql->execute();

          if($sql->rowCount() === 0){

            $sql = "DELETE FROM permission_links WHERE id_permission_group = :id_group";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id_group', $id_group);
            $sql->execute();

            $sql = "DELETE FROM permission_groups WHERE id = :id_group";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id_group', $id_group);
            $sql->execute();

          }
    }

    public function getAllItems(){
        $array = array();

        $sql = "SELECT * FROM permission_items";
        $sql = $this->db->query($sql);

          if($sql->rowCount() > 0){
            $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
          }

        return $array;
    }

    public function getPermissionItem(int $id){
        $data = array();
        $sql = "SELECT * FROM permission_items WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

          if($sql->rowCount() > 0){
            $data = $sql->fetch(\PDO::FETCH_ASSOC);
          } 
        return $data;
    }

    public function addGroup($name){
        $sql = "INSERT INTO permission_groups SET name = :name";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':name', $name);
        $sql->execute();

        return $this->db->lastInsertId();
    }

    public function linkItemToGroup($id_item, $id_group){
        $sql = "INSERT INTO permission_links SET id_permission_group = :id_group, id_permission_item = :id_item";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_group', $id_group);
        $sql->bindValue(':id_item', $id_item);
        $sql->execute();
    }

    public function addItemName(string $item_name, int $id_items_group){
        $sql = "INSERT INTO permission_items SET name = :name,  slug = :slug, id_items_group = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':name', $item_name);
        $sql->bindValue(':slug', '');
        $sql->bindValue(':id', $id_items_group);
        $sql->execute();
    }

    public function editItemName(string $item_name, int $id, int $id_items_group){
       $sql = "UPDATE permission_items SET name = :name, id_items_group = :id_items_group WHERE id = :id_item";
       $sql = $this->db->prepare($sql);
       $sql->bindValue(':name', $item_name);
       $sql->bindValue(':id_items_group', $id_items_group);
       $sql->bindValue(':id_item', $id);
       $sql->execute();
    }

    public function deleteItems(int $id){
        $sql = "DELETE FROM permission_items WHERE id = :id_item";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_item', $id);
        $sql->execute();

        $sql = "DELETE FROM permission_links WHERE id_permission_item = :id_item";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_item', $id);
        $sql->execute();
    }

}