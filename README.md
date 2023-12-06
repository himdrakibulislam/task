# Library Management System

## Overview

The Library Management System is a web application built using Laravel 7+, which allows publishing websites to add, modify, and delete books from a library's list. The system displays a list of books on the homepage, including the book's title, author names, and publishing house name. Additionally, AJAX pagination has been implemented from scratch to enhance user experience.

## Implemented Logic

- **Book Management:** Publishers can add, modify, and delete books through a secure API.
- **Homepage Display:** The homepage displays a paginated list of books, including title, author names, and publishing house.
- **AJAX Pagination:** Custom AJAX pagination has been implemented for seamless navigation through the book list.

## Technologies Used

- **Laravel 7+:** The backend framework used for server-side development.
- **Bootstrap 4+:** Used for frontend styling and layout.
- **Blade Templating Engine:** Employed for server-side rendering of HTML.
- **jQuery:** Used for AJAX functionality and enhancing user interactions.
- **Swagger (Optional):** Interactive API documentation tool for better API understanding.

## Deployment

The following steps outline the deployment process:

1. **Clone Repository:**
   ```bash
   git clone https://github.com/yourusername/library-management-system.git
   cd library-management-system
2. **Install Dependencies:**
   ```bash
   composer install
3. **Environment Configuration:**
   Copy .env.example to .env and configure your database settings.


