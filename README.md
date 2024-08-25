# urlshortener
URL Shortener Project
Introduction
This project is a URL shortener application developed using Yii2 framework. It allows users to shorten long URLs and manage their shortened links. The application also provides functionalities for user authentication, URL management, and basic analytics.

Features
Shorten long URLs
Redirect to the original URL using shortened links
User authentication and management
View and manage user-specific shortened URLs
Track click counts for each shortened URL
Installation
Prerequisites
PHP 7.4 or higher
Composer
MySQL or any other supported database
Steps to Install
Clone the Repository
git clone https://github.com/your-repo-url.git

Navigate to Project Directory cd your-project-directory

Install Dependencies composer install

Configure Database Copy the config/db.php.example file to config/db.php.

cp config/db.php.example config/db.php Update config/db.php with your database connection details. Open the file in a text editor and configure it according to your database setup. Here is an example configuration: return [ 'class' => 'yii\db\Connection', 'dsn' => 'mysql:host=localhost;dbname=your_database_name', 'username' => 'your_database_username', 'password' => 'your_database_password', 'charset' => 'utf8', ];

Run Database Migrations php yii migrate Start the Application

Start the Application

Access the application at http://localhost/frontend/web and

http://localhost/backend/web

access adminpanel: username: admin password: admin123

Usage URL Shortening Visit the URL shortening page: /user/shorten Enter a long URL and click the "Shorten" button. The shortened URL will be displayed. URL Redirection Visit the shortened URL to be redirected to the original URL. User Authentication Users must be logged in to shorten URLs and manage their links. Sign up and log in via the /site/signup and /site/login pages. User Dashboard Access the user dashboard at /user/panel to view and manage your shortened URLs and view analytics. Security SQL Injection Prevention: The application uses Yii2's ActiveRecord and Query Builder, which automatically handles SQL injection protection. Input Validation: All user inputs are validated according to the rules defined in the model classes. Unique Short Code Generation: The generateShortCode() method ensures that each shortened URL is unique by checking the database. Code Documentation Models: The Url model represents the URL table in the database and includes methods for URL shortening. Controllers: The SiteController handles user authentication and general site actions. The UserController manages user-specific actions such as URL shortening and viewing. Contributing If you want to contribute to the project, please fork the repository and submit a pull request with your changes. Report any issues or bugs by opening an issue on the GitHub repository.
