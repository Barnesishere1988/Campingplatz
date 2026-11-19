CREATE DATABASE IF NOT EXISTS camping CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE camping;

CREATE TABLE IF NOT EXISTS places (
    id INT AUTO_INCREMENT PRIMARY KEY,
    number VARCHAR(30) NOT NULL UNIQUE,
    description VARCHAR(255) NOT NULL,
    type ENUM('Zelt', 'Wohnwagen', 'Wohnmobil') NOT NULL,
    capacity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    removed TINYINT(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    place_id INT NOT NULL,
    guest VARCHAR(120) NOT NULL,
    contact VARCHAR(150) NOT NULL,
    arrival DATE NOT NULL,
    departure DATE NOT NULL,
    people INT NOT NULL,
    nightly_price DECIMAL(10,2) NOT NULL,
    cancelled TINYINT(1) NOT NULL DEFAULT 0,
    INDEX (place_id, cancelled, arrival, departure),
    FOREIGN KEY (place_id) REFERENCES places(id)
) ENGINE=InnoDB;
