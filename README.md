# Posts Management System

This project is a Posts Management System built with Laravel, following the MVC architecture, and utilizing Eloquent ORM for database interactions. It includes user authentication and various functionalities to manage posts.

## Features

- User authentication (registration, login)
- Create, read, update, and delete posts
- User roles and permissions
- Data validation
- Error handling

## Technologies Used

- **Backend**: Laravel
- **Frontend**: Blade templating engine
- **Database**: MySQL
- **Authentication**: Laravel built-in authentication
- **ORM**: Eloquent ORM

## Installation

### Prerequisites

Make sure you have the following installed on your machine:

- PHP (>=7.3)
- Composer
- MySQL
- Node.js and npm

### Steps to Install

1. **Clone the repository**:
    ```bash
    git clone https://github.com/usama739/posts-management-system.git
    cd posts-management-system
    ```

2. **Install backend dependencies**:
    ```bash
    composer install
    ```

3. **Install frontend dependencies**:
    ```bash
    npm install
    ```

4. **Configure your database** in the `.env` file:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

5. **Run the database migrations**:
    ```bash
    php artisan migrate
    ```

6. **(Optional) Seed the database**:
    ```bash
    php artisan db:seed
    ```

7. **Compile the frontend assets**:
    ```bash
    npm run dev
    ```
    Or for production:
    ```bash
    npm run prod
    ```

8. **Start the development server**:
    ```bash
    php artisan serve
    ```

### Accessing the Application

Open your web browser and navigate to `http://localhost:8000`.

## Usage

### Authentication

- **Register** a new user.
- **Login** with the registered credentials.

### Posts Management

- **Create Post**: Navigate to the "Create Post" section to add a new post.
- **Read Posts**: View a list of all posts on the main page.
- **Update Post**: Edit an existing post by clicking on the edit button.
- **Delete Post**: Remove a post by clicking on the delete button.
