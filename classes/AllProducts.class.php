<?php
namespace classes;

class AllProducts extends AbstractProduct {
    private $size;
    private $weight;
    private $height;
    private $width;
    private $length;

    public function __construct($sku, $name, $price, $type, $size, $weight, $height, $width, $length) {
        parent::__construct($sku, $name, $price ,$type);
        $this->size = $size;
        $this->weight = $weight;
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }
    public function getSize() {
        return $this->size;
    }

    public function setSize($size) {
        $this->size = $size;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }

    public function getHeight() {
        return $this->height;
    }

    public function setHeight($height) {
        $this->height = $height;
    }

    public function getWidth() {
        return $this->width;
    }

    public function setWidth($width) {
        $this->width = $width;
    }

    public function getLength() {
        return $this->length;
    }

    public function setLength($length) {
        $this->length = $length;
    }

    public function display() {
    }
}
?>