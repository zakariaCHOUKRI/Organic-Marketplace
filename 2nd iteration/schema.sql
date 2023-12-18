CREATE TABLE User (
  userId INT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  contactDetails VARCHAR(255) NOT NULL,
  location VARCHAR(255) NOT NULL,
);

CREATE TABLE Product (
  productId INT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description VARCHAR(255),
  price DOUBLE,
  category VARCHAR(255),
  userId INT,
  FOREIGN KEY (userId) REFERENCES User(userId)
);

CREATE TABLE Location (
  locationId INT PRIMARY KEY,
  name VARCHAR(255) NOT NULL
);

CREATE TABLE ProductLocation (
  productId INT,
  locationId INT,
  PRIMARY KEY (productId, locationId),
  FOREIGN KEY (productId) REFERENCES Product(productId),
  FOREIGN KEY (locationId) REFERENCES Location(locationId)
);
