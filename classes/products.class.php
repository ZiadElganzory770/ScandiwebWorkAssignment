<?php
    namespace classes;

    use interface\productsInterface;

    require_once 'includes/Autoloader.php';

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
            $type = key($arr);
            $sql = '';

            switch($type){
                case 'Dvd':
                    $sql = "INSERT INTO dvd (sku, name, price, size) VALUES (:sku, :name, :price, :size)";
                    break;
                case 'Book':
                    $sql = "INSERT INTO book (sku, name, price, weight) VALUES (:sku, :name, :price, :weight)";
                    break;
                case 'Furniture':
                    $sql = "INSERT INTO furniture (sku, name, price, height, width, length) VALUES (:sku, :name, :price, :height, :width, :length)";
                    break;
                default:
                    return false;
                }

            // Create a prepared statement to insert data into the 'products' table
            $stmt = $this->dbConn->prepare($sql);
            if($stmt){
                foreach ($arr[$type] as $product) {
                    // Bind parameters for each product
                    $stmt->bindParam(':sku', $product['sku']);
                    $stmt->bindParam(':name', $product['name']);
                    $stmt->bindParam(':price', $product['price']);
        
                    if ($type === 'Dvd') {
                        $stmt->bindParam(':size', $product['size']);
                    } elseif ($type === 'Book') {
                        $stmt->bindParam(':weight', $product['weight']);
                    } elseif ($type === 'Furniture') {
                        $stmt->bindParam(':height', $product['height']);
                        $stmt->bindParam(':width', $product['width']);
                        $stmt->bindParam(':length', $product['length']);
                    }
        
                    // Execute the prepared statement for the current product
                    $stmt->execute();
                }
                return true;
            }else {
                return false;
            }
            // Execute the prepared statement
        }
    }
?>