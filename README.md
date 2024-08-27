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

   - Create .env file

     `cp .env.example .env`

   - Added value to .env file

     `BACKEND_URL="http://backend:3000/api"`

   - Install composer

     `composer install`

   - Generate key

     `php artisan key:generate`

4. Running docker compose

   - Back to root folder

     `cd ../ `

   - Run docker compose

     `docker-compose up --build`

5. Migrate & seed dummy data

   - enter to container backend

     `docker exec -it  e-procurement--backend-1 bash`

   - Run migrations

     `npx knex migrate:latest --knexfile=src/db/knexfile.js`

   - Run seeder

     `npx knex seed:run --knexfile=src/db/knexfile.js`

6. Test application

   - open to browser:

     `http://localhost:8000`

   - credentials:

     email: admin@gmail.com

     pass: password
