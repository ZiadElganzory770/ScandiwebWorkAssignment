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
            $sqlDvd = "SELECT * FROM dvd_products";
            $sqlBook = "SELECT * FROM book_products";
            $sqlFurniture = "SELECT * FROM furniture_products";

            $stmtDvd = $this->dbConn->prepare($sqlDvd);
            $stmtBook = $this->dbConn->prepare($sqlBook);
            $stmtFurniture = $this->dbConn->prepare($sqlFurniture);

            $stmtDvd->execute();
            $stmtBook->execute();
            $stmtFurniture->execute();

            $dvdData = $stmtDvd->fetchAll(\PDO::FETCH_ASSOC);
            $bookData = $stmtBook->fetchAll(\PDO::FETCH_ASSOC);
            $furnitureData = $stmtFurniture->fetchAll(\PDO::FETCH_ASSOC);

            // Combine the data from all tables into one array
            $products = array_merge($dvdData, $bookData, $furnitureData);
            return $products;
        }


        public function deleteProducts($productIds) {
            if (empty($productIds)) {
                return;
            }
            
            foreach($productIds as $value){
                switch($value[1]){
                    case 'Dvd':
                        $sql = 'DELETE FROM dvd_products WHERE sku ="'.$value[0].'"';
                        break;
                    case 'Book':
                        $sql = 'DELETE FROM book_products WHERE sku ="'.$value[0].'"';                        break;
                    case 'Furniture':
                        $sql = 'DELETE FROM furniture_products WHERE sku ="'.$value[0].'"';                        break;
                        break;
                    default:
                        return false;
                    }
            }
            // Prepare the SQL statement for deleting products based on IDs
            $stmt = $this->dbConn->prepare($sql);
            $stmt->execute();
        }


        public function addProduct($arr){
            $type = key($arr);
            $sql = '';

            switch($type){
                case 'Dvd':
                    $sql = "INSERT INTO dvd_products (sku, name, price, size, type) VALUES (:sku, :name, :price, :size, :type)";
                    break;
                case 'Book':
                    $sql = "INSERT INTO book_products (sku, name, price, weight, type) VALUES (:sku, :name, :price, :weight, :type)";
                    break;
                case 'Furniture':
                    $sql = "INSERT INTO furniture_products (sku, name, price, height, width, length, type) VALUES (:sku, :name, :price, :height, :width, :length, :type)";
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
                        $stmt->bindParam(':type', $product['type']);
                    } elseif ($type === 'Book') {
                        $stmt->bindParam(':weight', $product['weight']);
                        $stmt->bindParam(':type', $product['type']);
                    } elseif ($type === 'Furniture') {
                        $stmt->bindParam(':height', $product['height']);
                        $stmt->bindParam(':width', $product['width']);
                        $stmt->bindParam(':length', $product['length']);
                        $stmt->bindParam(':type', $product['type']);
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