<?php
class Products extends Model{
	public function getAll(){
		$array = array();
        $cat = new Categories();
        $brand = new Brands();

        $sql = "SELECT id, id_category, id_brand, name, stock, price_cost, price_promotion, price_sale FROM products";
        $sql = $this->db->query($sql);

            if($sql->rowCount() > 0){
            	
            	$array = $sql->fetchAll(\PDO::FETCH_ASSOC);

            	foreach ($array as $key => $item) {
            		$catInfo = $cat->get($item['id_category']);
            		$array[$key]['name_category'] = $catInfo['name'];
                    $array[$key]['url'] = $this->primaryImage($item['id']);
            		$brandInfo = $brand->get($item['id_brand']);
            		$array[$key]['name_brand'] = $brandInfo['name'];
            	}
            }

            
		return $array;

    }
    
    public function getOrderProduct($id){
        $brand = new Brands();
        $array = array();
        if(!empty($id)){
     
              $sql = "SELECT * FROM products WHERE id = :id";
              $sql = $this->db->prepare($sql);
              $sql->bindValue(':id', $id);
              $sql->execute();
                 if($sql->rowCount() > 0){
                   $array = $sql->fetch(\PDO::FETCH_ASSOC);
                   $array['images'] = array(); 
                   $array['brand'] = $brand->get($array['id_brand']);
                   $array['images'] = $this->getImagesByProductId($id);
                   
                 }
     
     
         return $array;
        } 
     
      }

      public function getImagesByProductId($id){
        $array = array();
        $sql = "SELECT url FROM products_images WHERE id_product = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
           if($sql->rowCount() > 0){
             $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
           }
    
        return $array;
     }

    public function get($id){
        if(!empty($id)){
            $array = array();
            
            //pega os dados do produto
            $sql = "SELECT * FROM products WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();

                if($sql->rowCount() > 0){
                    
                    $array = $sql->fetch(\PDO::FETCH_ASSOC);

                    //pega o valor das opções do produto
                    $sql = "SELECT id_option, p_value FROM products_options WHERE id_product = :id";
                    $sql = $this->db->prepare($sql);
                    $sql->bindValue(':id', $array['id']);
                    $sql->execute();

                    if($sql->rowCount() > 0){ 
                       $ops = $sql->fetchAll(\PDO::FETCH_ASSOC);
                       $array['options'] = array();
                       foreach ($ops as $item) {
                           $array['options'][$item['id_option']] = $item['p_value'];
                       }
                    }

                    //pega as cores do produto
                    $sql = "SELECT id_color, value FROM products_colors WHERE id_product = :id";
                    $sql = $this->db->prepare($sql);
                    $sql->bindValue(':id', $array['id']);
                    $sql->execute();

                    if($sql->rowCount() > 0){ 
                       $ops = $sql->fetchAll(\PDO::FETCH_ASSOC);
                       $array['cores'] = array();
                       foreach ($ops as $item) {
                           $array['cores'][$item['id_color']] = $item['value'];
                       }
                    }

                    $sql = "SELECT id, url FROM products_images WHERE id_product = :id";
                    $sql = $this->db->prepare($sql);
                    $sql->bindValue(':id', $array['id']);
                    $sql->execute();

                        if($sql->rowCount() > 0){
                            $images = $sql->fetchAll(\PDO::FETCH_ASSOC);
                            $array['images'] = array();

                            foreach ($images as  $img) {
                                $array['images'][$img['id']] = BASE_URL_SITE.'media/products/'.$img['url'];
                            }
                        }
                    
                }
                
                

                
            return $array;
        }
    }

    public function primaryImage($id){
        $sql = "SELECT MIN(id), url FROM products_images WHERE id_product = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
          if($sql->rowCount() > 0){
            $data = $sql->fetch();
            return $data['url'];
          } else {
            return '';
          }

    }

    public function add($id_category, $id_brand, $reference, $catalog, $name, $description, $stock, $price_sale, $price_promotion, 
    $price_cost, $weight, $width, $height, $length, $diameter, $featured, $sale, $bestseller, $new_product, $colors, $options, $images){
        if(!empty($id_category) && !empty($catalog) && !empty($id_brand) && !empty($stock) && !empty($price_cost) && !empty($price_sale) && !empty($weight) && !empty($width) && !empty($height) && !empty($length) && !empty($diameter)){
            
            $options_selected = array();
            $colors_selected = array();
            foreach ($options as $optk => $opt) {
                if(!empty($opt)){
                    $options_selected[$optk] = $opt;
                }
            }

            foreach ($colors as $cok => $color) {
                if(!empty($color)){
                  $colors_selected[$cok] = $color;
                }
            }
            
            $colors_id = implode(',', array_keys($colors_selected));
            $options_id = implode(',', array_keys($options_selected));
            
            //insere o produto no db
            $sql = "INSERT INTO products (id_category, id_brand, id_kit, reference, catalog, name, description, stock, price_sale, price_promotion, price_cost, rating, featured, sale, bestseller, new_product, options, cores, weight, width, height, length, diameter) VALUES(:id_category, :id_brand, :id_kit, :reference, :catalog, :name, :description, :stock, :price_sale, :price_promotion, :price_cost,  :rating, :featured, :sale, :bestseller, :new_product, :options, :cores, :weight, :width, :height, :length, :diameter)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id_category', $id_category);
            $sql->bindValue(':id_brand', $id_brand);
            $sql->bindValue(':id_kit', '0');
            $sql->bindValue(':reference', $reference);
            $sql->bindValue(':catalog', $catalog);
            $sql->bindValue(':name', $name);
            $sql->bindValue(':description', $description);
            $sql->bindValue(':stock', $stock);
            $sql->bindValue(':price_sale', $price_sale);
            $sql->bindValue(':price_promotion', $price_promotion);
            $sql->bindValue(':price_cost', $price_cost);
            $sql->bindValue(':rating', '0.0');
            $sql->bindValue(':featured', $featured);
            $sql->bindValue(':sale', $sale);
            $sql->bindValue(':bestseller', $bestseller);
            $sql->bindValue(':new_product', $new_product);
            $sql->bindValue(':options', $options_id);
            $sql->bindValue(':cores', $colors_id);
            $sql->bindValue(':weight', $weight);
            $sql->bindValue(':width', $width);
            $sql->bindValue(':height', $height);
            $sql->bindValue(':length', $length);
            $sql->bindValue(':diameter', $diameter);
            $sql->execute();

            $id_product = $this->db->lastInsertId();
            

            //insere opção do produto no db
            foreach ($options_selected as $optk => $opt) {
                $sql = "INSERT INTO products_options (id_product, id_option, p_value) VALUES(:id_product, :id_option, :p_value)";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(':id_product', $id_product);
                $sql->bindValue(':id_option', $optk);
                $sql->bindValue(':p_value', $opt);
                $sql->execute();
            }
            
            //insere cor disponiveis para o produto
            foreach ($colors_selected as $cok => $color) {
                $sql = "INSERT INTO products_colors (id_product, id_color, value) VALUES(:id_product, :id_color, :value)";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(':id_product', $id_product);
                $sql->bindValue(':id_color', $cok);
                $sql->bindValue(':value', $color);
                $sql->execute();
            }

            //tipo de imagens aceitas
            $allowed_images = array(
               'image/jpeg',
               'image/jpg',
               'image/png'
            );
            
            //faz o loop para inserir imagem por imagem no db
            for($q=0;$q < count($images['name']);$q++){
                $tmp_name = $images['tmp_name'][$q];
                $name = $images['name'][$q];
                $type = $images['type'][$q];

                    //verifica se o tipo de imagem e permitido
                    if(in_array($type, $allowed_images)){
                        //função insere imagem no db
                        $this->addProductImage($id_product, $tmp_name, $name, $type);
                    }

            }

            

        }
    }

    public function edit($id_category, $id_brand, $reference, $catalog, $name, $description, $stock, $price_sale, $price_promotion, 
    $price_cost, $weight, $width, $height, $length, $diameter, $featured, $sale, $bestseller, $new_product, $options, $colors, $images, $c_images, $id){
        if(!empty($id) && !empty($id_category) && !empty($catalog) && !empty($id_brand) && !empty($stock) && !empty($price_sale) && !empty($price_cost) && !empty($weight) && !empty($width) && !empty($height) && !empty($length) && !empty($diameter)){
            
            $colors_selected = array();
            $options_selected = array();
            foreach ($options as $optk => $opt) {
                if(!empty($opt)){
                    $options_selected[$optk] = $opt;
                }
            }

            foreach ($colors as $cok => $color) {
                if(!empty($color)){
                  $colors_selected[$cok] = $color;
                }
            }
            
            $colors_id = implode(',', array_keys($colors_selected));

            $options_id = implode(',', array_keys($options_selected));
            
            //faz o update o produto no db
            $sql = "UPDATE products SET  id_category = :id_category, id_brand = :id_brand, reference = :reference, catalog = :catalog, name = :name, description = :description, stock = :stock, price_sale = :price_sale, price_promotion = :price_promotion, price_cost = :price_cost, featured = :featured, sale = :sale, bestseller = :bestseller, new_product = :new_product, options = :options, cores = :cores, weight = :weight, width = :width, height = :height, length = :length, diameter = :diameter WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id_category', $id_category);
            $sql->bindValue(':id_brand', $id_brand);
            $sql->bindValue(':reference', $reference);
            $sql->bindValue(':catalog', $catalog);
            $sql->bindValue(':name', $name);
            $sql->bindValue(':description', $description);
            $sql->bindValue(':stock', $stock);
            $sql->bindValue(':price_sale', $price_sale);
            $sql->bindValue(':price_promotion', $price_promotion);
            $sql->bindValue(':price_cost', $price_cost);
            $sql->bindValue(':featured', $featured);
            $sql->bindValue(':sale', $sale);
            $sql->bindValue(':bestseller', $bestseller);
            $sql->bindValue(':new_product', $new_product);
            $sql->bindValue(':options', $options_id);
            $sql->bindValue(':cores', $colors_id);
            $sql->bindValue(':weight', $weight);
            $sql->bindValue(':width', $width);
            $sql->bindValue(':height', $height);
            $sql->bindValue(':length', $length);
            $sql->bindValue(':diameter', $diameter);
            $sql->bindValue(':id', $id);
            $sql->execute();
            
            //deleta as opções atuais do produto
            $sql = "DELETE FROM products_options WHERE id_product = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
            
            //deleta as opções de cores do produto
            $sql = "DELETE FROM products_colors WHERE id_product = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();

            //insere as opções do produto no db
            foreach ($options_selected as $optk => $opt) {
                $sql = "INSERT INTO products_options (id_product, id_option, p_value) VALUES(:id_product, :id_option, :p_value)";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(':id_product', $id);
                $sql->bindValue(':id_option', $optk);
                $sql->bindValue(':p_value', $opt);
                $sql->execute();
            }

            //insere cor disponiveis para o produto
            foreach ($colors_selected as $cok => $color) {
                $sql = "INSERT INTO products_colors (id_product, id_color, value) VALUES(:id_product, :id_color, :value)";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(':id_product', $id);
                $sql->bindValue(':id_color', $cok);
                $sql->bindValue(':value', $color);
                $sql->execute();
            }

            //deletar as imagens não presentes

            if(is_array($c_images)){
                if(!empty($c_images)){
                    foreach ($c_images as $ckey => $cimg) {
                        $c_images[$ckey] = intval($cimg);
                    }

                    $sql = "DELETE FROM products_images WHERE id_product = :id AND id NOT IN (".implode(',', $c_images).")";
                    $sql = $this->db->prepare($sql);
                    $sql->bindValue(':id', $id);
                    $sql->execute();
                } else {
                    $sql = "DELETE FROM products_images WHERE id_product = :id";
                    $sql = $this->db->prepare($sql);
                    $sql->bindValue(':id', $id);
                    $sql->execute();
                }
            }
            
            //tipo de imagens aceitas
            $allowed_images = array(
               'image/jpeg',
               'image/jpg',
               'image/png'
            );
            
            //faz o loop para inserir imagem por imagem no db
            for($q=0;$q < count($images['name']);$q++){
                $tmp_name = $images['tmp_name'][$q];
                $name = $images['name'][$q];
                $type = $images['type'][$q];

                    //verifica se o tipo de imagem e permitido
                    if(in_array($type, $allowed_images)){
                        //função insere imagem no db
                        $this->addProductImage($id, $tmp_name, $name, $type);
                    }

            }

            

        }
    }

    public function addProductImage($id_product, $tmp_name, $name, $type){

            $extensao = strtolower(substr($name, -4)); //pega a extensao do arquivo
            if($extensao == "jpeg"){
                $extensao = '.'.$extensao;
            }
            $novo_nome = md5(time().rand(0,999).rand(0,999)).$extensao; //define o nome do arquivo
            $diretorio = BASE_DIRECTORY."../media/products/"; //define o diretorio para onde enviaremos o arquivo
            move_uploaded_file($tmp_name, $diretorio.$novo_nome); //efetua o upload


            //insere a imagem no db
            $sql = "INSERT INTO products_images (id_product, url) VALUES(:id_product, :url)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id_product', $id_product);
            $sql->bindValue(':url', $novo_nome);
            $sql->execute();

        

    }

    public function del($id){
        if(!empty($id)){
            $sql = "UPDATE products SET stock = 0 WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
        }

    }

    //atualiza o estoque
    public function updateStock($id, $qtd){
        $sql = "UPDATE products SET stock = stock-$qtd WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}