## About 

This project is for the interview process for bayt.com and contains a simple implementation of recommendation system.
The user starts rating movies, and next time onwards it should recieve recommendation closer to what they had rated highly (i.e. 3 stars or higher).

## Getting Started

You need an auth token from https://developer.themoviedb.org/ to make this project work. Add it to the env file along with other keys as below:

```
TMDBCLIENT_API_AUTH_TOKEN="eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIzM2NkNDFkODczZmIzM2VhMzRlYjc0MzNjZjVlYjFiNyIsInN1YiI6IjY1Njc0ZGUzYzJiOWRmMDEwMDRjYmMyYSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.phjKqdBr9gq7oZ9P0TvNrfqNASW4j3qhnOc1xMp7v7w"

MOVIE_EXTERNAL_PACKAGE="Tmdb"
```

NOTE: if you don't have .env file available,copy .env.example file, update database credentials in it, add the keys as above and run:
```
php artisan key:generate
```


(To the interviewers: Please note that I have added my key for demo above. However, once installed, I'll remove the key from here).

Then run the obvious 
```
composer install
```
and 
```
npm install && npm run dev
```

Finally run the migrations and seed the database for admin account and movie database.
```
php artisan migrate --seed
```

Login by typing in email as sarmadkhalil97@gmail.com and password as password

## Laravel Patterns

- Implemented service layer to extract out logical interfaces from the controller and model. these services can then be independently used no matter the business model or controller entails.

- Implemented factory pattern, to allow alternate implementation of external libraries.

- Created a small package to wrap around TheMovieDatabase APIs.
