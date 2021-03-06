# All API tests can be done through Postman
```
- Set Parameters:
   Authorization Type: Basic Auth
   Username: max123
   Password: 1234
   
   Headers:
     content-type: application/json
```   
# Prepare data:
 ```
 - first, configure database connection from the app/config/database.php file
 - second, create tables: users, notes
   - run: php artisan migrate
   - rollback: php artisan migrate:rollback
 - third, seeding your database with test data using seed classes
   - run: php artisan db:seed
 - fourth, create additional user through web site:
   http://localhost:8001/users
 ```
# API tests through Postman
```
1. Create a note 
  Returns json data about a single note.
	•	URL:/api/notes
	•	Method:POST
	•	URL ParamsRequired:none
	•	Data Params:[“message","tags”]
	•	Success Response:
	•	Code: 200 Content: {"message":"Sarah's msg","tags":"email","updated_at":"2017-05-12 03:34:46","created_at":"2017-05-12 03:34:46","id":13}
	•	Error Response:
	•	Code: 404 NOT FOUND Content: { error : "Sorry, the page you are looking for could not be found." }
	•	OR
	•	Code: 401 UNAUTHORIZED Content: { error : "Invalid credentials." }
	•	Sample Call:{"message":"Sarah's msg","tags":"email"}
2. Edit a note 
	•	Returns json data about a single note.
	•	URL:/api/notes/:id
	•	Method:PUT
	•	URL ParamsRequired:none
	•	Data Params:[“message","tags”]
	•	Success Response:
	•	Code: 200 Content: {"id":12,"message":"tom's email msg","tags":"email","updated_at":"2017-05-12 00:45:30","created_at":"2017-05-12 00:43:16"}
	•	Error Response:
	•	Code: 404 NOT FOUND Content: { error : "Sorry, the page you are looking for could not be found." }
	•	OR
	•	Code: 401 UNAUTHORIZED Content: { error : "Invalid credentials." }
	•	Sample Call:{"message":"tom's email msg","tags":"email"}
3. Delete a note 
	•	Returns json data about a single note.
	•	URL:/api/notes/:id
	•	Method:DELETE
	•	URL ParamsRequired:none
	•	Data Params:none
	•	Success Response:
	•	Code: 200 Content: {"message":"note deleted"}
	•	Error Response:
	•	Code: 500 Internal server error Content: { error : "Whoops, looks like something went wrong." }
	•	OR
	•	Code: 401 UNAUTHORIZED Content: { error : "Invalid credentials." }
4. View all note 
	•	Returns json data about a single note.
	•	URL:/api/notes
	•	Method:GET
	•	URL ParamsRequired:none
	•	Data Params:none
	•	Success Response:
	•	Code: 200 Content: 
        {"total":16,"per_page":10,"current_page":1,"last_page":2,"next_page_url":"http:\/\/localhost:8001\/api\/notes?page=2","prev_page_url":null,"from":1,"to":10,"data":[{"id":1,"message":"first test","tags":"good","updated_at":"2017-05-11 00:00:00","created_at":"2017-05-11 00:00:00"},{"id":2,"message":"docter appointment","tags":"important","updated_at":"2017-05-11 00:00:00","created_at":"2017-05-11 00:00:00"},{"id":3,"message":"Foo bar msg","tags":"test","updated_at":"2017-05-11 04:00:09","created_at":"2017-05-11 04:00:09"},{"id":13,"message":"Sarah's msg","tags":"email","updated_at":"2017-05-12 03:34:46","created_at":"2017-05-12 03:34:46"},{"id":26,"message":"Meet Jackie Friday","tags":"Meeting","updated_at":"2017-05-12 03:49:24","created_at":"2017-05-12 03:49:24"},{"id":31,"message":"Meet Jackie tomorrow","tags":"Meeting","updated_at":"2017-05-12 03:57:08","created_at":"2017-05-12 03:57:08"},{"id":32,"message":"Meet Jackie Friday","tags":"Meeting","updated_at":"2017-05-12 03:57:08","created_at":"2017-05-12 03:57:08"},{"id":34,"message":"Prepare message for test","tags":"Test","updated_at":"2017-05-12 13:26:36","created_at":"2017-05-12 13:26:36"},{"id":35,"message":"Create a message for test","tags":"Test","updated_at":"2017-05-12 13:26:36","created_at":"2017-05-12 13:26:36"},{"id":36,"message":"Meet Jackie tomorrow","tags":"Meeting","updated_at":"2017-05-12 13:26:36","created_at":"2017-05-12 13:26:36"}]}
	•	Error Response:
	•	Code: 404 NOT FOUND Content: { error : "Sorry, the page you are looking for could not be found." }
	•	OR
	•	Code: 401 UNAUTHORIZED Content: { error : "Invalid credentials." }
5. View a note 
	•	Returns json data about a single note.
	•	URL:/api/notes/:id
	•	Method:GET
	•	URL ParamsRequired:none
	•	Data Params :none
	•	Success Response:
	•	Code: 200 Content: 
        [{"id":3,"message":"Foo bar msg","tags":"test","updated_at":"2017-05-11 04:00:09","created_at":"2017-05-11 04:00:09"}]

	•	Error Response:
	•	Code: 404 NOT FOUND Content: { error : "Sorry, the page you are looking for could not be found." }
	•	OR
	•	Code: 401 UNAUTHORIZED Content: { error : "Invalid credentials." }
`````
# API Tests with Curl
`````
create new note:
curl -H 'content-type: application/json' -u max123:1234 -v -X POST -d '{"message":"Good Friday msg","tags":"Notice"}' http://localhost:8001/api/notes

update a note:
curl -H 'content-type: application/json' -u max123:1234 -v -X PUT -d '{"message":"Updated Good Friday msg","tags":"Notice"}' http://localhost:8001/api/notes/:id

delete a note:
curl -H 'content-type: application/json' -u max123:1234 -v -X DELETE http://localhost:8001/api/notes/:id

view a note:
curl -H 'content-type: application/json' -u max123:1234 -v GET http://localhost:8001/api/notes/:id

view all notes:
curl -H 'content-type: application/json' -u max123:1234 -v GET http://localhost:8001/api/notes
`````
# Run PHPUNIT tests:
```
At the root of the project directory:
run: phpunit tests/Unit/ApiTest.php
example:
maxchen@Maxs-MBP laravel $ phpunit tests/Unit/ApiTest.php
```
