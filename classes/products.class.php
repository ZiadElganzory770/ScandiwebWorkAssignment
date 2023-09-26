<?php
    namespace classes;

    use interface\productsInterface;

    class products implements productsInterface{
        private $dbConn;
        public function __construct() {
            $db = new config();
            $this->dbConn = $db->connect();
        }

        public function getDVDData(){
            $sqlDvd = "SELECT * FROM products WHERE type='Dvd'";
            $stmtDvd = $this->dbConn->prepare($sqlDvd);
            $stmtDvd->execute();
            $dvdData = $stmtDvd->fetchAll(\PDO::FETCH_ASSOC);
            return $dvdData;
        }

        public function getFurnitureData(){
            $sqlFurniture = "SELECT * FROM products WHERE type='Furniture'";
            $stmtFurniture = $this->dbConn->prepare($sqlFurniture);
            $stmtFurniture->execute();
            $furnitureData = $stmtFurniture->fetchAll(\PDO::FETCH_ASSOC);
            return $furnitureData;
        }

        public function getBookData(){
            $sqlBook = "SELECT * FROM products WHERE type='Book'";
            $stmtBook = $this->dbConn->prepare($sqlBook);
            $stmtBook->execute();
            $bookData = $stmtBook->fetchAll(\PDO::FETCH_ASSOC);
            return $bookData;
        }


        public function deleteProducts($productIds) {
            if (empty($productIds)) {
                return;
            }else{
                foreach($productIds as $value){  

                    $sql = 'DELETE FROM products WHERE sku ="'.$value.'"';

                }

                $stmt = $this->dbConn->prepare($sql);

                $stmt->execute();
            }
        }


        public function addProduct($product){
            try{
                $sql = '';
                $sql = "INSERT INTO products (sku, name, price, type, size, weight, height, width, length) VALUES(:sku, :name, :price, :type, :size, :weight, :height, :width, :length)";
                $stmt = $this->dbConn->prepare($sql);
                if($stmt){
                    $stmt->bindParam(':sku', $product['sku']);
                    $stmt->bindParam(':name', $product['name']);
                    $stmt->bindParam(':price', $product['price']);
                    $stmt->bindParam(':type', $product['type']);
                    $stmt->bindParam(':size', $product['size']);
                    $stmt->bindParam(':weight', $product['weight']);
                    $stmt->bindParam(':height', $product['height']);
                    $stmt->bindParam(':width', $product['width']);
                    $stmt->bindParam(':length', $product['length']);
                    $stmt->execute();
                    return true;
                }else {
                    return false;
                }
    
            }catch(PDOExeption $e){
                error_log('PDOException: ' . $e->getMessage());
                echo 'The SKU you entered already exists';
            }
        }
    }
?>