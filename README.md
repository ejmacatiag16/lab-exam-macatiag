# lab-exam-macatiag — Student Manager
**Author:** Your Full Name

## Run the project
1. `git clone <repo-url> && cd lab-exam-macatiag`
2. `composer install`
3. `cp .env.example .env && php artisan key:generate`
4. Configure the DB in `.env` (SQLite works out of the box: `touch database/database.sqlite`)
5. `php artisan migrate --seed`
6. `php artisan serve` → http://127.0.0.1:8000

Test logins: admin@example.com / password, teacher@example.com / password