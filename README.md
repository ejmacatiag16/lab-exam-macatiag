# lab-exam-macatiag — Student Manager

**Author:** Elijah Japheth Macatiag


## Requirements
- PHP 8.2+ and Composer
- MySQL (XAMPP is fine)

## Run the project
1. Clone the repository:
   `git clone https://github.com/ejmacatiag16/lab-exam-macatiag.git && cd lab-exam-macatiag`
2. Install dependencies: `composer install`
3. Copy the environment file and generate the app key:
   `cp .env.example .env && php artisan key:generate`
   (On Windows Command Prompt: `copy .env.example .env`)
4. Start **MySQL** (in XAMPP, click Start next to MySQL) and create an empty database named `lab_exam_macatiag` in phpMyAdmin (http://localhost/phpmyadmin).
5. Open `.env` and set the database values:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=lab_exam_macatiag
   DB_USERNAME=root
   DB_PASSWORD=
   ```
6. Create the tables and seed the data: `php artisan migrate --seed`
7. Start the server: `php artisan serve` and open http://127.0.0.1:8000

## Test logins
| Email | Password |

| admin@example.com | password |
| teacher@example.com | password |


## API
1. Get a token: `POST /api/tokens/create` with JSON `{"email":"admin@example.com","password":"password"}`
2. List students: `GET /api/students` with headers `Accept: application/json` and `Authorization: Bearer <token>`
3. A request without a token returns `401 Unauthorized`.