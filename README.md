# Electronic

## Usage

1. Clone project.
2. Create .env file, copy content from .env.example to .env file and config in .env:

- Config Database
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=user_name
DB_PASSWORD=password
```

- Config Email
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=email_address
MAIL_PASSWORD=email_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=email_address
MAIL_FROM_NAME=null
```

3. Run
```
$ composer install (để chạy lệnh này, máy tính cần phải cài composer)
$ php artisan key:generate
$ php artisan storage:link
$ php artisan migrate   (chỉ chạy khi dùng database mới)
$ php artisan db:seed --class=DatabaseSeeder    (chỉ chạy khi dùng database mới)
$ php artisan route:clear
$ php artisan config:clear

Copy folder "images" (public/images), paste the copied folder into "storage/app/public"
```

4. Local development server
- Run
```
$ php artisan serve
```
5. Login with default admin account:
```
email: admin@gmail.com
password: admin
```
