<?php 
class Purchases extends Model {

    public function getList($offset=0, $limit=12, $filters=array()){
        $users = new User();
        $array = array();
        $where = array(
            '1=1'
        );
        $order = 'id DESC';

        if(!empty($filters['payment_status'])){
            $where[] = "payment_status = :status";
        } 

        if(!empty($filters['search'])){
            $where[] = "id LIKE :id";
        } 

        if(!empty($filters['id_user'])){
            $where[] = "id_user = :id_user";
        } 
        
        if(!empty($filters['initial_date']) && !empty($filters['final_date'])){
            $where[] = "date_added BETWEEN :initial AND :final";
        }

        if(!empty($filters['order'])){
            $order = 'id DESC';
        }

       

        $sql = "SELECT * FROM purchases WHERE ".implode(' AND ', $where)." ORDER BY $order LIMIT $offset, $limit";
        $sql = $this->db->prepare($sql);

        if(!empty($filters['payment_status'])){
            $sql->bindValue(':status', $filters['payment_status']);
        }

        if(!empty($filters['search'])){
            $sql->bindValue(':id', '%'.$filters['search'].'%');
        } 

        if(!empty($filters['id_user'])){
            $sql->bindValue(':id_user', $filters['id_user']);
        }

        if(!empty($filters['initial_date']) && !empty($filters['final_date'])){
            $sql->bindValue(':initial', $filters['initial_date'], PDO::PARAM_STR);
            $sql->bindValue(':final', $filters['final_date'], PDO::PARAM_STR);
        }

        $sql->execute();

            if($sql->rowCount() > 0){
                $array = $sql->fetchAll(\PDO::FETCH_ASSOC);                   

                    foreach($array as $key => $item){
                        $data_user = $users->getUserById($item['id_user']);
                        $array[$key]['user'] = $data_user['name'];
                    }
            }


            
        return $array;
    }

    

    public function getTotal($filters = array()){
        $where = array(
             '1=1'
        );
    

        if(!empty($filters['payment_status'])){
            $where[] = "payment_status = :status";
        } 

        if(!empty($filters['search'])){
            $where[] = "id LIKE :id";
        } 

        if(!empty($filters['id_user'])){
            $where[] = "id_user = :id_user";
        } 
        
        if(!empty($filters['initial_date']) && !empty($filters['final_date'])){
            $where[] = "date_added BETWEEN :initial AND :final";
        }
     
          
        $sql = "SELECT COUNT(*) as c FROM purchases WHERE ".implode(' AND ', $where)."";
        $sql = $this->db->prepare($sql);

        if(!empty($filters['payment_status'])){
            $sql->bindValue(':status', $filters['payment_status']);
        }

        if(!empty($filters['search'])){
            $sql->bindValue(':id', $filters['search']);
        } 

        if(!empty($filters['id_user'])){
            $sql->bindValue(':id_user', $filters['id_user']);
        }

        if(!empty($filters['initial_date']) && !empty($filters['final_date'])){
            $sql->bindValue(':initial', $filters['initial_date'], PDO::PARAM_STR);
            $sql->bindValue(':final', $filters['final_date'], PDO::PARAM_STR);
        }

        $sql->execute();
        
        $data = $sql->fetch();
        return $data['c'];
    
      }

    //pega um pedido especifico
    public function get($id){
        $array = array();
        $sql = "SELECT * FROM purchases WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
            if($sql->rowCount() > 0){
                $array = $sql->fetch(\PDO::FETCH_ASSOC);
            }
        return $array;

    }

    //pega todos os produtos incluidos no pedido
    public function getItems($id_purchase){
        $products = new Products();
        $cores = new Colors();
        $array = array();
        
        $sql = "SELECT * FROM purchases_products WHERE id_purchase = :id_purchase";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_purchase', $id_purchase);
        $sql->execute();

            if($sql->rowCount() > 0){
               $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
               foreach($array as $key => $item){
                    $info_p = $products->getOrderProduct($item['id_product']);//informações do produto
                    $array[$key]['name'] = $info_p['name'];
                    $array[$key]['reference'] = $info_p['reference'];
                    $array[$key]['imagem'] = current($info_p['images']);
                    $array[$key]['color_name'] = $cores->get($item['id_color']);
                }
               
            }

        return $array;

    }


    public function update($id, $status){
        $sql = "UPDATE purchases SET payment_status = :status WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':status', $status);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    public function updateStock($id, $status){
        $product = new Products();
        //se status for de pedido enviado atualiza o estoque
        if($status == 102){
            //pega todos os produtos do pedido
            $products = $this->getItems($id);
            
            foreach($products as $item){
                //atualiza o estoque
                $id_product = $item['id_product'];
                $qtd = $item['quantity'];
                $product->updateStock($id_product, $qtd);
                
            }
        }
    }

    public function getPurchaseTransaction($id_purchase){
        $array = array();

        $sql = "SELECT * FROM purchase_transactions WHERE id_purchase = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id_purchase);
        $sql->execute();

            if($sql->rowCount() > 0){
                $array = $sql->fetch(\PDO::FETCH_ASSOC);
            }

        return $array;
    }


    
    private function filterArray($value, $key): bool {

        switch ($key) {
            case 'payment_status':
                return filter_var($value, FILTER_VALIDATE_INT);
                break;
            case 'client_type':
                return is_string($value);
                break;
            case 'initial_date':
                $data = explode('-', $value);
                return checkdate(intval($data[1]), intval($data[2]), intval($data[0]));
                break;
            case 'final_date':
                $data = explode('-', $value);
                return checkdate(intval($data[1]), intval($data[2]), intval($data[0]));
                break;
            
        }

        return false;

    }


    public function getReports($filters = array()){
        $users = new User();
        $data = array();
        $where = array(
            '1=1'
        );

        //filtrar os dados do array
        $filters = array_filter($filters, array($this, 'filterArray'), ARRAY_FILTER_USE_BOTH);

        

        if(!empty($filters['payment_status'])){
            $where[] = "payment_status = :status";
        } 

        if(!empty($filters['client_type'])){
            $client_type = $filters['client_type'];

            if($client_type == 'SITE'){
                $where[] = "total_salesman = 0";
            }

            if($client_type == 'VENDEDOR'){
                $where[] = "total_salesman != 0";
            }
            
        }

        if(!empty($filters['initial_date']) && !empty($filters['final_date'])){
            $where[] = "date_added BETWEEN :initial AND :final";
        }

        $sql = "SELECT * FROM purchases WHERE ".implode(' AND ', $where)."";
        $sql = $this->db->prepare($sql);

        if(!empty($filters['payment_status'])){
            $sql->bindValue(':status', $filters['payment_status']);
        }

        if(!empty($filters['initial_date']) && !empty($filters['final_date'])){
            $sql->bindValue(':initial', $filters['initial_date'], PDO::PARAM_STR);
            $sql->bindValue(':final', $filters['final_date'], PDO::PARAM_STR);
        }

        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetchAll(\PDO::FETCH_ASSOC);

            foreach($data as $key => $item){
                $data_user = $users->getUserById($item['id_user']);
                $data[$key]['user'] = $data_user['name'];
            }
        }

        return $data;
    }

}