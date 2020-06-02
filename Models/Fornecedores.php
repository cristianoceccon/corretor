<?php
class Fornecedores extends Model {


public function getAllFornecedores() {
    $array = array();

    $sql = "SELECT * FROM fornecedores";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
        $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        
}
    return $array;
}

public function get($id) {
    $array = array();

    $sql = "SELECT * FROM fornecedores WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();
    if($sql->rowCount() > 0) {
        $array = $sql->fetch(\PDO::FETCH_ASSOC);
        
}
    return $array;
}


public function addfornecedor($cnpj, $razaosocial, $fantasia, $inscricao, $email, $telefone, $celular, $cep, $endereco, $numero, $complemento, $bairro, $cidade, $uf) {

    $sql = "INSERT INTO fornecedores (cnpj, razaosocial, fantasia, inscricao, email, telefone, celular, cep, endereco, numero, complemento, bairro, cidade, uf) VALUES (:cnpj, :razaosocial, :fantasia, :inscricao, :email, :telefone, :celular, :cep, :endereco, :numero, :complemento, :bairro, :cidade, :uf)";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':cnpj', $cnpj);
    $sql->bindValue(':razaosocial', $razaosocial);
    $sql->bindValue(':fantasia', $fantasia);
    $sql->bindValue(':inscricao', $inscricao);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':telefone', $telefone);
    $sql->bindValue(':celular', $celular);
    $sql->bindValue(':cep', $cep);
    $sql->bindValue(':endereco', $endereco);
    $sql->bindValue(':numero', $numero);
    $sql->bindValue(':complemento', $complemento);
    $sql->bindValue(':bairro', $bairro);
    $sql->bindValue(':cidade', $cidade);
    $sql->bindValue(':uf', $uf);
    $sql->execute();

}

public function update($cnpj, $id, $razaosocial, $fantasia, $inscricao, $email, $telefone, $celular, $cep, $endereco, $numero, $complemento, $bairro, $cidade, $uf) {
    $sql = "UPDATE fornecedores SET cnpj = :cnpj, razaosocial = :razaosocial, fantasia = :fantasia, inscricao = :inscricao, email = :email, telefone = :telefone, celular = :celular, cep = :cep, endereco = :endereco, numero = :numero, complemento = :complemento, bairro = :bairro, cidade = :cidade, uf = :uf WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':cnpj', $cnpj);
    $sql->bindValue(':id', $id);
    $sql->bindValue(':razaosocial', $razaosocial);
    $sql->bindValue(':fantasia', $fantasia);
    $sql->bindValue(':inscricao', $inscricao);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':telefone', $telefone);
    $sql->bindValue(':celular', $celular);
    $sql->bindValue(':cep', $cep);
    $sql->bindValue(':endereco', $endereco);
    $sql->bindValue(':numero', $numero);
    $sql->bindValue(':complemento', $complemento);
    $sql->bindValue(':bairro', $bairro);
    $sql->bindValue(':cidade', $cidade);
    $sql->bindValue(':uf', $uf);
    $sql->execute();

}

}