<?php

$pdo = new PDO(dsn: 'mysql:host=localhost;dbname=carapp', username: 'root', password: '150793');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->query('
    CREATE TABLE cars (
        `id` INT PRIMARY KEY AUTO_INCREMENT,
        `name` VARCHAR(50) NOT NULL,
        `model` VARCHAR(50) NOT NULL,
        `brand` VARCHAR(50) NOT NULL,
        `price` DECIMAL(10, 2) NOT NULL
    );
');

$pdo->query("
    INSERT INTO cars (`name`, `model`, `brand`, `price`)
    VALUES 
        ('Civic', '2019', 'Honda', 100000),
        ('Corolla', '2019', 'Toyota', 120000),
        ('Cruze', '2019', 'Chevrolet', 110000),
        ('Fusion', '2019', 'Ford', 130000),
        ('Accord', '2019', 'Honda', 140000),
        ('Camry', '2019', 'Toyota', 150000),
        ('Malibu', '2019', 'Chevrolet', 160000),
        ('Focus', '2019', 'Ford', 170000),
        ('City', '2019', 'Honda', 180000),
        ('Yaris', '2019', 'Toyota', 190000),
        ('Impala', '2019', 'Chevrolet', 200000),
        ('Fiesta', '2019', 'Ford', 210000);
");

echo 'Table created and data inserted successfully!';