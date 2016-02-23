## Installation

#### Requirements
* PHP >= 5.5.9
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* [Composer](https://getcomposer.org/)

#### Step 1.

Download and install bitaac by following command:
```
composer create-project bitaac/bitaac bitaac dev-master
```

Note: If on unix system you have to give the aac permissions, do so by running:
```
chmod -R 755 bitaac && chmod -R o+w bitaac/storage
```

### Step 2.

Navigate into the project by running:
```
cd bitaac
```
Publish the assets by running:
```
php artisan vendor:publish
```

### Step 3. (Configuration)

3a: Edit the connection details to match yours, this can be done inside ```.env```.

3b: Open ```config/bitaac/app.php``` and change the distro service provider to match your distro. By default we use othire.

3c: Make sure the database you have choosen have all distro tables since it will be required when running migrations.

3d: Now run ```php artisan migrate```

3e: Run the database seeder ```php artisan db:seed --class=NewsTableSeeder```

## Troubleshooting (Incomplete)

### Internal server error 500

### Main side are working, but not the routes


