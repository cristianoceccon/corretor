<?php
class Categories extends Model {

	public function getAllCategories(){
		$array = array();
        
		$sql = "SELECT *, (select count(*) from products where products.id_category = categories.id) as p FROM categories ORDER BY sub DESC";
		$sql = $this->db->query($sql);

		    if($sql->rowCount() > 0){
                $data = $sql->fetchAll();

                
                foreach($data as $item){
                 	$item['subs'] = array();
                    $item['tem_p'] = "";
                    $item['tem_p'] = $this->tem_product($item['id']);
                 	$array[$item['id']] = $item;
                    
                }
                

                while ( $this->stillNeed($array)) {
                 	$this->organizeCategory($array);
                }             
            }

            
           
		return $array;
	}

    
    
    private function tem_product($id){
        $cats = $this->scanCategory($id);
            if($this->hasProducts($cats) == true){
                return  "TEM";
            }
    }

    private function organizeCategory(&$array){
    	foreach($array as $id => $item){
    		if(!empty($item['sub'])){
                
    			$array[$item['sub']]['subs'][$item['id']] = $item;
    			unset($array[$id]);
    			break;
    		}

    	}

    }

	private function stillNeed($array){
        foreach($array as $item){
		    if(!empty($item['sub'])){
			  return true;
		    }
		}

		return false;
	}

    public function addCategorie($name_cat, $id_sub){

        $sql = "INSERT INTO categories SET sub = :sub, name = :name";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':sub', $id_sub);
        $sql->bindValue(':name', $name_cat);
        $sql->execute();

    }

    public function get($id){
        $array = array();

        $sql = "SELECT * FROM categories WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

            if($sql->rowCount() > 0){
              $array = $sql->fetch(\PDO::FETCH_ASSOC);
            } 

        return $array;
           
    }

    public function update($name_cat, $id_sub, $id){

        $sql = "UPDATE categories SET sub = :sub, name = :name WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':sub', $id_sub);
        $sql->bindValue(':name', $name_cat);
        $sql->bindValue(':id', $id);
        $sql->execute();

    }

    public function scanCategory($id, $cats = array()){
        if(!in_array($id, $cats)){
           $cats[] = $id;
        }

        $sql = "SELECT id FROM categories WHERE sub = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

            if($sql->rowCount() > 0){
              $data = $sql->fetchAll();

                foreach($data as $item){
                    if(!in_array($item['id'], $cats)){
                        $cats[] = $item['id'];
                    }

                    $cats = $this->scanCategory($item['id'], $cats);
                }
            }

        return $cats;
    }




    public function hasProducts($array){

        $sql = "SELECT COUNT(*) as c FROM products WHERE id_category IN (".implode(",", $array).")";
        $sql = $this->db->query($sql);

        $data = $sql->fetch();

        if(intval($data['c']) > 0){
            return true;
        } else {
            return false;
        }
    }

    

    public function deleteCategories($array){

        $sql = "DELETE FROM categories WHERE id IN (".implode(",", $array).")";
        $sql = $this->db->query($sql);
    }
}