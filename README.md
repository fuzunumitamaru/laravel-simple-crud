# Laravel Crud App

A simple crud App with Laravel 10 via sail

## Installation

* Clone the repository-
```
git clone https://github.com/zeuqirnemij/laravel-simple-crud.git
```


* Install Dependencies
```
composer install
```


* Create a MySQL database 

* Update .ENV variables
```
cp .env.example .env
```


* Migrate the database and insert dummy entries
```
php artisan migrate:fresh --seed
```

* Run server


## NOTES
* After seeding, the default username and password for the admin is admin1234 / pass1234
* The default password for all seeded users will be 'pass1234'
* Only registered users can add and view stores.
* The registration link can be found in the default page: 'login page'
  
  

