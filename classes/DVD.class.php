<?php
namespace classes;
// use classes\AbstractProduct;
class DVD extends AbstractProduct {
    private $size;

    public function __construct($sku, $name, $price,$size) {
        parent::__construct($sku, $name, $price);
        $this->size = $size;
    }

    public function getSize() {
        return $this->size;
    }

    public function setSize($size) {
        $this->size = $size;
    }

    public function getSpecificAttribute() {
        return "Size: {$this->size} MB";
    }
}

?>