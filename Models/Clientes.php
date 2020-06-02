<?php
class Clientes extends Model {


public function getAllClientes() {
    $array = array();

    $sql = "SELECT * FROM clientes WHERE id > 0 ORDER BY nome ASC";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
        $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        
}
    return $array;
}

public function get($id) {
    $array = array();

    $sql = "SELECT * FROM clientes WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();
    if($sql->rowCount() > 0) {
        $array = $sql->fetch(\PDO::FETCH_ASSOC);
        
}
    return $array;
}



public function addcliente($nome, $cpf, $rg, $data_nasc, $nome_pai, $nome_mae, $cep, $estado, $cidade, $endereco, $numero_end, $complemento, $bairro, $telefone_fixo, $telefone_celular_1, $telefone_celular_2, $email, $razao, $cnpj) {

    $sql = "INSERT INTO clientes (nome, cpf, rg, data_nasc, nome_pai, nome_mae, cep, estado, cidade, endereco, numero_end, complemento, bairro, telefone_fixo, telefone_celular_1, telefone_celular_2, email, razao, cnpj) VALUES (:nome, :cpf, :rg, :data_nasc, :nome_pai, :nome_mae, :cep, :estado, :cidade, :endereco, :numero_end, :complemento, :bairro, :telefone_fixo, :telefone_celular_1, :telefone_celular_2, :email, :razao, :cnpj)";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':cpf', $cpf);
    $sql->bindValue(':rg', $rg);
    $sql->bindValue(':data_nasc', $data_nasc);
    $sql->bindValue(':nome_pai', $nome_pai);
    $sql->bindValue(':nome_mae', $nome_mae);
    $sql->bindValue(':cep', $cep);
    $sql->bindValue(':estado', $estado);
    $sql->bindValue(':cidade', $cidade);
    $sql->bindValue(':endereco', $endereco);
    $sql->bindValue(':numero_end', $numero_end);
    $sql->bindValue(':complemento', $complemento);
    $sql->bindValue(':bairro', $bairro);
    $sql->bindValue(':telefone_fixo', $telefone_fixo);
    $sql->bindValue(':telefone_celular_1', $telefone_celular_1);
    $sql->bindValue(':telefone_celular_2', $telefone_celular_2);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':razao', $razao);
    $sql->bindValue(':cnpj', $cnpj);
    $sql->execute();

}

public function update($nome, $id, $cpf, $rg, $data_nasc, $nome_pai, $nome_mae, $cep, $estado, $cidade, $endereco, $numero_end, $complemento, $bairro, $telefone_fixo, $telefone_celular_1, $telefone_celular_2, $email, $razao, $cnpj) {
    $sql = "UPDATE clientes SET nome = :nome, cpf = :cpf, rg = :rg, data_nasc = :data_nasc, nome_pai = :nome_pai, nome_mae = :nome_mae, cep = :cep, estado = :estado, cidade = :cidade, endereco = :endereco, numero_end = :numero_end, complemento = :complemento, bairro = :bairro, telefone_fixo = :telefone_fixo, telefone_celular_1 = :telefone_celular_1, telefone_celular_2 = :telefone_celular_2, email = :email, razao = :razao, cnpj = :cnpj WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':id', $id);
    $sql->bindValue(':cpf', $cpf);
    $sql->bindValue(':rg', $rg);
    $sql->bindValue(':data_nasc', $data_nasc);
    $sql->bindValue(':nome_pai', $nome_pai);
    $sql->bindValue(':nome_mae', $nome_mae);
    $sql->bindValue(':cep', $cep);
    $sql->bindValue(':estado', $estado);
    $sql->bindValue(':cidade', $cidade);
    $sql->bindValue(':endereco', $endereco);
    $sql->bindValue(':numero_end', $numero_end);
    $sql->bindValue(':complemento', $complemento);
    $sql->bindValue(':bairro', $bairro);
    $sql->bindValue(':telefone_fixo', $telefone_fixo);
    $sql->bindValue(':telefone_celular_1', $telefone_celular_1);
    $sql->bindValue(':telefone_celular_2', $telefone_celular_2);
    $sql->bindValue(':email', $email);  
    $sql->bindValue(':razao', $razao);  
    $sql->bindValue(':cnpj', $cnpj);  
    $sql->execute();
}

public function hasProducts($id){
    $sql = "SELECT COUNT(*) as c FROM produtos WHERE id_categoria = :id";
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
    $sql = "DELETE FROM clientes WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();
}

}