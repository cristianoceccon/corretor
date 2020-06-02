<?php
class Kit extends Model {

	public function getAll(){
	    $array = array();
        
        $sql = "SELECT *, (select count(*) from kit_products where kit_products.id_kit = kits.id) as b FROM kits WHERE status = 0";
        $sql = $this->db->query($sql);

           if($sql->rowCount() > 0){
			  $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
           }

        return $array;
	}

	public function getItems($id){
		$product = new Products();
		$array = array();

		$sql = "SELECT * FROM kit_products WHERE id_kit = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(\PDO::FETCH_ASSOC);

			foreach($array as $key => $item){
				$array[$key]['p'] = $product->get($item['id_product']);
				$array[$key]['image'] = BASE_URL_SITE."media/products/".$product->primaryImage($item['id_product']);
			}
			
		}
		
		return $array;
	}

	public function add($name_kit, $cod_reference,  $url, $price_kit, $products, 
						$kit_description, $kit_catalog, $featured, $sale, $bestseller, $new_kit){
		//processo de salvar imagem no diretorio
		$tmp_name = $url['tmp_name'];
        $name = $url['name'];
		$type = $url['type'];
		$extensao = strtolower(substr($name, -4)); //pega a extensao do arquivo
		if($extensao == "jpeg"){
			$extensao = '.'.$extensao;
		}
		$novo_nome = md5(time().rand(0,999).rand(0,999)).$extensao; //define o nome do arquivo
		$diretorio = BASE_DIRECTORY."media/products/"; //define o diretorio para onde enviaremos o arquivo
		move_uploaded_file($tmp_name, $diretorio.$novo_nome); //efetua o upload

		//insere o kit no banco de dados
		$sql = "INSERT INTO kits SET reference = :reference, name = :name, url = :url, amount = :amount, status = 0, 
		description = :description, catalog = :catalog, rating = :rating, featured = :featured, sale = :sale, 
		bestseller = :bestseller, new_kit = :new_kit";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':reference', $cod_reference);
		$sql->bindValue(':name', $name_kit);
		$sql->bindValue(':url', $novo_nome);
		$sql->bindValue(':amount', $price_kit);
		$sql->bindValue(':description', $kit_description);
		$sql->bindValue(':catalog', $kit_catalog);
		$sql->bindValue(':rating', '0.0');
		$sql->bindValue(':featured', $featured);
		$sql->bindValue(':sale', $sale);
		$sql->bindValue(':bestseller', $bestseller);
		$sql->bindValue(':new_kit', $new_kit);
		$sql->execute();

		//id do kit inserido
		$id_kit = $this->db->lastInsertId();

		//insere cada produto do kit
		if(is_array($products)){

			foreach($products as $key => $item){
				$id_product = intval($key);
				$data = explode(';', $item);
				$qtd = intval($data[0]);
				$price = str_replace(",", ".", $data[1]);
				$this->addItems($id_kit, $id_product, $qtd, $price);
			}
		}

		

	}

	public function addItems($id_kit, $id_product, $qtd, $price){
		$sql = "INSERT INTO kit_products SET id_kit = :id_kit, id_product = :id_product, qtd = :qtd, price = :price";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_kit', $id_kit);
		$sql->bindValue(':id_product', $id_product);
		$sql->bindValue(':qtd', $qtd);
		$sql->bindValue(':price', $price);
		$sql->execute();
	}

	public function edit($id, $name_kit, $cod_reference,  $url, $price_kit , $products, 
	$kit_description, $kit_catalog, $featured, $sale, $bestseller, $new_kit){

		//processo de salvar imagem no diretorio
		if(!empty($url)){
			$tmp_name = $url['tmp_name'];
			$name = $url['name'];
			$type = $url['type'];
			$extensao = strtolower(substr($name, -4)); //pega a extensao do arquivo
			if($extensao == "jpeg"){
				$extensao = '.'.$extensao;
			}
			$novo_nome = md5(time().rand(0,999).rand(0,999)).$extensao; //define o nome do arquivo
			$diretorio = BASE_DIRECTORY."media/products/"; //define o diretorio para onde enviaremos o arquivo
			move_uploaded_file($tmp_name, $diretorio.$novo_nome); //efetua o upload

			$sql = "UPDATE kits SET url = :url WHERE id = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':url', $novo_nome);
			$sql->bindValue(':id', $id);
			$sql->execute();
		}

		$sql = "UPDATE kits SET reference = :reference, name = :name, amount = :amount, 
		description = :description, catalog = :catalog, featured = :featured, sale = :sale, 
		bestseller = :bestseller, new_kit = :new_kit WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':reference', $cod_reference);
		$sql->bindValue(':name', $name_kit);
		$sql->bindValue(':amount', $price_kit);
		$sql->bindValue(':description', $kit_description);
		$sql->bindValue(':catalog', $kit_catalog);
		$sql->bindValue(':featured', $featured);
		$sql->bindValue(':sale', $sale);
		$sql->bindValue(':bestseller', $bestseller);
		$sql->bindValue(':new_kit', $new_kit);
		$sql->bindValue(':id', $id);
		$sql->execute();

		//insere cada produto do kit
		if(is_array($products)){
			
			
			$sql = "DELETE FROM kit_products WHERE id_kit = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id', $id);
			$sql->execute();

			foreach($products as $key => $item){
				$id_product = $key;
				$data = explode(';', $item);
				$qtd = intval($data[0]);
				$price = str_replace(",", ".", $data[1]);
				$this->addItems($id, $id_product, $qtd, $price);
			}
		}


	}

	public function hasCodReference($cod_reference){
		$sql = "SELECT COUNT(*) as c FROM kits WHERE reference = :reference AND status = 0";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':reference', $cod_reference);
		$sql->execute();
        $data = $sql->fetch();

		    if($data['c'] > 0){
		   	    return true;
		    } else {
		    	return false;
		    }
	}

	public function hasCodReferenceUpdate($cod_reference, $id){
		$sql = "SELECT * FROM kits WHERE reference = :reference AND status = 0";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':reference', $cod_reference);
		$sql->execute();
        $data = $sql->fetch();

        if($sql->rowCount() > 0 && $cod_reference == $data['reference'] && $data['id'] == $id){
          return false;
          exit;
        } else {// caso contrario verifica verifica novamente o nome do usuario e se existir retorna true e não deixa fazer o update
          $sql = "SELECT * FROM kits WHERE reference = :reference";
          $sql = $this->db->prepare($sql);
          $sql->bindValue(':reference', $cod_reference);
		  $sql->execute();
           if($sql->rowCount() > 0){
            return true;
            exit;
           } else {
            return false;
            exit;
           }
          
        }
	}

	public function get($id){
        $array = array();
        
        $sql = "SELECT * FROM kits WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

            if($sql->rowCount() > 0){
               $array = $sql->fetch();
            }

        return $array;
	}

	public function del($id){
		$sql = "UPDATE kits SET status = '1' WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}
}