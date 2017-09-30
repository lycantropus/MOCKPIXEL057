<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
 */
class Vehicle extends Model
{
    protected $fillable= ['vin', 'active_geofence', 'vehicle_type_id'];

    public function type(){
        return $this->belongsTo(VehicleType::class);
    }

    public function GeoLogs(){
        return $this->hasMany(GeoLog::class);
    }
}
