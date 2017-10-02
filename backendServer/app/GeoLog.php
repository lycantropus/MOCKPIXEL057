<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
class GeoLog extends Model
{
    protected $fillable = ['vehicle_id', 'latitude', 'longitude', 'location_address'];


    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }
}
