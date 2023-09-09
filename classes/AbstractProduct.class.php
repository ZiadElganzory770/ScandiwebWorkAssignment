<?php

namespace classes;

abstract class AbstractProduct {
    protected $sku;
    protected $name;
    protected $price;
    protected $type;

    public function __construct($sku,$name,$price)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;

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


    public abstract function getSpecificAttribute();

    public function display(){
        return "SKU: {$this->sku}, Name: {$this->name}, Price: {$this->price}," . $this->getSpecificAttribute();
    }
    
}

?>