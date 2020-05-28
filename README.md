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
1. change `DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD` in `.env.example`

- To change laravel project folder name
1. change under `volumes:` in `docker-compose.yml`

### For Linux

1. Run Docker Containers.  
    ``` cd <this project directory> ```  
    ``` docker-compose up -d ```
    
2. Install php libraries.  
    ``` sh ./scripts/composer_update_install.sh ```
    
3. Create .env file.  
    ``` sh ./scripts/create_env.sh ```
    
4. Create tables.  
    ``` sh ./scripts/artisan_migrate_seed.sh ```
    
5. Connect `http://localhost:<port>`.

### For Windows

1. Run Docker Containers.  
    ``` cd <this project directory> ```  
    ``` docker-compose up -d ```

2. Install php libraries.
    ``` .\scripts\bat\composer_update_install.bat ```

3. Generate key.  
    ``` .\scripts\bat\artisan_generate_key.bat ``` 

4. Create tables.
    ``` .\scripts\bat\artisan_migrate_seed.bat ``` 

5. Connect `http://localhost:<port>`.
    
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

