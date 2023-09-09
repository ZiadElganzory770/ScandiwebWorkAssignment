<?php
namespace classes;
// use classes\AbstractProduct;
class Book extends AbstractProduct {
    private $weight;

    public function __construct($sku, $name, $price,  $type, $weight) {
        parent::__construct($sku, $name, $price, $type);
        $this->weight = $weight;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }

    public function getSpecificAttribute() {
        return "Weight: {$this->weight} Kg";
    }
}
?>