CREATE DATABASE IF NOT EXISTS reread_bookstore
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE reread_bookstore;

CREATE TABLE IF NOT EXISTS users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role ENUM('customer', 'admin') NOT NULL DEFAULT 'customer',
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS books (
  book_id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(200) NOT NULL,
  author VARCHAR(150) NOT NULL,
  category VARCHAR(100) NOT NULL,
  description TEXT NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  image VARCHAR(255) NOT NULL,
  stock INT NOT NULL DEFAULT 0,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS cart (
  cart_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  book_id INT NOT NULL,
  quantity INT NOT NULL DEFAULT 1,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_cart_user FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
  CONSTRAINT fk_cart_book FOREIGN KEY (book_id) REFERENCES books(book_id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS orders (
  order_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  total_amount DECIMAL(10,2) NOT NULL,
  order_status ENUM('pending', 'processing', 'completed', 'cancelled') NOT NULL DEFAULT 'pending',
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_orders_user FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS order_items (
  order_item_id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT NOT NULL,
  book_id INT NOT NULL,
  quantity INT NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  CONSTRAINT fk_order_items_order FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE,
  CONSTRAINT fk_order_items_book FOREIGN KEY (book_id) REFERENCES books(book_id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO users (full_name, email, password, role)
VALUES ('Admin User', 'admin@reread.com', '$2y$12$Umzc6Us3Va2u076XqFhAROtKhkzPRCJzgk3XS/L2ycKiKk0mpe3Wa', 'admin')
ON DUPLICATE KEY UPDATE role = 'admin';

INSERT INTO books (title, author, category, description, price, image, stock) VALUES
('The Little Prince', 'Antoine de Saint-Exupery', 'Fiction', 'A classic used book in good condition.', 850.00, 'book1.jpg', 5),
('Atomic Habits', 'James Clear', 'Self Help', 'Pre-owned copy with minor shelf wear.', 1200.00, 'book2.jpg', 3),
('Pride and Prejudice', 'Jane Austen', 'Classic', 'Readable used copy for classic literature lovers.', 700.00, 'book3.jpg', 4);
