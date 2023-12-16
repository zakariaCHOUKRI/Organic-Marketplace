CREATE TABLE User (
  userId INT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL
);

CREATE TABLE Seller (
  sellerId INT PRIMARY KEY,
  contactDetails VARCHAR(255) NOT NULL,
  userId INT,
  FOREIGN KEY (userId) REFERENCES User(userId)
);

CREATE TABLE Buyer (
  buyerId INT PRIMARY KEY,
  location VARCHAR(255) NOT NULL,
  userId INT,
  FOREIGN KEY (userId) REFERENCES User(userId)
);

CREATE TABLE Product (
  productId INT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description VARCHAR(255),
  price DOUBLE,
  category VARCHAR(255),
  sellerId INT,
  FOREIGN KEY (sellerId) REFERENCES Seller(sellerId)
);

CREATE TABLE Location (
  locationId INT PRIMARY KEY,
  name VARCHAR(255) NOT NULL
);

CREATE TABLE OnlinePlatform (
  platformId INT PRIMARY KEY
);

CREATE TABLE ProductLocation (
  productId INT,
  locationId INT,
  PRIMARY KEY (productId, locationId),
  FOREIGN KEY (productId) REFERENCES Product(productId),
  FOREIGN KEY (locationId) REFERENCES Location(locationId)
);
