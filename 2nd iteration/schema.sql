DROP DATABASE IF EXISTS OrganicMarketplace;
CREATE DATABASE IF NOT EXISTS OrganicMarketplace;

USE OrganicMarketplace;

DROP TABLE IF EXISTS User, Product, Location;

CREATE TABLE User (
  userId INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(20) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(50) NOT NULL,
  contactDetails VARCHAR(20) NOT NULL,
  UNIQUE (username),
  UNIQUE (email)
);

CREATE TABLE Product (
  productId INT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description VARCHAR(255),
  price DOUBLE,
  category VARCHAR(255),
  userId INT,
  locationId INT,
  FOREIGN KEY (userId) REFERENCES User(userId),
  FOREIGN KEY (locationId) REFERENCES Location(locationId)
);

CREATE TABLE Location (
  locationId INT PRIMARY KEY,
  name VARCHAR(255) NOT NULL
);