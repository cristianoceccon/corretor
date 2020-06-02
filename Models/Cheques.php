<?php
class Cheques extends Model {

    public function getInfo($id) {
    $array = array();

    $sql = "SELECT * FROM cheques WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":id", $id);
    $sql->execute();

    if($sql->rowCount() > 0) {
            $array = $sql->fetch();
    }

    return $array;
}


public function getAllCheques() {
    $array = array();
    $for = new Fornecedores();
    $con = new Contas();
    $num = new Contas();
 
    $sql = "SELECT * FROM cheques";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
        $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        
        foreach($array as $key => $item) {
            $forInfo = $for->get($item['id_fornecedor']);
            $conInfo = $con->get($item['id_conta_banco']);
            $numInfo = $num->get($item['id_conta_numero']);
       
            $array[$key]['razaosocial_fornecedor'] = $forInfo['razaosocial'];
            $array[$key]['banco_conta'] = $conInfo['banco'];
            $array[$key]['numero_conta'] = $numInfo['numero'];
         
            
        }
    }
    return $array;
}

public function getAllChequesNaoBaixados() {
    $array = array();
    $for = new Fornecedores();
    $con = new Contas();
    $num = new Contas();
 
    $sql = "SELECT * FROM cheques WHERE status_cheque = 0";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
        $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        
        foreach($array as $key => $item) {
            $forInfo = $for->get($item['id_fornecedor']);
            $conInfo = $con->get($item['id_conta_banco']);
            $numInfo = $num->get($item['id_conta_numero']);
       
            $array[$key]['razaosocial_fornecedor'] = $forInfo['razaosocial'];
            $array[$key]['banco_conta'] = $conInfo['banco'];
            $array[$key]['numero_conta'] = $numInfo['numero'];
         
            
        }
    }
    return $array;
}

public function getAllChequesBaixados() {
    $array = array();
    $for = new Fornecedores();
    $con = new Contas();
    $num = new Contas();
 
    $sql = "SELECT * FROM cheques WHERE status_cheque = 1";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
        $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        
        foreach($array as $key => $item) {
            $forInfo = $for->get($item['id_fornecedor']);
            $conInfo = $con->get($item['id_conta_banco']);
            $numInfo = $num->get($item['id_conta_numero']);
       
            $array[$key]['razaosocial_fornecedor'] = $forInfo['razaosocial'];
            $array[$key]['banco_conta'] = $conInfo['banco'];
            $array[$key]['numero_conta'] = $numInfo['numero'];
         
            
        }
    }
    return $array;
}

public function get($id) {
    $array = array();

    $sql = "SELECT * FROM cheques WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();
    if($sql->rowCount() > 0) {
        $array = $sql->fetch(\PDO::FETCH_ASSOC);
        
}
    return $array;
}


public function addcheque($id_conta_banco, $id_conta_numero, $numero, $valor, $id_fornecedor, $data_emissao, $data_vencimento, $historico, $status_cheque) {

    $sql = "INSERT INTO cheques (id_conta_banco, id_conta_numero, numero, valor, id_fornecedor, data_emissao, data_vencimento, historico, status_cheque) VALUES (:id_conta_banco, :id_conta_numero, :numero, :valor, :id_fornecedor, :data_emissao, :data_vencimento, :historico, :status_cheque)";
    $sql = $this->db->prepare($sql);
     $sql->bindValue(':id_conta_banco', $id_conta_banco);
     $sql->bindValue(':id_conta_numero', $id_conta_numero);
     $sql->bindValue(':numero', $numero);
     $sql->bindValue(':valor', $valor);
     $sql->bindValue(':id_fornecedor', $id_fornecedor);
     $sql->bindValue(':data_emissao', $data_emissao);
     $sql->bindValue(':data_vencimento', $data_vencimento);
     $sql->bindValue(':historico', $historico);
     $sql->bindValue(':status_cheque', $status_cheque);

    $sql->execute();

}

public function update($id_conta_banco, $id_conta_numero, $numero, $valor, $id_fornecedor, $data_emissao, $data_vencimento, $historico, $status_cheque, $data_baixa, $id) {
    $sql = "UPDATE cheques SET id_conta_banco = :id_conta_banco, id_conta_numero = :id_conta_numero, numero = :numero, valor = :valor, id_fornecedor = :id_fornecedor, data_emissao = :data_emissao, data_vencimento = :data_vencimento, historico = :historico, status_cheque = :status_cheque, data_baixa = :data_baixa WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':id_conta_banco', $id_conta_banco);
    $sql->bindValue(':id', $id);
    $sql->bindValue(':id_conta_numero', $id_conta_numero);
    $sql->bindValue(':numero', $numero);
    $sql->bindValue(':valor', $valor);
    $sql->bindValue(':id_fornecedor', $id_fornecedor);
    $sql->bindValue(':data_emissao', $data_emissao);
    $sql->bindValue(':data_vencimento', $data_vencimento);
    $sql->bindValue(':historico', $historico);
    $sql->bindValue(':status_cheque', $status_cheque);
    $sql->bindValue(':data_baixa', $data_baixa);
    $sql->execute();
}

}