# Laravel E-Commerce App

This is a Laravel-based e-commerce web application that includes user authentication, admin management, product and category management, and a shopping interface.

## 🚀 Features

- User registration and login
- Admin dashboard for managing products and categories
- Product catalog for browsing
- MVC architecture with Laravel
- RESTful routing
- Authentication and session management

## 🛠 Setup Instructions

### 1. Clone the repository
```bash
git clone https://github.com/basem3sam/laravel-ecommerce-app.git
cd laravel-ecommerce-app
```

### 2. Install dependencies
```bash
composer install
npm install && npm run dev
```

### 3. Configure environment
```bash
cp .env.example .env
php artisan key:generate
```
Update the .env file with your database and mail settings.

### 4. Run migrations
```bash
php artisan migrate
```

### 5. Serve the app
```bash
php artisan serve
```

### 🧪 Testing
```bash
php artisan test
```

📜 License
This project is open-source and available under the [MIT license](LICENSE).
