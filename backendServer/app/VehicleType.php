<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
class VehicleType extends Model
{
    public function vehicles(){
        return $this->hasMany(Vehicle::class);
    }
}
