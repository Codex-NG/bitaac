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
composer create-project bitaac/bitaac bitaac dev-tfs10
```

Note: If on unix system you have to give the aac permissions, do so by running:
```
chmod -R 755 bitaac && chmod -R o+w bitaac/storage
```

Navigate into the project by running:
```
cd bitaac
```

### Step 2. (Configuration)

2a: Edit the connection details to match yours, this can be done inside ```.env```.

2b: Make sure the database you have choosen have all distro tables since it will be required when running migrations.

### Step 3. (Assets & Database)

3a: Publish the assets by running: ```php artisan vendor:publish```

3b: Now run ```php artisan migrate --seed```

## Troubleshooting (Incomplete)

### Internal server error 500

### Main side are working, but not the routes


