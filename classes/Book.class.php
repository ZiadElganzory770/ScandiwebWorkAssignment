<?php
namespace classes;

class Book extends AbstractProduct {
    private $weight;

    public function __construct($sku, $name, $price, $type, $weight) {
        parent::__construct($sku, $name, $price, $type);
        $this->weight = $weight;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }

    public function display() {
        echo '<div class="card">';
        echo '<input type="checkbox" name="delete-checkbox[]" value="'.$this->sku.'"class="delete-checkbox"/>';
        echo '<p>' . $this->sku . '</p>';
        echo '<p>' . $this->name . '</p>';
        echo '<p>' .$this->price.'$' . '</p>';
        echo '<p>Weight: ' . $this->weight .'KG'. '</p>';
        echo '</div>'; 
    }
}
?>