<?php
class Empresa extends Model {


public function getAllEmpresa() {
    $array = array();

    $sql = "SELECT * FROM empresa";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
        $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        
}
    return $array;
}

public function get($id) {
    $array = array();

    $sql = "SELECT * FROM empresa WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();
    if($sql->rowCount() > 0) {
        $array = $sql->fetch(\PDO::FETCH_ASSOC);
        
}
    return $array;
}


public function addempre($cnpj, $razaosocial, $fantasia, $email, $telefone, $celular, $cep, $endereco, $numero, $complemento, $bairro, $cidade, $uf, $inscricao) {

    $sql = "INSERT INTO empresa (cnpj, razaosocial, fantasia, email, telefone, celular, cep, endereco, numero, complemento, bairro, cidade, uf, inscricao) VALUES (:cnpj, :razaosocial, :fantasia, :email, :telefone, :celular, :cep, :endereco, :numero, :complemento, :bairro, :cidade, :uf, :inscricao)";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(':cnpj', $cnpj);
    $sql->bindValue(':razaosocial', $razaosocial);
    $sql->bindValue(':fantasia', $fantasia);
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
    $sql->bindValue(':inscricao', $inscricao);
    $sql->execute();

}

public function update($cnpj, $id, $razaosocial, $fantasia, $inscricao, $email, $telefone, $celular, $cep, $endereco, $numero, $complemento, $bairro, $cidade, $uf) {
    $sql = "UPDATE empresa SET cnpj = :cnpj, razaosocial = :razaosocial, fantasia = :fantasia, inscricao = :inscricao, email = :email, telefone = :telefone, celular = :celular, cep = :cep, endereco = :endereco, numero = :numero, complemento = :complemento, bairro = :bairro, cidade = :cidade, uf = :uf WHERE id = :id";
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