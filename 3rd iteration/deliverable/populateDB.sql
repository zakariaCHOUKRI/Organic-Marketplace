USE OrganicMarketplace;

INSERT INTO Location (locationId, name) VALUES
(0, 'Agadir'),
(1, 'Ait Melloul'),
(2, 'Al Hoceima'),
(3, 'Azemmour'),
(4, 'Benguerir'),
(5, 'Beni Mellal'),
(6, 'Berrechid'),
(7, 'Boujdour'),
(8, 'Casablanca'),
(9, 'Chefchaouen'),
(10, 'Dakhla'),
(11, 'Dcheira'),
(12, 'El Jadida'),
(13, 'Errachidia'),
(14, 'Essaouira'),
(15, 'Fes'),
(16, 'Fkih Ben Salah'),
(17, 'Figuig'),
(18, 'Guelmim'),
(19, 'Guelmim Province'),
(20, 'Ifrane'),
(21, 'Jerada'),
(22, 'Kenitra'),
(23, 'Khemisset'),
(24, 'Khenifra'),
(25, 'Khouribga'),
(26, 'Laayoune'),
(27, 'Larache'),
(28, 'Lixus'),
(29, 'Marrakech'),
(30, 'Meknes'),
(31, 'Moulay Idriss Zerhoun'),
(32, 'Nador'),
(33, 'Ouarzazate'),
(34, 'Oujda'),
(35, 'Rabat'),
(36, 'Safi'),
(37, 'Sale'),
(38, 'Settat'),
(39, 'Sidi Ifni'),
(40, 'Sidi Kacem'),
(41, 'Sidi Slimane'),
(42, 'Skhirat'),
(43, 'Tangier'),
(44, 'Tan-Tan'),
(45, 'Taroudant'),
(46, 'Taza'),
(47, 'Tetouan'),
(48, 'Tiznit'),
(49, 'Youssoufia'),
(50, 'Zagora');

INSERT INTO Product (name, description, price, category, userId, locationId) VALUES
('Fresh Vegetables', 'The freshest vegetables you can find', 19.99, 'Fruits/Vegetables', 1, 11),
('Organic Juice', 'Very healthy juice made with love', 29.99, 'Coffee/Tea/Juice', 1, 4),
('Healthy Moroccan Food', 'Very healthy moroccan dishes', 39.99, 'Prepared Foods', 1, 1),
('Good Vegetables', 'The finest vegetables in Morocco', 49.99, 'Fruits/Vegetables', 2, 4),
('Fresh Juice', 'The freshest juice', 59.99, 'Coffee/Tea/Juice', 2, 11),
('Delicious Moroccan Food', 'Youll never taste better food !', 69.99, 'Prepared Foods', 2, 4),
('Best Vegetables', 'The Best vegetables you can find', 79.99, 'Fruits/Vegetables', 2, 11),
('Best Juice', 'Our juice is the best ever', 89.99, 'Coffee/Tea/Juice', 3, 4),
('Best Moroccan Food', 'The best Moroccan meals', 99.99, 'Prepared Foods', 3, 11),
('Healthy Vegetables', 'The healthiest vegetables you can find', 109.99, 'Fruits/Vegetables', 4, 4);


INSERT INTO ProductImages (productId, imageUrl) VALUES
(1, 'https://img.passeportsante.net/1200x675/2021-05-03/i102192-tomate-nu.webp'),
(1, 'https://img-3.journaldesfemmes.fr/ZfmzxO5Kyg0e3j1URh4V8Mf3slc=/1500x/smart/097777a79f144a048f7008573f8584d5/ccmcms-jdf/27424516.jpg'),
(1, 'https://img.passeportsante.net/1200x675/2021-05-03/i101995-carotte-nu.webp'),
(4, 'https://t3t8k6v8.rocketcdn.me/wp-content/uploads/2020/02/oignon-culture.jpg'),
(7, 'https://img-3.journaldesfemmes.fr/acqDmicY39HFmrY6uv1tBkWLx_Q=/1500x/smart/9a02589b01df4f20b93cea2b74c02916/ccmcms-jdf/10660387.jpg'),
(10, 'https://www.jardiner-malin.fr/wp-content/uploads/2019/10/citrouille-recolte.jpg');


INSERT INTO ProductImages (productId, imageUrl) VALUES
(3, 'https://img.cuisineaz.com/660x660/2017/01/04/i115189-tajine-de-viande-pommes-de-terre-carotte-et-epices.jpeg'),
(3, 'https://p6.storage.canalblog.com/61/63/720124/102852684_o.jpg'),
(6, 'https://tasteofmaroc.com/wp-content/uploads/2021/10/khoubiza-bakoula-moroccan-mallow-salad-1200w-opt.jpg'),
(9, 'https://live.staticflickr.com/65535/52670856808_39d1a48266_c.jpg');


INSERT INTO ProductImages (productId, imageUrl) VALUES
(2, 'https://www.allrecipes.com/thmb/qXBaEIkAqDpDWqAVJbPZs9TxcZw=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/4513616-d1b91430eaab44e49230b21d22b88ba2.jpg'),
(2, 'https://i.pinimg.com/564x/54/66/dc/5466dc8aeaf3631f9ff968b9209f479f.jpg'),
(5, 'https://bewilderedinmorocco.com/wp-content/uploads/2014/09/10343045_323077067850379_6964548403964440504_n.jpg'),
(8, 'https://verygoodrecipes.com/images/blogs/fleur-d-oranger-masala-co/chilled-moroccan-avocado-juice.640x480.jpg');


INSERT INTO User (username, password, email, contactDetails) VALUES
('Zakaria Choukri', '$2y$10$XQ4Bberv1LvJeUKSBAs1gu21ZWIo9RkaKgFpE0Szh3Py9pxiuUC5a', 'a@a.com', '0655695916'),
('Ayman Youss', '$2y$10$JVRaM4BBtpzoK2MfKogeg.AFkT3/kN9xiIMXxKKNA5QuiNzwSK5Ru', 'b@b.com', '0697745310'),
('Maha Hanif', '$2y$10$3OyosoMe9QircmmrnNxUGOkXc8Slnvr0nHcSrwzTe8cp6.oThi5OC', 'c@c.com', '0777794961'),
('d', '$2y$10$9kfnBtG4MkRsWxIdESYBlOyuswLOzFykFU67s1uM6WzOqBAXfF5D.', 'd@d.com', 'd'),
('e', '$2y$10$RaDQ5fBZhxsD/ZU.x9NTgO/XLW7cODqcjs3pNBZInZRY5XYLXOuNC', 'e@e.com', 'e'),
('f', '$2y$10$ON/pTEqJsySveKakrTkfguRcrUJmolkPhMMZf09QAgaIWCZ1kuTny', 'f@f.com', 'f');