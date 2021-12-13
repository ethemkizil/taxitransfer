<?php

/**
 * App\Price
 * @property mixed $id
 * @property mixed $start_location_id
 * @property mixed $stop_location_id
 * @property mixed $vehicle_id
 * @property mixed $price
 * @property mixed $roundtrip
 * @property mixed $status
 * @property mixed $updated_at
 * @property mixed $created_at
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    public $table = "tt_prices";

    public $timestamps = true;

    protected $fillable = ['distance', 'travel_time', 'start_location_id',  'stop_location_id', 'vehicle_id', 'price', 'roundtrip', 'status'];

    public function getAll($filters = array())
    {
        $users = $this->select('*');
        foreach ($filters as $key => $value) {
            $users->where($value['field'], $value['operation'], $value['value']);
        }
        return $users->with("startLocation")->with("stopLocation")->with("vehicle")->paginate(10);
    }

    public function startLocation()
    {
        return $this->hasOne(Location::class, 'id', 'start_location_id');
    }

    public function stopLocation()
    {
        return $this->hasOne(Location::class, 'id', 'stop_location_id');
    }

    public function vehicle()
    {
        return $this->hasOne(Vehicle::class, 'id', 'vehicle_id');
    }

    public function getVehicleList($start_location_id = 0, $stop_location_id = 0, $person)
    {

        if($start_location_id <= 0 || $stop_location_id <= 0){
            return array();
        }

        $price = $this->select("tt_prices.*");

        $price->where("start_location_id", "=", $start_location_id);

        if($stop_location_id){
            $price->where("stop_location_id", "=", $stop_location_id);
        }

        $price->leftJoin("tt_vehicles", "tt_prices.vehicle_id","=","tt_vehicles.id");
        $price->where("tt_vehicles.passenger",">=", $person);
        $price->orderBy("price","asc");
        return $price->with("vehicle")->with("startLocation")->with("stopLocation")->get()->toArray();
    }

    public function getPrice($id)
    {
        $price = $this->select("*");
        $price->where("id", "=", $id);
        return $price->with("vehicle")->with("startLocation")->with("stopLocation")->get();
    }

}

