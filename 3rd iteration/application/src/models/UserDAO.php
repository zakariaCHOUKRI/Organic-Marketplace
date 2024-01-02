<?php

class UserDAO {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // Function to add a new user
    public function addUser($username, $password, $email, $contactDetails) {
        $stmt = $this->db->prepare("INSERT INTO User (username, password, email, contactDetails) VALUES (:username, :password, :email, :contactDetails)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT)); // Hashing the password
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':contactDetails', $contactDetails);
        $stmt->execute();
    }

    // Function to update a user
    public function updateUser($userId, $username, $password, $email, $contactDetails) {
        $stmt = $this->db->prepare("UPDATE User SET username = :username, password = :password, email = :email, contactDetails = :contactDetails WHERE userId = :userId");
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT)); // Hashing the password
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':contactDetails', $contactDetails);
        $stmt->execute();
    }

    // Function to delete a user
    public function deleteUser($userId) {
        $stmt = $this->db->prepare("DELETE FROM User WHERE userId = :userId");
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
    }

    // Function to get a user by ID
    public function getUserById($userId) {
        $stmt = $this->db->prepare("SELECT * FROM User WHERE userId = :userId");
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Function to get a user by username
    public function getUserByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM User WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Function to get all users
    public function getAllUsers() {
        $stmt = $this->db->query("SELECT * FROM User");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getContactDetails($username) {

        $querycontactDetails = "SELECT contactDetails FROM User WHERE username = :username";
        $stmtcontactDetails = $this->db->prepare($querycontactDetails);
        $stmtcontactDetails->bindParam(':username', $username, PDO::PARAM_STR);
        $stmtcontactDetails->execute();

        return $stmtcontactDetails->fetchColumn();

    }

    public function getIdFromUsername($username) {
        // Fetch the user's ID based on the username
        $queryUserId = "SELECT userId FROM User WHERE username = :username";
        $stmtUserId = $this->db->prepare($queryUserId);
        $stmtUserId->bindParam(':username', $username, PDO::PARAM_STR);
        $stmtUserId->execute();
        return $stmtUserId->fetchColumn();
    }

    public function getUserObject($username) {
        $stmt = $this->db->prepare("SELECT userId FROM User WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>
