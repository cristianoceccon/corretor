<?php 
class Sliders extends Model {

    public function getAll(){
        $array = array();
        $cat = new Categories();
        $sql = "SELECT * FROM sliders";
        $sql = $this->db->query($sql);

            if($sql->rowCount() > 0){
                $array = $sql->fetchAll(\PDO::FETCH_ASSOC);

                foreach($array as $key => $item){
                    $category = $cat->get($item['id_category']);
                    $array[$key]['category'] = 'Nenhuma';
                    if(!empty($category)){
                        $array[$key]['category'] = $category['name'];
                    }
                }
            }

        return $array;
    }

    public function get($id){
        $array = array();
        $sql = "SELECT * FROM sliders WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', intval($id));
        $sql->execute();

            if($sql->rowCount() > 0){
                $array = $sql->fetch(\PDO::FETCH_ASSOC);
            }
        return $array;
    }

    public function add($locality, $id_category, $link, $tmp_name, $name, $type){
        $extensao = strtolower(substr($name, -4)); //pega a extensao do arquivo
        if($extensao == "jpeg"){
            $extensao = '.'.$extensao;
        }

        $novo_nome = md5(time().rand(0,999).rand(0,999)).$extensao; //define o nome do arquivo
        $diretorio = BASE_DIRECTORY."../media/sliders/"; //define o diretorio para onde enviaremos o arquivo
        move_uploaded_file($tmp_name, $diretorio.$novo_nome); //efetua o upload

        $sql = "INSERT INTO sliders SET id_category = :id_category, url = :url, link = :link, 
        status = :status, locality = :locality";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_category', $id_category);
        $sql->bindValue(':url', $novo_nome);
        $sql->bindValue(':link', $link);
        $sql->bindValue(':status', 'ATIVO');
        $sql->bindValue(':locality', $locality);
        $sql->execute();
    }

    public function edit($id, $locality, $id_category, $link, $status, $image = array()){
        if(!empty($image)){
            $tmp_name = $image['tmp_name'][0];
            $name = $image['name'][0];
            $type = $image['type'][0];

            $extensao = strtolower(substr($name, -4)); //pega a extensao do arquivo
            if($extensao == "jpeg"){
                $extensao = '.'.$extensao;
            }

            $novo_nome = md5(time().rand(0,999).rand(0,999)).$extensao; //define o nome do arquivo
            $diretorio = BASE_DIRECTORY."../media/sliders/"; //define o diretorio para onde enviaremos o arquivo
            move_uploaded_file($tmp_name, $diretorio.$novo_nome); //efetua o upload

            $sql = "UPDATE sliders SET id_category = :id_category, url = :url, link = :link, 
            status = :status, locality = :locality WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id_category', $id_category);
            $sql->bindValue(':url', $novo_nome);
            $sql->bindValue(':link', $link);
            $sql->bindValue(':status', $status);
            $sql->bindValue(':locality', $locality);
            $sql->bindValue(':id', $id);
            $sql->execute();
            
        } else {
            $sql = "UPDATE sliders SET id_category = :id_category, link = :link, 
            status = :status, locality = :locality WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id_category', $id_category);
            $sql->bindValue(':link', $link);
            $sql->bindValue(':status', $status);
            $sql->bindValue(':locality', $locality);
            $sql->bindValue(':id', $id);
            $sql->execute();
        }

    }

    public function del($id, $url){
        $diretorio = BASE_DIRECTORY."../media/sliders/".$url;

        if(file_exists($diretorio)){
            unlink($diretorio);
        }
        
        $sql = "DELETE FROM sliders WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', intval($id));
        $sql->execute();
    }

}