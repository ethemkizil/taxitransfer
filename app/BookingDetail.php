<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\BookingDetail
 * @property mixed $id
 * @property mixed $name
 * @property mixed $surname
 * @property mixed $email
 * @property mixed $phone
 * @property mixed $city
 * @property mixed $country
 * @property mixed $title
 * @property mixed $updated_at
 * @property mixed $created_at
 * @property mixed $booking_id
 */
class BookingDetail extends Model
{

    public $table = "tt_booking_details";

    public $timestamps = true;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone',
        'city',
        'country',
        'title',
        'booking_id'
    ];

    public function getAll($filters = array())
    {
        $users = $this->select('*');
        foreach ($filters as $key => $value) {
            $users->where($value['field'], $value['operation'], $value['value']);
        }
        return $users->paginate(10);
    }
}
