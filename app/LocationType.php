<?php

/**
 * App\LocationType
 * @property mixed $id
 * @property mixed $name
 * @property mixed $status
 * @property mixed $updated_at
 * @property mixed $created_at
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationType extends Model
{
    public $table = "tt_location_types";

    public $timestamps = true;

    protected $fillable = ['name',  'status'];

    public function getAll($filters = array())
    {
        $users = $this->select('*');
        foreach ($filters as $key => $value) {
            $users->where($value['field'], $value['operation'], $value['value']);
        }
        return $users->paginate(10);
    }
}
