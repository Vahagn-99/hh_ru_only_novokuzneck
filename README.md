
# Managing Cars

A brief description of what this project does and who it's for

How to start project

1. composer update
2. npm install
3. edit .env file (DB section)
4. php artisan migrate --seed

#

#User authorization is not required

Api methods
-
POST method       {myhost}/api/avallable-cars         
                 Action Api\CarControler@avallableCars

body
 id - user id (nullable)
 startDate (travel start time)
 endDate (travel end time)
 search  (fi need filter by car model and comfort type)
