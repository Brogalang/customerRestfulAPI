## Run the DB Migration

    php artisan migrate
    
## Run the Seeder

    php artisan db:seed --class=CustomerSeeder
    php artisan db:seed --class=AddressSeeder

## Run the App
    php artisan serve

## REST API

The REST API to the example app is described below.

## Request Customer

`GET http://127.0.0.1:8000/api/customer`

`GET Detailed http://127.0.0.1:8000/api/customer/{id}`

`POST Create Customer http://127.0.0.1:8000/api/customer/`

    {
        "title" : "Mr",
        "name" : "Ying Yang",
        "gender" : "male",
        "phone_number" : "081234567890",
        "image" : "",
        "email" : "yang@admin.com"
    }

`PUT Update Customer http://127.0.0.1:8000/api/customer/{id}`

    {
        "title" : "Ms",
        "name" : "Zelin Yin",
        "gender" : "female",
        "phone_number" : "081234567890",
        "image" : "https://img.freepik.com/premium-vector/man-avatar-profile-round-icon_24640-14044.jpg",
        "email" : "admin@admin.com"
    }

`DELETE Customer http://127.0.0.1:8000/api/customer/{id}`

## Request Address

`GET http://127.0.0.1:8000/api/address`

`GET Detailed http://127.0.0.1:8000/api/address/{id}`

`POST Create Address http://127.0.0.1:8000/api/address/`

    {
        "customer_id" : "10",
        "address" : "Kawasan Industri",
        "district" : "Cikarang Selatan",
        "city" : "Bekasi",
        "province" : "Jawa Barat",
        "postal_code" : 17530
    }

`PUT Update Address http://127.0.0.1:8000/api/address/{id}`

    {
        "customer_id" : "10",
        "address" : "Kawasan Industri",
        "district" : "Cikarang Utara",
        "city" : "Bekasi",
        "province" : "Jawa Barat",
        "postal_code" : 17530
    }

`DELETE Address http://127.0.0.1:8000/api/address/{id}`

## Run the test

    php artisan test