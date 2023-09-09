<?php
    require_once 'bootstrap.php';
    
    use interface\productsInterface;


    class products implements productsInterface{
        private $dbConn;
        public function __construct() {
            $db = new config();
            $this->dbConn = $db->connect();
        }

        public function getAllData(){
            $sql = 'SELECT * FROM products ORDER BY id';
            $stmt = $this->dbConn->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

        public function addProduct($arr){
            // Create a prepared statement to insert data into the 'products' table
            $stmt = $this->dbConn->prepare("INSERT INTO products ( sku, name, price, size, height, width, length, weight ) 
            VALUES (:sku , :name , :price , :size , :height , :width , :length , :weight)");
            $stmt->bindParam(':sku',$arr['sku']);
            $stmt->bindParam(':name',$arr['name']);
            $stmt->bindParam(':price',$arr['price']);
            $stmt->bindParam(':size',$arr['size']);
            $stmt->bindParam(':height',$arr['height']);
            $stmt->bindParam(':width',$arr['width']);
            $stmt->bindParam(':length',$arr['length']);
            $stmt->bindParam(':weight',$arr['weight']);
            // Execute the prepared statement
            $stmt->execute();
        }
    }
?>