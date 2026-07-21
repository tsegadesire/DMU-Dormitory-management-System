# DMU Dormitory Management System

A web-based Dormitory Management System built for **Debre Markos University**, designed to digitize dorm assignment, maintenance requests, and proctor management for students, admins, and staff.

## Features

- **Authentication** — Login, logout, and password recovery (`login.php`, `forgot.php`, password change for students)
- **Student Portal**
  - View room/dorm assignment
  - Request a room/proctor assignment
  - Submit maintenance requests
  - View maintenance request status
  - Change account password
- **Admin Panel** — Manage dormitory operations and accounts
- **Proctor Manager** — Manage proctor assignments
- **Maintenance Module**
  - View incoming maintenance requests
  - Mark requests as complete
  - Manage maintenance staff accounts
- **Static Pages** — About, Services, Contact

## Tech Stack

- **Backend:** PHP (procedural, `mysqli` for DB access)
- **Database:** MySQL (schema + seed data in `dmudms/dmudorm.sql`)
- **Frontend:** HTML, CSS

## Project Structure

```
dmudms/
├── Admin/              # Admin-side management
├── Maintain/           # Maintenance staff module
│   ├── ManageAccount.php
│   ├── viewRequest.php
│   └── complete.php
├── ProctorManager/      # Proctor management module
├── Student/             # Student portal
│   ├── requestMaintain.php
│   ├── requestPro.php
│   ├── viewAssignment.php
│   ├── viewMn.php
│   ├── viewpro.php
│   └── changePass.php
├── proctor/             # Proctor views
├── image/, img/         # Static assets
├── connect.php          # Database connection
├── login.php, login1.php, logout.php, forgot.php
├── index.php            # Landing page
├── about.php, services.php, contact.php
├── header.php, footer.php
├── style.css
└── dmudorm.sql          # Database schema & seed data
```

## Getting Started

### Prerequisites

- PHP (with the `mysqli` extension)
- MySQL/MariaDB
- A local server stack (e.g. XAMPP, WAMP, or LAMP)

### Setup

1. Clone the repository:
   ```bash
   git clone https://github.com/tsegadesire/DMU-Dormitory-management-System.git
   ```
2. Place the `dmudms` folder in your server's web root (e.g. `htdocs` for XAMPP).
3. Create a MySQL database named `dmudorm` and import the schema:
   ```bash
   mysql -u root -p dmudorm < dmudms/dmudorm.sql
   ```
4. Update the database credentials in `dmudms/connect.php` if needed (default: host `localhost`, user `root`, no password).
5. Start your server (Apache + MySQL) and navigate to `http://localhost/dmudms/index.php`.

## Author

**Tsega Desire**
- GitHub: [@tsegadesire](https://github.com/tsegadesire)
