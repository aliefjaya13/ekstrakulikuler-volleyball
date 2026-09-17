# ekstrakulikuler-volleyball
platfrom web membantu siswa dalam kegiatan ekstrakulikuler volleyball smexapro 2026, hasil gabut saja dan beberapa ada yang salah kaya logo gitu ehehe

# Ekstrakurikuler Voli Management

A full-stack Laravel application for managing a school volleyball extracurricular program. This project is designed as a portfolio-ready system for tracking members, managing training schedules, recording attendance, and monitoring athlete performance.

## Project Overview

This application is built for three user roles:

- Admin: manages users and schedule data
- Coach: records attendance and evaluates athlete performance
- Member: views attendance activity and ranking position

The project demonstrates practical full-stack development with Laravel, Blade templates, role-based authorization, data validation, and dashboard reporting.

## Key Features

- Role-based login and dashboard access for admin, coach, and member
- User management for school extracurricular staff and participants
- Schedule management for training sessions
- Attendance recording and status tracking
- Score evaluation and performance monitoring
- Ranking leaderboard for member progress
- Clean responsive UI tailored for school use
- SQLite local database for fast setup and easy demo usage

## Tech Stack

- Laravel 12
- PHP 8.2+
- SQLite
- Bootstrap 5
- Blade templating

## Demo Credentials

- Admin: admin@voli.com / password123
- Coach: coach@voli.com / password123
- Member: member@voli.com / password123

## Local Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Then open:

```text
http://localhost:8000/login
```

## Project Structure

- `app/Http/Controllers` — controllers for dashboard, auth, admin, coach, and member features
- `app/Models` — Eloquent models for users, schedules, attendance, evaluations, and ranking
- `database/migrations` — database schema definition
- `database/seeders` — demo data for admin, coach, and members
- `resources/views` — Blade views for login, dashboard, and management pages
- `routes/web.php` — application routes and role middleware configuration

## Why This Project Is Good for Portfolio

This project highlights several important real-world software engineering skills:

- full-stack Laravel development
- authentication and authorization patterns
- recurring business workflow logic
- dashboard and data reporting UI
- project organization and clean folder structure
- practical CRUD-based application design

## Screenshot / Demo Notes

The project is suitable for showcasing a school-based operational system that could be expanded into a more complete sports management application.

## License

This project is intended for learning and portfolio purposes.
b88e71f (alhamdulillah)