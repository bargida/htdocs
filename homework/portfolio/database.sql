CREATE DATABASE IF NOT EXISTS portfolio_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE portfolio_db;

-- Admin users
CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Default admin: admin / admin123
INSERT INTO admins (username, password) VALUES
('admin', '$2y$10$pg3a/fYV7b2WkWvvrNAwT.dUgHB1pHuKcLoGESa39T6j2i/uqS/te');

-- About info
CREATE TABLE IF NOT EXISTS about (
    id INT AUTO_INCREMENT PRIMARY KEY,
    bio_uz TEXT,
    bio_en TEXT,
    education_uz TEXT,
    education_en TEXT,
    experience_uz TEXT,
    experience_en TEXT,
    profile_image VARCHAR(255),
    resume_file VARCHAR(255),
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO about (bio_uz, bio_en) VALUES
('Men professional web dasturchiman.', 'I am a professional web developer.');

-- Skills
CREATE TABLE IF NOT EXISTS skills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    percentage INT DEFAULT 0,
    icon VARCHAR(100),
    sort_order INT DEFAULT 0
);

INSERT INTO skills (name, percentage, icon, sort_order) VALUES
('PHP', 90, 'fab fa-php', 1),
('JavaScript', 85, 'fab fa-js', 2),
('MySQL', 80, 'fas fa-database', 3),
('Python/Django', 75, 'fab fa-python', 4),
('HTML/CSS', 95, 'fab fa-html5', 5),
('AI/ML', 70, 'fas fa-robot', 6);

-- Blog posts
CREATE TABLE IF NOT EXISTS blogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title_uz VARCHAR(255) NOT NULL,
    title_en VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    short_desc_uz TEXT,
    short_desc_en TEXT,
    content_uz LONGTEXT,
    content_en LONGTEXT,
    image VARCHAR(255),
    is_published TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Projects
CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name_uz VARCHAR(255) NOT NULL,
    name_en VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    description_uz TEXT,
    description_en TEXT,
    technologies VARCHAR(500),
    github_link VARCHAR(500),
    live_link VARCHAR(500),
    image VARCHAR(255),
    is_featured TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Contact messages
CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    is_read TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
