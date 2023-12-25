<?php

use PHPUnit\Framework\TestCase;

class UserDAOTest extends TestCase {
    private $userDAO;

    protected function setUp(): void {
        $this->userDAO = new UserDAO();
    }

    public function testAddUser() {
        $newUser = [
            'username' => 'testuser',
            'password' => 'password123',
            'email' => 'test@example.com',
            'contactDetails' => '1234567890'
        ];
        $this->userDAO->addUser(...array_values($newUser));

        // Assuming you have a method to fetch a user by username
        $user = $this->userDAO->getUserByUsername($newUser['username']);
        $this->assertEquals($newUser['username'], $user['username']);
    }

    public function testGetUserById() {
        $userId = 1; // Use an existing userId for testing
        $user = $this->userDAO->getUserById($userId);
        $this->assertEquals($userId, $user['userId']);
    }
}
