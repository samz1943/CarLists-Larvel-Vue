## Laravel and Vue js

-   Clone or download this repo and place it into your server.
-   `composer install `
-   `cp .env.example .env `
-   Create database and modify .env with your DB name and Pusher credentials.
-   `php artisan migrate `
-   `php artisan key:generate `
-   `npm install && npm run dev `
-   `php artisan storage:link`
-   `php artisan serve `

#### Login
```http
POST /api/login

{"email": "admin@test.com", "password": "12341234"}
```

#### Get Users
```http
GET /api/user
```

#### Get Specific User
```http
GET /api/user/{id}
```

#### Get Cars
```http
GET /api/car
```

#### Get Car Availability
```http
GET /api/car/{id}/availability
```