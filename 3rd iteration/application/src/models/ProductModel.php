<?php

class ProductModel {
    // Properties corresponding to the Product table fields
    private $productId;
    private $name;
    private $description;
    private $price;
    private $category;
    private $userId;
    private $locationId;

    // Constructor
    public function __construct($productId = null, $name = "", $description = "", $price = 0.0, $category = "", $userId = null, $locationId = null) {
        $this->productId = $productId;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->category = $category;
        $this->userId = $userId;
        $this->locationId = $locationId;
    }

    // Getters and Setters for each property
    public function getProductId() {
        return $this->productId;
    }

    public function setProductId($productId) {
        $this->productId = $productId;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function getLocationId() {
        return $this->locationId;
    }

    public function setLocationId($locationId) {
        $this->locationId = $locationId;
    }

    // Additional methods for business logic, validation, etc., can be added here
}

?>
