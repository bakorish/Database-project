# AI Learning Resource Tracker 🤖

**AI Learning Resource Tracker** is a full-stack web application built with **PHP** and **MySQL** that helps learners organize and track their AI learning journey. Users can register an account, log in, save learning resources (courses, articles, videos, etc.) along with the platform they found them on, and monitor their overall learning progress through a personal dashboard.

Developed by **Team_MaverickS**.

## ✨ Features

- **User Authentication** — Sign up and log in with email and password using session-based authentication. Duplicate emails are rejected at registration.
- **Personal Dashboard** — Displays a welcome message and a live progress summary with cards showing the total number of saved resources and counts by type (Courses, Articles, Videos).
- **Add Resources** — Save a learning resource with a title, type (e.g., Course, Article, Video), and platform (e.g., Coursera, YouTube).
- **View Resources** — Browse all of your saved resources in a table, including the date each one was added.
- **Logout** — Securely end the session and return to the login page.

## 🛠️ Tech Stack

| Layer     | Technology                          |
|-----------|-------------------------------------|
| Frontend  | HTML5, CSS3                         |
| Backend   | PHP (mysqli, prepared statements)   |
| Database  | MySQL (InnoDB, utf8mb4)             |
| Auth      | PHP Sessions                        |

## 📁 Project Structure

```
database-project/
├── index.html              # Landing page with Login / Sign Up options
├── signup.html / signup.php        # Registration form and handler
├── login.html / login.php          # Login form and handler
├── dashboard.php           # Progress dashboard (stats cards)
├── add_resource.html / add_resource.php   # Add a new learning resource
├── view_resource.php       # Table of all saved resources
├── logout.php              # Session logout
├── db.php                  # MySQL database connection
├── style.css               # Shared styling
└── ai_learning_tracker.sql # Database schema (import into MySQL)
```

## 🗄️ Database Schema

Database name: `ai_learning_tracker`

- **`users`** — `id` (PK, auto-increment), `name`, `email` (unique), `password`
- **`resources`** — `id` (PK, auto-increment), `user_id` (foreign key → `users.id`), `title`, `type`, `platform`, `created_at` (timestamp, defaults to current time)

Each user only sees and manages their own resources; all queries are scoped by the logged-in user's ID.

## 🚀 Setup & Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/bakorish/database-project.git
   ```
2. **Import the database** — Open phpMyAdmin (or any MySQL client) and import `ai_learning_tracker.sql`. This creates the `ai_learning_tracker` database with both tables.
3. **Configure the connection** — Update the credentials in `db.php` if your MySQL setup differs from the defaults (`localhost`, user `root`, empty password).
4. **Run the app** — Place the project inside your web server's document root (e.g., `htdocs` for XAMPP) and open:
   ```
   http://localhost/database-project/index.html
   ```
5. **Sign up** — Create an account and start tracking your AI learning resources! 🎯
