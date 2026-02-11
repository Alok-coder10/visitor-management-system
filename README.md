# 🏫 Visitor Management System

A web-based **Visitor Management System** built using **PHP, MySQL, HTML, CSS, and JavaScript**.  
This system manages visitors, students, staff, and admins through role-based dashboards and QR-based entry/exit tracking.

---

## 🚀 Features

- 🔐 Authentication System
  - Login & Registration
  - Role-based access (Admin, Staff, Student, Visitor)

- 🧑‍💼 Role-Based Dashboards
  - Admin Dashboard
  - Staff Dashboard
  - Student Dashboard
  - Visitor Dashboard

- 📋 Visitor Request Management
  - Submit visit requests
  - Approve / reject requests
  - Track pending and approved visits

- 📊 Live Statistics
  - Fetch visitor statistics dynamically
  - Pending and completed visit tracking

- 📷 QR Code System
  - QR-based visitor verification
  - Scan QR to check-in / check-out

- 🗄️ Database Integration
  - MySQL database for storing users, visits, and logs

---

## 🛠️ Tech Stack

- PHP (Backend)
- MySQL (Database)
- HTML5
- CSS3
- JavaScript
- AJAX
- QR Code Integration

---

## 📂 Project Structure
```
VMS/
│
├── admin.php
├── checkout.php
├── dashboard.php
├── dashboard_staff.php
├── dashboard_student.php
├── dashboard_visitor.php
├── db.php
├── fetch_requests.php
├── fetch_pending_requests.php
├── fetch_stats.php
├── home.html
├── index.html
├── index.php
├── login.php
├── login_submit.php
├── logout.php
├── register.php
├── register_submit.php
├── scan_qr.html
├── script.js
├── style.css
├── update_request.php
├── verify_pass.php
├── visit.sql
├── visitor.php
└── README.md
```

---

## ⚙️ Installation & Setup

### 1️⃣ Clone the Repository

git clone https://github.com/Alok-coder10/visitor-management-system.git

## 2️⃣ Move to Server Directory

Place the project inside:

htdocs (XAMPP)

www (WAMP/LAMP)

## 3️⃣ Create Database

Open phpMyAdmin

Create a database (e.g., visitor_management)

Import the file:
visit.sql

## 4️⃣ Configure Database

Edit db.php:

$conn = new mysqli("localhost", "root", "", "visitor_management");

## 5️⃣ Run the Project

Open your browser and go to:

http://localhost/visitor-management-system/home.html

## 🔑 User Roles & Permissions
| Role    | Access                          |
| ------- | ------------------------------- |
| Admin   | Manage all users and requests   |
| Staff   | Approve / Reject visit requests |
| Student | Create visit requests           |
| Visitor | View visit status & QR          |

## 🔐 Security Features

Session-based authentication

Role validation on dashboards

Password verification system

##🚀 Future Improvements

Email notifications

Admin analytics dashboard

Fully responsive UI

Live QR camera scanner

OTP-based verification

## 👨‍💻 Author

GitHub: https://github.com/Alok-coder10
