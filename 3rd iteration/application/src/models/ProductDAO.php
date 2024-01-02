<?php

include_once 'Database.php';

class ProductDAO {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // Function to add a new product
    public function addProduct($name, $description, $price, $category, $userId, $locationId) {
        $stmt = $this->db->prepare("INSERT INTO Product (name, description, price, category, userId, locationId) VALUES (:name, :description, :price, :category, :userId, :locationId)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':locationId', $locationId);
        $stmt->execute();
    }

    // Function to update a product
    public function updateProduct($productId, $name, $description, $price, $category, $userId, $locationId) {
        $stmt = $this->db->prepare("UPDATE Product SET name = :name, description = :description, price = :price, category = :category, userId = :userId, locationId = :locationId WHERE productId = :productId");
        $stmt->bindParam(':productId', $productId);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':locationId', $locationId);
        $stmt->execute();
    }

    // Function to delete a product
    public function deleteProduct($productId) {
        $stmt = $this->db->prepare("DELETE FROM Product WHERE productId = :productId");
        $stmt->bindParam(':productId', $productId);
        $stmt->execute();
    }

    // Function to get a product by ID
    public function getProductById($productId) {
        $stmt = $this->db->prepare("SELECT * FROM Product WHERE productId = :productId");
        $stmt->bindParam(':productId', $productId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Function to get all products
    public function getAllProducts() {
        $stmt = $this->db->query("SELECT * FROM Product");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Function to add a new product by a specific user
    public function addProductByUserId($userId, $name, $description, $price, $category, $locationId) {
        $stmt = $this->db->prepare("INSERT INTO Product (userId, name, description, price, category, locationId) VALUES (:userId, :name, :description, :price, :category, :locationId)");
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':locationId', $locationId);
        $stmt->execute();
    }

    function getProductInfoById($productId) {
        // Assuming you have a PDO connection in $db
        $query = "SELECT * FROM products WHERE productId = :productId";
        $stmt = $this->$db->prepare($query);
        $stmt->bindValue(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function getProductImagesById($productId) {
        // Assuming you have a PDO connection in $db
        $query = "SELECT * FROM product_images WHERE productId = :productId";
        $stmt = $this->$db->prepare($query);
        $stmt->bindValue(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
