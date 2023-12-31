<?php

namespace classes;

class Furniture extends AbstractProduct {
    private $height;
    private $width;
    private $length;

    public function __construct($sku, $name, $price, $type, $height, $width, $length) {
        parent::__construct($sku, $name, $price, $type);
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
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
        echo '<div class="card">';
        echo '<input type="checkbox" name="delete-checkbox[]" value="'.$this->sku.'"class="delete-checkbox"/>';
        echo '<p>' . $this->sku . '</p>';
        echo '<p>' . $this->name . '</p>';
        echo '<p>' .$this->price.'$' . '</p>';
        echo '<p>Dimensions: ' . $this->height .'x'.$this->width.'x'.$this->length .' MB'. '</p>';
        echo '</div>'; 
    }
}

?>