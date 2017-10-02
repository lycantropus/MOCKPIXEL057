# Mercedes-Benz Pixels Camp Challenge

## Project name

Place here the name of your project

## Team members

  - André Bordalo
  - João Bordalo

## Project Description

This project aims to bring a simplified interface for the user/owner of the vehicle allowing him check some values regarding the cars's hardware and position.

It is also implemented a tracking mode that the user can trigger (when the vehicle is stolen) that locks the car, forces the tracking mode, engages the immobilizer, and starts keeping a log of the vehicle location coordinates as well as the street name associated to that coordinates (using googlemaps API).

The API was built over the provided API by mercedes and extended by ours when needed. All the functions provided by the original api were also implemented with a simplified syntax since the project is focused on a single vehicle.

Additionally, the user can interact with the API through a mobile app.

## How to build and run the project.

To build the app please follow this steps:

Run `php composer install` in the backendServer directory.

Add a `.env` file with the normal Laravel setup (you need to setup the database configuration).

Add the following enviroment variables to the .env file:
`ENDPOINT_URL=https://api.prod.smartservices.car2go.com/` and
`VIN=MOCKPIXEL057`

Depending on your laravel version you may need to run `php artisan key:generate` to create an APP_KEY.

Run `php artisan migrate --seed` to generate the DB tables and populate them with the seeds.

Bring your VM up if you are using Homestead or call `php artisan serve` otherwise.

(Check postman files for API routes info and syntax.)


Regarding de Mobile aplication, it requires a smartphone compatible with OS  Android 5.1. (Lollipop) and use the apk provides in this repository.


# Screenshots

Can be found in project-screenshots folder

## Improvements and other ideas

Landing Menu:
- There are 5 widgets ( 4 button switch and a dropdown) that aren't implementd. The purpose of these widgets are for user's use and remote control.

Theft Traking Menu:
-The button refresh doesn't add addicional rows to the list of locations

Configuration Menu (nonexistent):
- The user could configure some automatic features, such as, how the vehicle should behaviour in case of robery;

Server side automatic notification:

-If batteryLevel (X)
  5 < X ->SLEEP
  5 =< X < 8 -> BATTERY_LOW
  8 >= X -> ON

-if powerState = SLEEP
  Notify vehicle's onwer that the vehicle need to recharge
  Notificar o proprietário do veículo para dar carga à batería do veículo

- if mileage > 60 000 && vehicleType = ENTERPRISE
   Norify Mercedes markting center to contact vehicle's owner to make a vehicle change contract.
   

We are always looking out for more ideas to enhance our API.

## Feedback


