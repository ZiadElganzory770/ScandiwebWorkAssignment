<?php

namespace classes;

abstract class AbstractProduct {
    protected $sku;
    protected $name;
    protected $price;
    protected $type;

    public function __construct($sku,$name,$price,$type)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->type = $type;

    }

    public function setSKU($sku){
        $this->sku=$sku;
    }

    public function getSKU(){
        return $this->sku;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setType($type){
        $this->type = $type;
    }

    public function getType(){
        return $this->type;
    }

    public abstract function display();
    
}

?>