<?php

/**
 * App\Driver
 * @property mixed $id
 * @property mixed $firstname
 * @property mixed $lastname
 * @property mixed $email
 * @property mixed  $type
 * @property mixed $mobile
 * @property mixed $licence_number
 * @property mixed $legal_entity
 * @property mixed $vat_number
 * @property mixed $payment_percent
 * @property mixed $photo
 * @property mixed $vehicle_id
 * @property mixed $license_plate
 * @property mixed $status
 * @property mixed $updated_at
 * @property mixed $created_at
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    public $table = "tt_plates";

    public $timestamps = true;

    protected $fillable = ['plate_number', 'description','vehicle_id'];

    public function getAll($filters = array())
    {
        $users = $this->select('*');
        foreach ($filters as $key => $value) {
            $users->where($value['field'], $value['operation'], $value['value']);
        }
        return $users->paginate(10);
    }
}
