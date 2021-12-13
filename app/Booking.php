<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\BookingMail
 * @property mixed $id
 * @property mixed $type
 * @property mixed $booking_datetime
 * @property mixed $pickup_datetime
 * @property mixed $dropoff_datetime
 * @property mixed $pickup_address
 * @property mixed $dropoff_address
 * @property mixed $start_location_id
 * @property mixed $stop_location_id
 * @property mixed $user_id
 * @property mixed $vehicle_id
 * @property mixed $driver_id
 * @property mixed $passenger
 * @property mixed $luggage
 * @property mixed $suitcase
 * @property mixed $transfer_price
 * @property mixed $total_price
 * @property mixed $driver_cost
 * @property mixed $flight_number
 * @property mixed $special_requirement
 * @property mixed $payment_type
 * @property mixed $affiliate_id
 * @property mixed $is_completed
 * @property mixed $status
 * @property mixed $updated_at
 * @property mixed $created_at
 */
class Booking extends Model
{
    public $table = "tt_bookings";
    public $primaryKey = "id";

    public $timestamps = true;

    protected $fillable = ['cancel_reason','plate_id','type', 'booking_datetime', 'pickup_datetime', 'dropoff_datetime', 'pickup_address', 'dropoff_address', 'start_location_id', 'stop_location_id', 'user_id', 'vehicle_id', 'driver_id', 'passenger', 'luggage', 'suitcase', 'transfer_price', 'total_price', 'driver_cost', 'flight_number', 'special_requirement', 'payment_type', 'affiliate_id', 'is_completed', 'status'];

    public function getAll($filters = array())
    {
        $users = $this->select('*');
        foreach ($filters as $key => $value) {
            $users->where($value['field'], $value['operation'], $value['value']);
        }
        $users->orderBy("pickup_datetime", "ASC");
        return $users->with("driver")->with("plate")->orderBy('id', 'desc')->paginate(30);
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
    public function driver()
    {
        return $this->hasOne(Driver::class, 'id', 'driver_id');
    }
    public function plate()
    {
        return $this->hasOne(Plate::class, 'id', 'plate_id');
    }
    public function user()
    {
        return $this->hasOne(User2::class, 'id', 'user_id');
    }

}
