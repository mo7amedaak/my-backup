CREATE DATABASE IF NOT EXISTS test;
USE test;

-- Users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- insert into users(name, email, password) values("eman", "ert@efrg.v", "1564")
-- insert into users(name, email, password) values("eman2", "erxxt@efrg.v", "1564")

-- Categories table
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

-- category => id: 1, name: books
-- products => id: 1, name: data structure, category_id:null
-- delete from categories where id=1;
-- Products table
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    quantity INT not NULL DEFAULT 0,
    category_id INT,
    status enum('exist', 'not_exist') DEFAULT 'not_exist',
    FOREIGN KEY (category_id) REFERENCES categories(id) 
    on DELETE set null
);

-- Orders table
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    total DECIMAL(10,2) DEFAULT 0.00,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE set null
);

-- user create order => product

-- Order_Product (pivot) table
CREATE TABLE order_product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT DEFAULT 1,
    price_at_order DECIMAL(10,2),
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- Users
INSERT INTO users (name, email, password) VALUES
('Alice', 'alice@example.com', 'pass1'),
('Bob', 'bob@example.com', 'pass2'),
('Charlie', 'charlie@example.com', 'pass3'),
('Diana', 'diana@example.com', 'pass4'),
('Eve', 'eve@example.com', 'pass5'),
('Frank', 'frank@example.com', 'pass6'),
('Grace', 'grace@example.com', 'pass7'),
('Hank', 'hank@example.com', 'pass8'),
('Ivy', 'ivy@example.com', 'pass9'),
('Jack', 'jack@example.com', 'pass10');

-- Categories
INSERT INTO categories (name) VALUES
('Electronics'),
('Clothing'),
('Books'),
('Toys'),
('Furniture'),
('Accessories'),
('Home Appliances'),
('Sports'),
('Beauty'),
('Groceries');

-- Products
INSERT INTO products (name, description, price, quantity, category_id) VALUES
('iPhone 14', 'Apple smartphone', 999.99, 10, 1),
('T-Shirt', 'Cotton shirt', 19.99, 50, 2),
('Harry Potter', 'Fantasy novel', 29.99, 30, 3),
('Lego Set', 'Building toy', 49.99, 20, 4),
('Office Chair', 'Ergonomic chair', 89.99, 15, 5),
('Watch', 'Men wristwatch', 149.99, 25, 6),
('Microwave', '700W microwave oven', 120.00, 10, 7),
('Football', 'Standard size ball', 35.50, 40, 8),
('Lipstick', 'Red color', 9.99, 100, 9),
('Olive Oil', '1L bottle', 15.00, 80, 10);


-- Orders (set initial total = 0.00, we will update it later)
INSERT INTO orders (user_id, total) VALUES
(1, 0.00),
(2, 0.00),
(3, 0.00),
(4, 0.00),
(5, 0.00),
(6, 0.00),
(7, 0.00),
(8, 0.00),
(9, 0.00),
(10, 0.00);

-- Order_Product
-- Format: (order_id, product_id, quantity, price_at_order)

INSERT INTO order_product (order_id, product_id, quantity, price_at_order) VALUES
(1, 1, 1, 999.99),   -- total = 999.99
(1, 4, 1, 49.99),    -- +49.99 = 1049.98

(2, 2, 2, 19.99),    -- total = 39.98

(3, 3, 1, 29.99),    -- total = 29.99

(4, 5, 2, 89.99),    -- total = 179.98

(5, 6, 1, 149.99),   -- total = 149.99
(5, 9, 3, 9.99),     -- +29.97 = 179.96

(6, 7, 1, 120.00),   -- total = 120.00

(7, 8, 2, 35.50),    -- total = 71.00

(8, 2, 2, 19.99),    -- total = 39.98

(9, 10, 5, 15.00),   -- total = 75.00

(10, 9, 1, 9.99);    -- total = 9.99


UPDATE orders
SET total = (
    SELECT SUM(quantity * price_at_order)
    FROM order_product
    WHERE order_product.order_id = orders.id
);
