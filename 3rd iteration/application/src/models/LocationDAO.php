<?php

class LocationDAO {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // Function to add a new location
    public function addLocation($name) {
        $stmt = $this->db->prepare("INSERT INTO Location (name) VALUES (:name)");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
    }

    // Function to update a location
    public function updateLocation($locationId, $newName) {
        $stmt = $this->db->prepare("UPDATE Location SET name = :name WHERE locationId = :locationId");
        $stmt->bindParam(':name', $newName, PDO::PARAM_STR);
        $stmt->bindParam(':locationId', $locationId, PDO::PARAM_INT);
        $stmt->execute();
    }

    // Function to delete a location
    public function deleteLocation($locationId) {
        $stmt = $this->db->prepare("DELETE FROM Location WHERE locationId = :locationId");
        $stmt->bindParam(':locationId', $locationId, PDO::PARAM_INT);
        $stmt->execute();
    }

    // Function to get a location by ID
    public function getLocationById($locationId) {
        $stmt = $this->db->prepare("SELECT * FROM Location WHERE locationId = :locationId");
        $stmt->bindParam(':locationId', $locationId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Function to get all locations
    public function getAllLocations() {
        $stmt = $this->db->query("SELECT * FROM Location");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLocationByName($name) {
        $stmt = $this->db->prepare("SELECT * FROM Location WHERE name = :name");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
