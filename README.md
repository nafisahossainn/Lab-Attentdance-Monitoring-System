# Student Attendance Management System

A comprehensive web-based student attendance management system built with PHP, MySQL, and modern frontend technologies. This system provides separate interfaces for students and administrators to manage and track lab attendance efficiently.

## Features

### Student Portal
- **Secure Authentication**: Login system with password hashing and session management
- **Dashboard**: Interactive dashboard displaying recent lab activities and attendance status
- **Profile Management**: View detailed student information including institute details, course information, and contact details
- **Attendance Tracking**: 
  - View attendance records by subject and month
  - Visual progress bars showing attendance percentage
  - Detailed attendance history with date-wise records
  - Support for multiple subjects (Operating System, Object Oriented Programming)
- **Enrolled Labs**: View all enrolled lab subjects with subject codes
- **Responsive Design**: Mobile-friendly interface with collapsible sidebar

### Admin Portal
- **Admin Authentication**: Separate secure login for administrators
- **User Management**: Manage student records and attendance data
- **Dashboard Access**: Administrative dashboard for system oversight

## Technology Stack

### Backend
- **PHP**: Server-side scripting
- **MySQL**: Database management
- **Session Management**: Secure user authentication and authorization

### Frontend
- **HTML5 & CSS3**: Modern semantic markup and styling
- **JavaScript (ES6+)**: Dynamic client-side functionality
- **Bootstrap 5**: Responsive UI framework
- **jQuery**: DOM manipulation and AJAX requests
- **Boxicons**: Icon library for UI elements
- **Font Awesome**: Additional icon support

## Project Structure

```
Student Lab Attendance System/
│
├── admin.php                 # Admin authentication logic
├── admin_login.php           # Admin login interface
├── authenticate.php          # User authentication handler
├── config.php                # Database configuration
├── dashboard.php             # Student dashboard
├── login.php                 # Student login page
├── logout.php                # Session termination
├── profile.php               # Student profile page
├── attendance.php            # Attendance details page
├── attendance2.php           # Alternative attendance view
├── enrolled_labs.php         # Enrolled labs listing
├── hasspass.php              # Password hashing utility
├── index.php                 # Entry point with redirect
│
├── css/
│   ├── main.css              # Main dashboard styles
│   ├── login.css             # Login page styles
│   ├── profile.css           # Profile page styles
│   ├── attendance.css        # Attendance page styles
│   └── enrolledLabs.css      # Enrolled labs styles
│
├── js/
│   ├── script.js             # Dashboard functionality
│   ├── attendance.js         # Attendance tracking logic
│   └── atten_details.js      # Attendance details handler
│
├── img/                      # Image assets
│   ├── profile.jpeg
│   ├── bg.jpg
│   └── [subject icons]
│
└── portfolio/                # Student portfolio documents
```

## Installation

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- Web browser (Chrome, Firefox, Safari, Edge)

### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd student-attendance-system
   ```

2. **Database Configuration**
   - Create a MySQL database
   - Update `config.php` with your database credentials:
     ```php
     $servername = "localhost";
     $username = "your_username";
     $password = "your_password";
     $dbname = "your_database";
     ```

3. **Database Schema**
   Create the following tables:

   ```sql
   -- Users table
   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       username VARCHAR(50) UNIQUE NOT NULL,
       password VARCHAR(255) NOT NULL,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );

   -- Admin users table
   CREATE TABLE admin_users (
       admin_id INT AUTO_INCREMENT PRIMARY KEY,
       username VARCHAR(50) UNIQUE NOT NULL,
       admin_name VARCHAR(100) NOT NULL,
       admin_email VARCHAR(100) UNIQUE NOT NULL,
       password_hash VARCHAR(255) NOT NULL,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```

4. **Generate Password Hash**
   - Use `hasspass.php` to generate password hashes
   - Update the password in the file and run it to get the hash
   - Insert the hash into the database

5. **Configure Web Server**
   - Point your web server document root to the project directory
   - Ensure PHP is properly configured
   - Enable required PHP extensions (mysqli, session)

6. **Access the Application**
   - Student Login: `http://your-domain/login.php`
   - Admin Login: `http://your-domain/admin_login.php`

## Default Credentials

### Student Account
- **Username**: (Set in database)
- **Password**: (Set using hasspass.php)

### Admin Account
- **Username**: (Set in database)
- **Email**: (Set in database)
- **Password**: (Set using hasspass.php)

## Database Schema

### Users Table
- `id`: Primary key
- `username`: Unique username
- `password`: Hashed password (bcrypt)
- `created_at`: Account creation timestamp

### Admin Users Table
- `admin_id`: Primary key
- `username`: Admin username
- `admin_name`: Full name
- `admin_email`: Email address
- `password_hash`: Hashed password
- `created_at`: Account creation timestamp

## Security Features

- **Password Hashing**: Uses PHP's `password_hash()` with bcrypt algorithm
- **Password Verification**: Secure password verification with `password_verify()`
- **Session Management**: PHP sessions for user authentication
- **SQL Injection Prevention**: Prepared statements with parameter binding
- **Access Control**: Session-based authorization checks on protected pages
- **XSS Protection**: Input sanitization with `trim()` and proper escaping

## Responsive Design

The application is fully responsive and works seamlessly across:
- Desktop computers (1920px and above)
- Laptops (1024px - 1920px)
- Tablets (768px - 1024px)
- Mobile devices (320px - 768px)

### Mobile Features
- Collapsible sidebar navigation
- Touch-friendly interface
- Optimized layouts for small screens
- Responsive tables and forms

## UI/UX Features

- **Modern Design**: Clean and professional interface
- **Color Scheme**: Blue-based theme with intuitive color coding
- **Icons**: Boxicons and Font Awesome for visual clarity
- **Progress Bars**: Visual representation of attendance percentages
- **Interactive Elements**: Hover effects and smooth transitions
- **Notifications**: Bell icon with notification counter
- **Search Functionality**: Built-in search bar in dashboard

## Attendance Tracking

The system tracks attendance with the following features:

- **Monthly View**: Filter attendance by month
- **Subject-wise Tracking**: Separate tracking for each subject
- **Percentage Calculation**: Automatic calculation of attendance percentage
- **Visual Progress**: Color-coded progress bars
- **Detailed Records**: Date-wise attendance status (Present/Absent)
- **Historical Data**: Access to past attendance records

### Supported Subjects
- Operating System (PCC-CS502)
- Object Oriented Programming (PCC-CS503)

## Configuration

### Session Configuration
Sessions are configured in each PHP file with:
```php
session_start();
```

### Database Connection
Centralized in `config.php` using MySQLi:
```php
$conn = new mysqli($servername, $username, $password, $dbname);
```

## Troubleshooting

### Common Issues

1. **Database Connection Failed**
   - Verify database credentials in `config.php`
   - Ensure MySQL service is running
   - Check database exists and user has proper permissions

2. **Session Issues**
   - Ensure session directory is writable
   - Check PHP session configuration
   - Clear browser cookies and cache

3. **Login Problems**
   - Verify password hash in database
   - Check username spelling
   - Ensure sessions are working properly

4. **Styling Issues**
   - Clear browser cache
   - Check CSS file paths
   - Verify Bootstrap CDN is accessible

## Future Enhancements

- [ ] Email notifications for low attendance
- [ ] Export attendance reports to PDF/Excel
- [ ] Multi-semester support
- [ ] Bulk attendance marking for admins
- [ ] Student attendance analytics dashboard
- [ ] Mobile application
- [ ] API integration for third-party systems
- [ ] Two-factor authentication
- [ ] Password reset functionality
- [ ] Real-time notifications

## Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Developer

**Nafisa Hossain**
- Institute: Budge Budge Institute of Technology
- Course: Bachelor of Technology in Information Technology
- Email: nafisahossain1211@gmail.com

## Acknowledgments

- Bootstrap team for the excellent CSS framework
- Boxicons and Font Awesome for icon libraries
- jQuery team for DOM manipulation library
- PHP and MySQL communities for documentation and support

## Support

For support, email nafisahossain1211@gmail.com or create an issue in the repository.

---

**Note**: This is an educational project developed as part of academic coursework. Please ensure proper security measures are implemented before deploying to production environments.
