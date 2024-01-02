<?php

require_once '../models/Database.php';
require_once '../models/LocationModel.php';
require_once '../models/LocationDao.php';

$locationDao = new LocationDao();

$cities = $locationDao->getAllCities();

print_r($cities);

foreach ($cities as $elem) {
    $locId = $elem['locationId'];
    $locName = $elem['name'];
    echo "<option value='$locId'>$locName</option>";
}

?>