CREATE DATABASE todo_list;
USE todo_list;

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    status ENUM('pending', 'completed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);

ALTER TABLE tasks ADD COLUMN IF NOT EXISTS status ENUM('pending', 'completed') DEFAULT 'pending';
