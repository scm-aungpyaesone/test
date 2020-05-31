## Tech

* **Docker**  
  * **Compose File**  
    3.7
* **Nginx**  
  Latest
* **PHP**  
  7.3
* **Laravel**  
  7.x
* **MySQL**  
  Latest

<br>

## Environment setup

### To change port, database and laravel project folder name
- To change server address and port
1. change `ports:` in `docker-compose.yml`
1. change `API_BASE_URL` in `constants.js`

- To change database name and user
1. change under `environment:` in `docker-compose.yml`
1. change `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` in `.env.example`

- To change laravel project folder name
1. change under `volumes:` in `docker-compose.yml`

## Development Server Setup

### For Linux

1. Run Docker Containers.  
    ``` cd <this project directory> ```  
    ``` docker-compose up -d ```
    
1. Install php libraries.  
    ``` sh ./scripts/composer_update_install.sh ```
    
1. Create .env file.  
    ``` sh ./scripts/create_env.sh ```
    
1. Create tables.  
    ``` sh ./scripts/artisan_migrate_seed.sh ```

1. Setup Frontend.  
    ``` sh ./scripts/npm_install_watch.sh ```

1. Connect `http://localhost:<port>`.

### Linux Troubleshoot
1. Permission denied `/var/www/html/`
    ```
    The stream or file "/var/www/html/storage/logs/laravel.log" could not be opened: failed to open stream: Permission denied
    ```
    * **Steps to solve** 
        1. ```$ docker exec -it <laravel_container_id> /bin/sh```
        1. ```$ chown -R www-data:www-data *```


### For Windows

1. Run Docker Containers.  
    ``` cd <this project directory> ```  
    ``` docker-compose up -d ```

1. Install php libraries.   
    ``` .\scripts\bat\composer_update_install.bat ```

1. Generate key.  
    ``` .\scripts\bat\create_env.bat ``` 

1. Create tables.   
    ``` .\scripts\bat\artisan_migrate_seed.bat ``` 

1. Setup Frontend.  
    ``` .\scripts\bat\npm_install_watch.bat ```

1. Connect `http://localhost:<port>`.

## Testing Server Setup

### For Linux
1. Connect to database.  
    ``` sh ./scripts/connect_db_by_root.sh ```

1. Type `<database_root_password>`  
    (`<database_root_password>` can be checked in `docker-compose.yml` file).  

1. Create database.  
    ``` 
    $ CREATE DATABASE <test_database_name>; 
    ```   
    (`<test_database_name>` can be checked in `phpunit.xml` file) 

1. Get Permission to Database User.     
    ``` 
    $ GRANT ALL PRIVILEGES ON <test_database_name>.* TO '<database_user>'@'%'; 
    ```    
    (`<test_database_name>` can be checked in`phpunit.xml` file and for `<database_user>` in`.env` file)

1. Start Testing.   
    ``` sh ./scripts/artisan_test.sh ```

### For Windows
1. Connect to database.  
    ``` .\scripts\bat\connect_db_by_root.bat ```

1. Type `<database_root_password>`.  
    (`<database_root_password>` can be checked in `docker-compose.yml` file).  

1. Create database.  
    ``` 
    $ CREATE DATABASE <test_database_name>; 
    ```   
    (`<test_database_name>` can be checked in `phpunit.xml` file) 

1. Get Permission to Database User.     
    ``` 
    $ GRANT ALL PRIVILEGES ON <test_database_name>.* TO '<database_user>'@'%'; 
    ```    
    (`<test_database_name>` can be checked in`phpunit.xml` file and for `<database_user>` in`.env` file)

1. Start Testing.   
    ``` .\scripts\bat\artisan_test.bat ```

<br>

## Tools

* Connect to nginx container.  
    ``` sh ./scripts/connect_nginx.sh ```

* Connect to php-fpm container.  
    ``` sh ./scripts/connect_php-fpm.sh ```
    
* Connect to database.  
    ``` sh ./scripts/connect_db.sh ```

* Update php library.  
    ``` sh ./scripts/composer_update_install.sh ```
    
* Update autoload.php.  
    ``` sh ./scripts/composer_dump-autoload.sh ```
    
* Update database.  
    ``` sh ./scripts/artisan_migrate_seed.sh ```

<br>

## VSCode Extensions
1. For PHP Lravel `PHP Intelephense`
    - https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client
2. For Vue `Vetur`
    - https://marketplace.visualstudio.com/items?itemName=octref.vetur

