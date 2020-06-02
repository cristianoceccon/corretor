<?php

class MeiosPagamentos extends Model 
{
    public function getList():array
    {
        $array = [];
        $sql = "SELECT * FROM formas_pagamentos";
        $sql = $this->db->query($sql);
        if($sql->rowCount() > 0)
        {
            $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $array;
    }
}