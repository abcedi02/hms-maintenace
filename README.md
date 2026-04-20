# HSM Home Service Maintenance Website

A professional, PHP/MySQLi-powered website for HSM Home Service Maintenance, featuring a modern black and gold design.

## Features

### Public Website
- **Homepage**: Hero carousel, services overview, trust indicators, testimonials
- **Services Page**: Reactive maintenance, planned maintenance, infrastructure services
- **About Page**: Company profile, team, accreditations
- **Case Studies**: Project portfolio with before/after images
- **Industries**: Served industries and sectors
- **News**: Blog and industry insights
- **Careers**: Job listings and application process
- **Testimonials**: Client feedback and reviews
- **Contact**: Contact form with PHP backend

### Admin Dashboard
- **Dashboard**: Overview statistics, recent contacts, service requests
- **Content Management**: Manage services, case studies, news, testimonials
- **Contact Management**: View and manage contact form submissions
- **Settings**: Site configuration and settings

## Brand Identity

- **Primary Color**: Jet Black (#0A0A0A)
- **Accent Color**: Gold (#C9A84C)
- **Supporting Color**: Off-White / Warm Cream (#FAFAF7)
- **Typography**: Montserrat Bold (headings), Inter (body)
- **Logo**: HSM lettermark in gold on black background

## Installation

### 1. Database Setup

Import the database schema:

```bash
mysql -u root -p hsm_maintenance < database/schema.sql
```

Or use phpMyAdmin to import `database/schema.sql`

### 2. Configuration

Update database credentials in `includes/config.php`:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'your_password');
define('DB_NAME', 'hsm_maintenance');
```

### 3. Admin Access

- **Admin URL**: `/admin/login.php`
- **Default Username**: admin
- **Default Password**: admin123

**Important**: Change the default password after first login!

### 4. Web Server

Ensure your web server (Apache/Nginx) is configured to serve PHP files.

## Directory Structure

```
securex-1.0.0/
├── admin/                  # Admin dashboard
│   ├── index.php          # Dashboard home
│   ├── login.php          # Login page
│   └── logout.php         # Logout handler
├── includes/              # PHP includes
│   ├── config.php         # Database configuration
│   ├── header.php         # Site header
│   └── footer.php         # Site footer
├── css/                   # Stylesheets
│   ├── bootstrap.min.css  # Bootstrap framework
│   ├── style.css          # Template styles
│   └── hsm-custom.css     # HSM brand customization
├── js/                    # JavaScript
│   └── main.js            # Main JavaScript
├── lib/                   # Third-party libraries
│   ├── animate/           # Animate.css
│   ├── owlcarousel/       # Owl Carousel
│   ├── lightbox/          # Lightbox
│   └── wow/               # WOW.js
├── img/                   # Images
├── database/              # Database files
│   └── schema.sql         # Database schema
├── index.php              # Homepage
├── about.php              # About page
├── services.php           # Services page
├── contact.php            # Contact page
├── case-studies.php       # Case studies page
├── industries.php         # Industries page
├── news.php               # News page
├── careers.php            # Careers page
├── testimonials.php       # Testimonials page
├── process-contact.php    # Contact form handler
└── process-quote.php      # Quote form handler
```

## Database Schema

The database includes the following tables:

- **users**: Admin and staff accounts
- **services**: Service offerings
- **case_studies**: Project portfolio
- **industries**: Served industries
- **news**: Blog posts
- **testimonials**: Client testimonials
- **careers**: Job listings
- **job_applications**: Job applications
- **contacts**: Contact form submissions
- **service_requests**: Service/helpdesk requests
- **certifications**: Company accreditations
- **settings**: Site configuration

## SEO Optimization

The website includes:

- Semantic HTML structure
- Meta tags for SEO
- Keyword optimization
- Service-based landing pages
- Location-based SEO
- Structured content hierarchy

## Security Features

- Prepared statements for SQL injection prevention
- Input sanitization
- Session management
- Password hashing (bcrypt)
- CSRF protection (to be added)

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

## Customization

### Colors

Edit `css/hsm-custom.css` to modify brand colors:

```css
:root {
    --hsm-primary: #0A0A0A;      /* Jet Black */
    --hsm-accent: #C9A84C;       /* Gold */
    --hsm-support: #FAFAF7;      /* Off-White */
}
```

### Typography

Font families are defined in `includes/header.php`:

```html
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Montserrat:wght@600;700;800&display=swap" rel="stylesheet">
```

## Support

For issues or questions, please contact the development team.

## License

This project is proprietary software for HSM Home Service Maintenance.
