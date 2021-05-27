### Setup

After you cloned the project, run these commands to get set up locally:

``` bash

# copy .env.example to .env
cp .env.example .env

# generate app key
php artisan key:generate

# install composer dependencies
composer install

# run migrations
php artisan migrate:fresh --seed
```

10 records will be seeded in the `people` table from the PIPL API. 
A `personal access token` will also be seeded. Use this to access the API.
```
Dropped all tables successfully.
Migration table created successfully.
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table (63.05ms)
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table (61.20ms)
Migrating: 2019_08_19_000000_create_failed_jobs_table
Migrated:  2019_08_19_000000_create_failed_jobs_table (68.24ms)
Migrating: 2019_12_14_000001_create_personal_access_tokens_table
Migrated:  2019_12_14_000001_create_personal_access_tokens_table (92.16ms)
Migrating: 2021_05_27_083309_create_people_table
Migrated:  2021_05_27_083309_create_people_table (52.89ms)
Populating data from PIPL...
Done! Added 10 people.
Generating personal access token...
Seeding: Database\Seeders\PersonalAccessTokenSeeder
Personal Access Token: 1|rnXoQvrGpAHqKmAY5p5vUzZkH4tv5hymHA4tdc2P
Seeded:  Database\Seeders\PersonalAccessTokenSeeder (235.46ms)
Database seeding completed successfully.


# serve the application
php artisan serve
````


### Routes ###

Run `php artisan route:list` to list the available API routes.

```
+-------------------------------------------------------------------------------------------------------------------------------------------+
| GET|HEAD | /                          | Closure                                                    | web                                  |
| GET|HEAD | api/people                 | App\Http\Controllers\PersonController@index                | api                                  |
|          |                            |                                                            | App\Http\Middleware\Authenticate:api |
| POST     | api/people                 | App\Http\Controllers\PersonController@store                | api                                  |
|          |                            |                                                            | App\Http\Middleware\Authenticate:api |
| GET|HEAD | api/people/stats           | App\Http\Controllers\PersonController@statistics           | api                                  |
|          |                            |                                                            | App\Http\Middleware\Authenticate:api |
| GET|HEAD | api/person/{person}        | App\Http\Controllers\PersonController@show                 | api                                  |
|          |                            |                                                            | App\Http\Middleware\Authenticate:api |
| PUT      | api/person/{person}/avatar | App\Http\Controllers\PersonController@update               | api                                  |
|          |                            |                                                            | App\Http\Middleware\Authenticate:api |
| GET|HEAD | api/user                   | Closure                                                    | api                                  |
|          |                            |                                                            | App\Http\Middleware\Authenticate:api |
| GET|HEAD | sanctum/csrf-cookie        | Laravel\Sanctum\Http\Controllers\CsrfCookieController@show | web                                  |
+-------------------------------------------------------------------------------------------------------------------------------------------+
```

### API ###

#### `GET api/people` - retrieves records of people by 10 ####

optional query parameters: sort e.g. `api/people?sort=-created_at`

sample response:
```
{
    "data": [
        {
            "id": 1,
            "name": "Filia",
            "last_name": "Harrell",
            "age": 37,
            "blood": "O-",
            "born": null,
            "born_place": "Miami",
            "cellphone": "+3741625302",
            "city": "Shiraz",
            "country": "France",
            "eye_color": "Blue",
            "father_name": "Adriane",
            "gender": "Male",
            "height": "1.77",
            "national_code": "4199886648",
            "religion": "Hindu",
            "system_id": "31b29275-fde6-4153-aff0-e20be1e243b3",
            "weight": 125,
            "avatar": "https://robohash.org/Filia.png"
        },
        ...
        {
            "id": 10,
            "name": "Lina",
            "last_name": "McKinney",
            "age": 70,
            "blood": "B+",
            "born": null,
            "born_place": "San Diego",
            "cellphone": "+497275774",
            "city": "Venice",
            "country": "Armenia",
            "eye_color": "Green",
            "father_name": "Cordy",
            "gender": "Male",
            "height": "1.40",
            "national_code": "5290552634",
            "religion": "Muslim",
            "system_id": "b1fcfe36-6f5f-4d19-8b8a-5f198f2446de",
            "weight": 131,
            "avatar": "https://robohash.org/Lina.png"
        }
    ],
    "links": {
        "first": "http://127.0.0.1:8000/api/people?page=1",
        "last": "http://127.0.0.1:8000/api/people?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/people?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://127.0.0.1:8000/api/people",
        "per_page": 10,
        "to": 10,
        "total": 10
    }
}
```

#### `POST api/people` - generates a record of person(s) from PIPL API ####

optional body paramater: `count` default is 5 e.g. count=1

sample response:
```
{
    "data": [
        {
            "id": 11,
            "name": "Randene",
            "last_name": "Davis",
            "age": 32,
            "blood": "AB-",
            "born": null,
            "born_place": "Tehran",
            "cellphone": "+3745925823",
            "city": "Venice",
            "country": "Sweden",
            "eye_color": "Brown",
            "father_name": "Pammy",
            "gender": "Male",
            "height": "1.63",
            "national_code": "9389449243",
            "religion": "Christian",
            "system_id": "5f9f7d56-b8a8-4760-a6c7-727a89f5fa37",
            "weight": 96,
            "avatar": "https://robohash.org/Randene.png"
        }
    ]
}
```

#### `GET api/people/stats` - retrieve statistics of records from the people table ####

sample response:
```
{
    "data": {
        "Total": 11,
        "Average Age": 42.91,
        "Gender": {
            "Male": 10,
            "Female": 1
        },
        "Countries": [
            "France",
            "Italy",
            "Canada",
            "Sweden",
            "Germany",
            "China",
            "Armenia"
        ]
    }
}
```

#### `GET api/person/{person}` - retrieve person by ID ####

required parameters: person, int - id of person e.g. `api/person/1`

sample response:

```
{
    "data": {
        "id": 1,
        "name": "Filia",
        "last_name": "Harrell",
        "age": 37,
        "blood": "O-",
        "born": null,
        "born_place": "Miami",
        "cellphone": "+3741625302",
        "city": "Shiraz",
        "country": "France",
        "eye_color": "Blue",
        "father_name": "Adriane",
        "gender": "Male",
        "height": "1.77",
        "national_code": "4199886648",
        "religion": "Hindu",
        "system_id": "31b29275-fde6-4153-aff0-e20be1e243b3",
        "weight": 125,
        "avatar": "https://robohash.org/Filia.png"
    }
}
```

#### `PUT api/person/{person}/avatar` - uppate person's avatar using RoboHash ####
required parameters: person, int - id of person e.g. `api/person/1/avatar`

optional body parameters: avatar, string - name of person will be set by default e.g. `avatar=bee`

sample response:
```
{
    "data": {
        "id": 1,
        "name": "Filia",
        "last_name": "Harrell",
        "age": 37,
        "blood": "O-",
        "born": null,
        "born_place": "Miami",
        "cellphone": "+3741625302",
        "city": "Shiraz",
        "country": "France",
        "eye_color": "Blue",
        "father_name": "Adriane",
        "gender": "Male",
        "height": "1.77",
        "national_code": "4199886648",
        "religion": "Hindu",
        "system_id": "31b29275-fde6-4153-aff0-e20be1e243b3",
        "weight": 125,
        "avatar": "https://robohash.org/bee.png"
    }
}
```

### Sorting ###
Applies only with the `GET api/people` endpoint sorted in ascending order of created date by default. The negative sign (-) sorts in descending order (recent order) e.g. `api/people?sort=-created_at`
