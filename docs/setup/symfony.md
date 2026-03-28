## Requirements
Make sure you have installed:
- Docker
- Docker Compose

## Project Setup
- Clone the repository:   `git clone <repo-url>`  
`cd <project-folder>`
- Environment setup:
`cp backend/.env.example backend/.env`  
Update database configuration if needed:  
`DATABASE_URL="mysql://symfony:symfony@db:3306/symfony_new"`
- Start Docker containers  
`docker compose up --build`

## Services Access
Service	URL
Application	http://localhost:8084  
phpMyAdmin	http://localhost:8085  

## Database
- Host: db
- Database: symfony_new
- User: symfony
- Password: symfony
- Port: 3310

## Symfony Commands
- Install dependencies  
`docker compose exec app composer install`  
- Create database  
`docker compose exec db mysql -u symfony -psymfony symfony_new < docker/db/dump.sql`  
- Run migrations  
`docker compose exec app php bin/console doctrine:migrations:migrate`  
- Clear cache  
`docker compose exec app php bin/console cache:clear`

## Installation

Install required Symfony components:  
`composer require symfony/serializer`  
`composer require symfony/validator`   
`composer require symfony/webpack-encore-bundle`  
`apt update`  
`apt install -y nodejs npm`  
`npm install --save-dev @symfony/webpack-encore`

## Stop project  
`docker compose down`
- Rebuild containers  
`docker compose up --build --force-recreate`

## Project Structure  
- backend/        Symfony application  
- docker/         Docker configuration  
`docker-compose.yml`

## Notes  
- Make sure ports are free (8084, 8085, 3310)  
- If something breaks, try rebuilding containers
- All `Symfony` commands should be executed inside app container

## Tech Stack
- Symfony
- PHP-FPM
- MySQL
- Nginx
- Docker / Docker Compose
- phpMyAdmin
