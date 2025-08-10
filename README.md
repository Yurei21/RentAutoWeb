# RentAuto - Car Rental System

RentAuto is a full-stack car rental application built with Laravel 12, MySQL, React, and Inertia.js. It features multi-authentication for both users and admins, allowing seamless management and rental operations.

## Features

- **Multi-auth system:** Separate login and dashboards for users and admins
- **User management:** Registration, profile management, password resets, email verification
- **Admin management:** Admin login, profile, password resets, email verification
- **Vehicle management:** CRUD operations on vehicles and their maintenance records
- **Rental management:** Users can rent vehicles, track rental status, and payments
- **Payments:** Support for multiple payment methods with tracking of fees and status
- **Document uploads:** Users can upload required documents (Driver License, Passport, ID Card)
- **Session management:** Secure session handling for users and admins

## Technologies Used

- **Backend:** Laravel 12 with Breeze for authentication scaffolding
- **Frontend:** React + Inertia.js for smooth SPA-like experience
- **Database:** MySQL
- **Authentication:** Laravel multi-auth with separate guards for users and admins

## Installation

1. Clone the repo:
   ```bash
   git clone https://github.com/your-username/rentauto.git

    Install dependencies:

Always show details

composer install
npm install && npm run dev

Set up your .env file (copy from .env.example) with your DB credentials and other environment variables.

Run migrations and seeders:

Always show details

php artisan migrate --seed

Serve the application:

Always show details

    php artisan serve

    Access the app:

        User portal: http://localhost:8000

        Admin portal: http://localhost:8000/admin/login

Usage

    Users can register, log in, browse vehicles, rent cars, upload documents, and manage their profile.

    Admins can log in, manage vehicles, rentals, payments, users, and perform maintenance records management.

Notes

    Ensure mail configuration is set up for email verification and password reset emails.

    Session and authentication guards are configured separately for users and admins.

Contributing

Feel free to open issues or submit pull requests to improve RentAuto!
License

This project is open source and available under the MIT License.
"""
