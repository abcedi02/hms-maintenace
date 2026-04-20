-- HSM Home Service Maintenance Database Schema
-- Created: April 2026

-- Create Database
CREATE DATABASE IF NOT EXISTS hsm_maintenance;
USE hsm_maintenance;

-- Users Table (Admin & Staff)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    role ENUM('admin', 'staff', 'manager') DEFAULT 'staff',
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Services Table
CREATE TABLE services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    category ENUM('reactive', 'planned', 'infrastructure', 'project') NOT NULL,
    description TEXT,
    content LONGTEXT,
    icon VARCHAR(100),
    image VARCHAR(255),
    featured TINYINT(1) DEFAULT 0,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Case Studies / Projects Table
CREATE TABLE case_studies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    client_name VARCHAR(255),
    industry VARCHAR(100),
    location VARCHAR(100),
    description TEXT,
    content LONGTEXT,
    challenges TEXT,
    solutions TEXT,
    results TEXT,
    before_image VARCHAR(255),
    after_image VARCHAR(255),
    completion_date DATE,
    duration VARCHAR(100),
    value VARCHAR(100),
    team_size VARCHAR(50),
    featured TINYINT(1) DEFAULT 0,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Industries Table
CREATE TABLE industries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) UNIQUE NOT NULL,
    description TEXT,
    icon VARCHAR(100),
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- News / Blog Table
CREATE TABLE news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    excerpt TEXT,
    content LONGTEXT,
    featured_image VARCHAR(255),
    author_id INT,
    category VARCHAR(100),
    status ENUM('draft', 'published') DEFAULT 'draft',
    published_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE SET NULL
);

-- Testimonials Table
CREATE TABLE testimonials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_name VARCHAR(255) NOT NULL,
    company VARCHAR(255),
    position VARCHAR(100),
    testimonial TEXT NOT NULL,
    rating INT DEFAULT 5,
    image VARCHAR(255),
    featured TINYINT(1) DEFAULT 0,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Careers / Job Listings Table
CREATE TABLE careers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    department VARCHAR(100),
    location VARCHAR(100),
    employment_type ENUM('full-time', 'part-time', 'contract') DEFAULT 'full-time',
    description TEXT,
    requirements TEXT,
    responsibilities TEXT,
    benefits TEXT,
    salary_range VARCHAR(100),
    status ENUM('open', 'closed') DEFAULT 'open',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Job Applications Table
CREATE TABLE job_applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    job_id INT NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    cover_letter TEXT,
    resume_path VARCHAR(255),
    status ENUM('pending', 'reviewed', 'interview', 'rejected', 'hired') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (job_id) REFERENCES careers(id) ON DELETE CASCADE
);

-- Contact Forms / Leads Table
CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    service_interest VARCHAR(100),
    message TEXT,
    status ENUM('new', 'contacted', 'qualified', 'converted', 'closed') DEFAULT 'new',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Service Requests / Helpdesk Table
CREATE TABLE service_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    request_number VARCHAR(50) UNIQUE NOT NULL,
    client_name VARCHAR(255) NOT NULL,
    client_email VARCHAR(100) NOT NULL,
    client_phone VARCHAR(20),
    service_type ENUM('reactive', 'planned', 'emergency', 'infrastructure') NOT NULL,
    priority ENUM('low', 'medium', 'high', 'urgent') DEFAULT 'medium',
    description TEXT NOT NULL,
    address TEXT,
    preferred_date DATE,
    assigned_to INT,
    status ENUM('pending', 'assigned', 'scheduled', 'in_progress', 'completed', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (assigned_to) REFERENCES users(id) ON DELETE SET NULL
);

-- Certifications / Accreditations Table
CREATE TABLE certifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    issuing_organization VARCHAR(255),
    certificate_number VARCHAR(100),
    valid_from DATE,
    valid_until DATE,
    image VARCHAR(255),
    description TEXT,
    status ENUM('active', 'expired') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Settings Table (for CMS)
CREATE TABLE settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(100) UNIQUE NOT NULL,
    setting_value TEXT,
    setting_type ENUM('text', 'textarea', 'number', 'boolean', 'image') DEFAULT 'text',
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert Default Admin User (password: admin123)
INSERT INTO users (username, email, password, full_name, role, status) VALUES
('admin', 'admin@hsm-maintenance.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrator', 'admin', 'active');

-- Insert Default Services
INSERT INTO services (title, slug, category, description, icon, featured, status) VALUES
('Reactive Maintenance', 'reactive-maintenance', 'reactive', 'On-demand repair and maintenance services for urgent issues. Our 24/7 response team ensures quick resolution of emergencies.', 'fa-tools', 1, 'active'),
('Planned Maintenance', 'planned-maintenance', 'planned', 'Preventive maintenance programs to keep your property in optimal condition and avoid costly repairs.', 'fa-calendar-check', 1, 'active'),
('Infrastructure Services', 'infrastructure-services', 'infrastructure', 'End-to-end infrastructure delivery from design and build to maintenance and upgrades.', 'fa-building', 1, 'active'),
('Project Management', 'project-management', 'project', 'Comprehensive project management for refurbishment and construction projects with full lifecycle oversight.', 'fa-project-diagram', 0, 'active'),
('Electrical Compliance', 'electrical-compliance', 'planned', 'Full electrical inspections, testing, and compliance certification to meet safety standards.', 'fa-bolt', 0, 'active'),
('Emergency Response', 'emergency-response', 'reactive', 'Rapid emergency response team available 24/7 for critical maintenance issues.', 'fa-exclamation-triangle', 0, 'active');

-- Insert Default Settings
INSERT INTO settings (setting_key, setting_value, setting_type) VALUES
('site_name', 'HSM Home Service Maintenance', 'text'),
('site_tagline', 'Professional Maintenance Services You Can Trust', 'text'),
('contact_phone', '+44 20 1234 5678', 'text'),
('contact_email', 'info@hsm-maintenance.com', 'text'),
('contact_address', '123 Business Park, London, UK', 'textarea'),
('working_hours', 'Mon - Fri : 8AM - 6PM', 'text'),
('social_facebook', 'https://facebook.com/hsm-maintenance', 'text'),
('social_twitter', 'https://twitter.com/hsm-maintenance', 'text'),
('social_linkedin', 'https://linkedin.com/company/hsm-maintenance', 'text'),
('social_instagram', 'https://instagram.com/hsm-maintenance', 'text');
