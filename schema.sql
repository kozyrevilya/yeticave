CREATE DATABASE yeticave CHARACTER SET = utf8;

USE yeticave;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255),
  name VARCHAR(255),
  password VARCHAR(255),
  avatar VARCHAR(255),
  created_at TIMESTAMP,
  updated_at TIMESTAMP
);

CREATE TABLE categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  created_at TIMESTAMP,
  updated_at TIMESTAMP
);

CREATE TABLE lots (
  id INT AUTO_INCREMENT PRIMARY KEY,
  owner_id INT,
  category_id INT,
  name VARCHAR(255),
  price VARCHAR(255),
  image VARCHAR(255),
  description VARCHAR(1000),
  created_at TIMESTAMP,
  updated_at TIMESTAMP,
  FOREIGN KEY (owner_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

CREATE TABLE bets (
  id INT AUTO_INCREMENT PRIMARY KEY,
  owner_id INT,
  lot_id INT,
  price VARCHAR(255),
  created_at TIMESTAMP,
  updated_at TIMESTAMP,
  FOREIGN KEY (owner_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY (lot_id) REFERENCES lots(id) ON DELETE CASCADE
);

CREATE INDEX category_name ON categories(name);
CREATE UNIQUE INDEX user_email ON users(email);
