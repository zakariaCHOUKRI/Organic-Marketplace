<?php

use PHPUnit\Framework\TestCase;

class LocationDAOTest extends TestCase {
    private $locationDAO;

    protected function setUp(): void {
        $this->locationDAO = new LocationDAO(); // Adjust this if you have a different way to construct your DAO
    }

    public function testAddLocation() {
        $locationName = "Test Location";
        $this->locationDAO->addLocation($locationName);

        // Assuming you have a method to fetch a location by name
        $location = $this->locationDAO->getLocationByName($locationName);
        $this->assertEquals($locationName, $location['name']);
    }

    public function testGetLocationById() {
        $locationId = 1; // Use an existing locationId for testing
        $location = $this->locationDAO->getLocationById($locationId);
        $this->assertEquals($locationId, $location['locationId']);
    }
}
