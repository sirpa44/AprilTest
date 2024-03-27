## Environement:

symfony 6.4  
PHP 8.3  
mariadb 10.11

## installation

##### get project from github
`git pull git@github.com:sirpa44/AprilTest.git`

##### install library
`composer install`

##### add database config in `.env.local` file
`DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=10.11.2-MariaDB&charset=utf8mb4"`

##### command symfony
`symfony console doctrine:database:create`  
`symfony console doctrine:migrations:migrate`  
`symfony console doctrine:fixtures:load`

## Users

##### User
- login: login@login.login
- pass: password
##### Admin
- login: admin@admin.admin
- pass: password