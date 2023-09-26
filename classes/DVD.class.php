<?php
namespace classes;

class DVD extends AbstractProduct {
    private $size;

    public function __construct($sku, $name, $price,$type,$size) {
        parent::__construct($sku, $name, $price,$type);
        $this->size = $size;
    }

    public function getSize() {
        return $this->size;
    }

    public function setSize($size) {
        $this->size = $size;
    }

    public function display() {
        echo '<div class="card">';
        echo '<input type="checkbox" name="delete-checkbox[]" value="'.$this->sku.'"class="delete-checkbox"/>';
        echo '<p>' . $this->sku . '</p>';
        echo '<p>' . $this->name . '</p>';
        echo '<p>' .$this->price.'$' . '</p>';
        echo '<p>Size: ' . $this->size .' MB'. '</p>';
        echo '</div>'; 
    }
}

?>