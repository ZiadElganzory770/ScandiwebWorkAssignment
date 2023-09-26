<?php
namespace interface;
interface productsInterface{
    public function getDVDData();
    public function getFurnitureData();
    public function getBookData();
    public function addProduct($arr);
}
?>