<?php

class TiposPagamentos extends Model 
{
    public function get(int $id):array
    {
        $array = [];
        $sql = "SELECT * FROM tipos_pagamentos WHERE meio_pagamento_id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0)
        {
            $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $array;
    }
}