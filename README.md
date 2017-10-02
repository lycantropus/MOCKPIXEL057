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


# Screenshots

![Alt text](https://www.smartusa.com/resources/img/offers/offer-cabriolet.jpg)

Directly embed screenshots or simply place them in a folder (eg: "project-screenshots") along with your code.

## Improvements and other ideas

List all features that you whould have implemented if you had more time and don't forget to tell us the features that you think that are missing on our API.

We are always looking out for more ideas to enhance our API.

## Feedback

If you can please provide feedback about the event or the Mercedes-Benz team on site. Tell us what your likes ands dislikes.
