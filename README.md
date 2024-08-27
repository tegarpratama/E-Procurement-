# Project Installation

1. Clone the project
   `git clone https://github.com/tegarpratama/E-Procurement-.git`

2. Setup for backend
   - Enter to directory backend
     `cd .\back`
   - Create .env file
     `cp .env.example .env`
   - Set value of .env file
     ```
     PORT=3000
     DB_HOST=mysql
     DB_PORT=3306
     DB_USER=root
     DB_PASSWORD=root
     DB_DATABASE=procurement_vhiweb
     JWT_SECRET="helloworld"
     ```
3. Setup for frontend

   - Enter to directory frontend
     `cd .\front`
   - Added value to .env file
     `BACKEND_URL="http://backend:3000/api"`
   - Install composer
     `composer install`
   - Generate key
     `php artisan key:generate`

4. Running docker compose
   `docker-compose up --build`

5. Setup database
   - enter to container mysql
     `docker exec -it  e-procurement--mysql-1 bash`
   - login user
     `mysql -u root -p`
     and the password is `root`
   - use database
     `use procurement_vhiweb`
   - create table
     ```
     CREATE TABLE users (
         id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
         name VARCHAR(100) NOT NULL,
         email VARCHAR(100) NOT NULL,
         password VARCHAR(255) NOT NULL,
         role ENUM('admin', 'vendor') NOT NULL DEFAULT 'vendor',
         is_verified TINYINT(1) DEFAULT 0,
         created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
         updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
     );

     CREATE TABLE products (
         id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
         name VARCHAR(255) NOT NULL,
         description TEXT NOT NULL,
         user_id INT NOT NULL,
         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
         updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
         FOREIGN KEY (user_id) REFERENCES users(id)
     );
     ```
   - Insert data for the first time
     ```
     insert into users (name, email, password, role, is_verified) values ('admin', 'admin@gmail.com', '$2b$10$yU/WkhE18EFXk9D47dwf4.QEW.2AdRV0sWuX.st9yZ2fHy4eLq7fq', 'admin', 1);
     ```
6. Test application
   - open to browser:
     `http://localhost:8000`
   - credentials:
     email: admin@gmail.com
     pass: password
