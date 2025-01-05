# Simple LMS

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Simple LMS

Simple LMS is a web-based Learning Management System built with Laravel. It provides a platform for managing courses, students, and their progress. This project aims to simplify the process of online learning and course management.

## Features

- User Authentication (Login, Registration, Password Reset)
- Role-based Access Control (Admin, Teacher, Student)
- Course Management (Create, Update, Delete, View Courses)
- Student Enrollment in Courses
- Dashboard for Users to View Enrolled Courses
- Real-time Notifications
- Responsive Design

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/yourusername/simple-lms.git
    cd simple-lms
    ```

2. Install dependencies:
    ```bash
    composer install
    npm install
    npm run dev
    ```

3. Copy the [.env.example](http://_vscodecontentref_/1) file to [.env](http://_vscodecontentref_/2) and configure your environment variables:
    ```bash
    cp .env.example .env
    ```

4. Generate an application key:
    ```bash
    php artisan key:generate
    ```

5. Run the migrations:
    ```bash
    php artisan migrate
    ```

6. Seed the database (optional):
    ```bash
    php artisan db:seed
    ```

7. Start the development server:
    ```bash
    php artisan serve
    ```

## Usage

- Access the application at `http://localhost:8000`.
- Register a new user or log in with existing credentials.
- Admin users can manage courses and users.
- Teachers can create and manage their courses.
- Students can enroll in courses and track their progress.

## Contributing

Contributions are welcome! Please follow these steps to contribute:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Make your changes.
4. Commit your changes (`git commit -m 'Add new feature'`).
5. Push to the branch (`git push origin feature-branch`).
6. Create a new Pull Request.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Acknowledgements

- [Laravel](https://laravel.com) - The PHP framework for web artisans.
- [Bootstrap](https://getbootstrap.com) - For responsive design.
- [FontAwesome](https://fontawesome.com) - For icons.

## Contact

For any inquiries, please contact [yourname@example.com](mailto:yourname@example.com).
