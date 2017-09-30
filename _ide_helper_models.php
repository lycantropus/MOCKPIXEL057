<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\GeoLog
 *
 * @mixin \Eloquent
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GeoLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GeoLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GeoLog whereUpdatedAt($value)
 * @property int $vehicle_id
 * @property float $latitude
 * @property float $longitude
 * @property string|null $location_address
 * @property-read \App\Vehicle $vehicle
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GeoLog whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GeoLog whereLocationAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GeoLog whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GeoLog whereVehicleId($value)
 */
	class GeoLog extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Vehicle
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $vin
 * @property string|null $active_geofence
 * @property int|null $vehicle_type_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vehicle whereActiveGeofence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vehicle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vehicle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vehicle whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vehicle whereVehicleTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vehicle whereVin($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\GeoLog[] $GeoLogs
 * @property-read \App\VehicleType $type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\GeoLog[] $geoLogs
 */
	class Vehicle extends \Eloquent {}
}

namespace App{
/**
 * App\VehicleType
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VehicleType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VehicleType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VehicleType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VehicleType whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Vehicle[] $vehicles
 */
	class VehicleType extends \Eloquent {}
}

