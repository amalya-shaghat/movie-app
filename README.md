# Movies App

## Overview

This repository contains a Laravel application that fulfills a test task aimed at evaluating skills in working with the Laravel framework. The task involves creating a movie and genre management system, including database migrations, seeders, models, controllers, and RESTful API endpoints.

## Task Summary

1. **Database Migrations**
    - Three migrations have been created:
        - **Genres**: Stores genre information with fields for ID and name.
        - **Movies**: Stores movie details, including title, publication status, and poster link, with a foreign key referencing genres.
        - **Relationship**: A `hasMany` relationship where each genre can have multiple movies.

2. **Database Seeders**
    - Seeders are included to populate the database with test data for genres and movies.

3. **Models and Controllers**
    - Models and controllers have been implemented for:
        - Creating, retrieving, updating, and deleting records.
    - Movie creation includes image upload functionality for the movie poster. A default image is used if no image is provided, and publication occurs through a separate method.

4. **REST API Endpoints**
    - Implemented endpoints include:
        - `GET /genres`: List all genres.
        - `GET /genres/{id}`: List all movies in a specific genre (paginated).
        - `GET /movies`: List all movies (paginated).
        - `GET /movies/{id}`: Retrieve a specific movie by ID.

5. **Validation**
    - All incoming request data, especially files, are validated to ensure data integrity.

## Installation

Follow these steps to set up the application locally:

1. **Clone the Repository**
   ```bash
   git clone <repository-url>
   ```

2. **Navigate to the Project Directory**
   ```bash
   cd <project-directory>
   ```

3. **Install Dependencies**
   ```bash
   composer install
   ```

4. **Set Up Environment File**
    - Copy the `.env.example` file to `.env` and configure your database settings.

5. **Run Migrations**
   ```bash
   php artisan migrate
   ```

6. **Seed the Database**
   ```bash
   php artisan db:seed
   ```

7. **Start the Development Server**
   ```bash
   php artisan serve
   ```

## Storage Setup

To ensure that any uploaded movie posters are accessible via the web, you need to create a symbolic link from the `public/storage` directory to the `storage/app/public` directory. Follow these steps:

1. **Create the Storage Link**
   Run the following command in your terminal to create the symbolic link:
   ```bash
   php artisan storage:link
    ```

## API Testing

You can use tools like Postman or cURL to test the API endpoints.

### Example API Requests

- **Get All Genres**
  ```
  GET /genres
  ```

- **Get Movies by Genre ID**
  ```
  GET /genres/{id}
  ```

- **Get All Movies**
  ```
  GET /movies
  ```

- **Get a Specific Movie by ID**
  ```
  GET /movies/{id}
  ```

## Conclusion

This repository demonstrates the implementation of a movie management system using Laravel, focusing on best practices in coding and structure. Feel free to explore the code and provide feedback.

---
