<?php

use PHPUnit\Framework\TestCase;

class ProductDAOTest extends TestCase {
    private $productDAO;

    protected function setUp(): void {
        $this->productDAO = new ProductDAO();
    }

    public function testAddProduct() {
        $newProduct = [
            'name' => 'Test Product',
            'description' => 'Description',
            'price' => 10.0,
            'category' => 'TestCategory',
            'userId' => 1, // Use an existing userId
            'locationId' => 1 // Use an existing locationId
        ];
        $this->productDAO->addProduct(...array_values($newProduct));

        // Assuming you have a method to fetch a product by name
        $product = $this->productDAO->getProductByName($newProduct['name']);
        $this->assertEquals($newProduct['name'], $product['name']);
    }

    public function testGetProductById() {
        $productId = 1; // Use an existing productId for testing
        $product = $this->productDAO->getProductById($productId);
        $this->assertEquals($productId, $product['productId']);
    }
}
