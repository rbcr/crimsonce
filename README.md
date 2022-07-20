## About the project

REST API application to manage the backend of a Professionals Network using Laravel 7 - http://crimsonce.rbcr.ninja/api/v1

## Installation and configuration

Once the project has been cloned, the following commands must be executed to start the migration and create the necessary tables in the database.

Tables creation
```
php artisan migrate
```

Insert the initial data of the medals
```
php artisan db:seed --class=BadgeSeeder
```

Command will create the encryption keys needed to generate secure access tokens
```
php artisan passport:install
```

## Documentation

Parameters and information of the API can be found in http://crimsonce.rbcr.ninja/api/documentation

## Entity Relationship Diagram

![ER Diagram](https://raw.githubusercontent.com/rbcr/crimsonce/master/storage/screenshots/crimsonce_er_diagram.png)

## License

This project is licensed under the [MIT license](https://opensource.org/licenses/MIT).
