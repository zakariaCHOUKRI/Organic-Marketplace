CREATE TABLE User (
  userId INT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  contactDetails VARCHAR(255) NOT NULL,
  locationId INT,
  FOREIGN KEY (locationId) REFERENCES Location(locationId)
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