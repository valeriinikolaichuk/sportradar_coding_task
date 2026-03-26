## Requirements
Make sure you have installed:
- Docker
- Docker Compose

## Services
The application consists of the following services:

- app – PHP (Symfony)
- nginx – web server
- db – MySQL database
- phpmyadmin – database management UI

## Run the project
`docker compose up --build`

## Access
Application: `http://localhost:8084`  
phpMyAdmin: `http://localhost:8085`

## Database config
- Host: db
- Database: symfony_new
- User: symfony
- Password: symfony

## YAML
➡ [docker-compose.yml](https://github.com/valeriinikolaichuk/sportradar_coding_task/blob/main/docker-compose.yml)

