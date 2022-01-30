<?php

class Patika
{
    public $id;
    public $model;
    public $velicina_id;
    public $boja_id;
    public $cena;
    public $pol;


    public function unesiUBazu($model, $velicina_id, $boja_id, $cena, $pol)
    {
        include('konekcijaBaza.php');
        $query = "insert into patike (model, velicina_id, boja_id, cena, pol) values ('$model', '$velicina_id', '$boja_id', '$cena', '$pol')";

        return $konekcija->query($query);
    }
}
