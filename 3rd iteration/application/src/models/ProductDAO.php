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
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function getProductImagesById($productId) {
        // Assuming you have a PDO connection in $db
        $query = "SELECT * FROM productimages WHERE productId = :productId";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function fetchProductInformation($productId) {
        // Query to fetch product information
        $productQuery = "SELECT p.*, u.contactDetails 
        FROM Product p
        JOIN User u ON p.userId = u.userId
        WHERE p.productId = :productId";

        $productStmt = $this->db->prepare($productQuery);
        $productStmt->bindValue(':productId', $productId, PDO::PARAM_INT);
        $productStmt->execute();

        return $productStmt->fetch(PDO::FETCH_ASSOC);
    }

    function fetchSearchProducts($search, $location, $category) {

        if ($location == '23102003') {
            $locationFilter = '';
        } else {
            $locationFilter = ' AND l.locationId = :location';
        }
        
        if ($category == '23102003') {
            $categoryFilter = '';
        } else {
            $categoryFilter = ' AND p.category = :category';
        }
        
        $query = "SELECT
                p.productId,
                p.name,
                p.description,
                p.price,
                p.category,
                l.name AS locationName,
                pi.imageUrl
            FROM Product p
            JOIN Location l ON p.locationId = l.locationId
            LEFT JOIN (
                SELECT productId, MIN(imageUrl) AS imageUrl
                FROM ProductImages
                GROUP BY productId
            ) pi ON p.productId = pi.productId
            WHERE 
                (p.name LIKE :search OR p.description LIKE :search)" . $locationFilter . $categoryFilter;
        
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        
        if ($location != '23102003') {
            $stmt->bindValue(':location', $location, PDO::PARAM_INT);
        }
        
        if ($category != '23102003') {
            $stmt->bindValue(':category', $category, PDO::PARAM_STR);
        }
        
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchUserProducts($userId) {
        // Fetch the user's products
        $queryProducts = "SELECT * FROM Product WHERE userId = :userId";
        $stmtProducts = $this->db->prepare($queryProducts);
        $stmtProducts->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmtProducts->execute();
        return $stmtProducts->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getImageURLs($productId) {
        $queryProductImages = "SELECT imageUrl FROM ProductImages WHERE productId = :productId";
        $stmtProductImages = $this->db->prepare($queryProductImages);
        $stmtProductImages->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmtProductImages->execute();
        return $stmtProductImages->fetchAll(PDO::FETCH_COLUMN);
    }

    function updateProductTable($name, $description, $price, $category, $userId, $locationId, $productId) {
        $stmt = $this->db->prepare("UPDATE Product SET name = ?, description = ?, price = ?, category = ?, userId = ?, locationId = ? WHERE productId = ?");
        $stmt->execute([$name, $description, $price, $category, $userId, $locationId, $productId]);
    }

    function deleteExistingImages($productId) {
        $stmt = $this->db->prepare("DELETE FROM ProductImages WHERE productId = ?");
        $stmt->execute([$productId]);
    }

    function insertNewImages($imageLinksArray, $productId) {
        $stmt = $this->db->prepare("INSERT INTO ProductImages (productId, imageUrl) VALUES (?, ?)");
        foreach ($imageLinksArray as $imageLink) {
            $stmt->execute([$productId, $imageLink]);
        }
    }


    function delete($productId, $userId) {
        // Delete from the Product table
        $stmt = $this->db->prepare("DELETE FROM Product WHERE productId = ? AND userId = ?");
        $stmt->execute([$productId, $userId]);
    }

    function deleteImages($productId) {
        // Delete from the ProductImages table
        $stmt = $this->db->prepare("DELETE FROM ProductImages WHERE productId = ?");
        $stmt->execute([$productId]);
    }

    function handleCreation($name, $description, $price, $category, $userId, $locationId, $imageLinksArray) {
        // Insert into the Product table
        $stmt = $this->db->prepare("INSERT INTO Product (name, description, price, category, userId, locationId) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $description, $price, $category, $userId, $locationId]);

        // Get the productId of the inserted row
        $productId = $this->db->lastInsertId();

        // Insert into the ProductImages table
        $stmt = $this->db->prepare("INSERT INTO ProductImages (productId, imageUrl) VALUES (?, ?)");
        foreach ($imageLinksArray as $imageLink) {
            $stmt->execute([$productId, $imageLink]);
        }
    }

}

?>
