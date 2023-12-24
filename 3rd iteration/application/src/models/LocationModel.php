<?php

class LocationModel {
    // Properties
    private $locationId;
    private $name;

    // Constructor
    public function __construct($locationId = null, $name = "") {
        $this->locationId = $locationId;
        $this->name = $name;
    }

    // Getters and Setters
    public function getLocationId() {
        return $this->locationId;
    }

    public function setLocationId($locationId) {
        $this->locationId = $locationId;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    // Validation method (example)
    public function isValid() {
        return !empty($this->name);
    }

    // Method to represent object as a string (optional)
    public function __toString() {
        return "Location[ID: $this->locationId, Name: $this->name]";
    }
}
?>
