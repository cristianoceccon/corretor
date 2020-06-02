<?php
class Compras extends Model {


public function getAllCompras() {
    $array = array();

    $sql = "SELECT * FROM compras";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
        $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        
}
    return $array;
}

public function get($id) {
    $array = array();

    $sql = "SELECT * FROM compras WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();
    if($sql->rowCount() > 0) {
        $array = $sql->fetch(\PDO::FETCH_ASSOC);
        
}
    return $array;
}


public function addcompra($produto, $quantidade, $valorunit, $subtotal, $valortotal) {

        $subtotal = $quantidade * $valorunit;
        $valortotal = $subtotal + $subtotal;
        

    $sql = "INSERT INTO compras (produto, quantidade, valorunit, subtotal, valortotal) VALUES (:produto, :quantidade, :valorunit, :subtotal, :valortotal)";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':produto', $produto);
    $sql->bindValue(':quantidade', $quantidade);
    $sql->bindValue(':valorunit', $valorunit);
    $sql->bindValue(':subtotal', $subtotal);
    $sql->bindValue('valortotal', $valortotal);
    $sql->execute();

}

public function update($produto, $id, $quantidade, $valorunit, $subtotal) {
    $sql = "UPDATE compras SET produto = :produto, quantidade = :quantidade, valorunit = :valorunit, subtotal = :subtotal WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':produto', $produto);
    $sql->bindValue(':id', $id);
    $sql->bindValue(':quantidade', $quantidade);
    $sql->bindValue(':valorunit', $valorunit);
    $sql->bindValue(':subtotal', $subtotal);
    $sql->execute();
}

public function hasProducts($id){
    $sql = "SELECT COUNT(*) as c FROM produtos WHERE id_brand = :id";
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
    $sql = "DELETE FROM compras WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();
}

}