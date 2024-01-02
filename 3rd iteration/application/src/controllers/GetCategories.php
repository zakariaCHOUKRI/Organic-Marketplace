<?php

$categories = [
    "Fruits/Vegetables",
    "Herbs",
    "Dairy",
    "Eggs",
    "Meat/Poultry",
    "Coffee/Tea/Juice",
    "Snacks",
    "Condiments/Sauces",
    "Prepared Foods",
    "Home/Personal Care",
    "Pet Supplies",
    "Oils",
    "Other"
];

foreach ($categories as $category) {
    echo "<option value='$category'>$category</option>";
}

?>