# classroom
Simple classroom manager using Symfony5 and MySQL 8. This is a Symfony 5 application sample made for discover Symfony.

## Requirements
* PHP (~> 7)
* Symfony 5
* MySQL 8

## Getting started 

* Rename or copy the `.env.example` file to get your `.env` file

If you have Docker available, you can just run the `make` command. Then you can run you server using `make run`

If you want to run it manually :

* Ensure you have a valid setup using `symfony check:requirements`
* Create database `php bin/console doctrine:database:create`
* Run migrations `php bin/console doctrine:migrations:migrate`
* Run the server `symfony server:start`

## Note
By default the running port is `8000`.

## To continue

Missing tasks
* Ensure a class has less than 30 students before saving a new student
    * Future aim will be to add a new Constraint to check it
