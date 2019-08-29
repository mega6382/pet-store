# pet-store
HEXAGONAL PET STORE

## Installation 

### First install all dependencies:
````
composer install
````
### Then load the database and fixtures:

````
composer run-script create-db
````
It will create a db.sqlite file inside the /app/ directory, and load our DB structure and fixtures in to it


### Then finally run the app:

````
php -S localhost:8000 -t public/
````
This will run the php's built-in server on 8000 port inside the public directory

## Usage

There are only 2 main endpoints:

1. `http://localhost:8000/weeklyRevenueReport`
2. `http://localhost:8000/listOfPetsThatShouldBeInShowroom`

You can access these easily through a web browser. Also, these return data in JSON format.


## Tests
To run the tests:

````
composer run-script run-tests
````

I have only written tests for our use cases.