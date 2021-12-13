<?php

/**
 * App\Location
 * @property mixed $id
 * @property mixed $location_type_id
 * @property mixed $name
 * @property mixed $name_eng
 * @property mixed $description
 * @property mixed $status
 * @property mixed $orderby
 * @property mixed $updated_at
 * @property mixed $created_at
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public $table = "tt_locations";

    public $timestamps = true;

    protected $fillable = ['seo','seo_eng', 'location_type_id',  'name', 'name_eng',  'description','description_eng',  'status',  'orderby'];

    public function getAll($filters = array())
    {
        $users = $this->select('*');
        foreach ($filters as $key => $value) {
            $users->where($value['field'], $value['operation'], $value['value']);
        }

        return $users->with("locationType")->paginate(1000);
    }

    public function getLocation($startLocationName = null, $endLocationName = null)
    {
        $users = $this->select(['id', 'name', 'name_eng']);
        if($startLocationName){
            $users->where("name", "like", "%".$startLocationName."%");
            $users->orWhere("name_eng", "like", "%".$startLocationName."%");
        }

        if($endLocationName){
            $users->where("name", "like", "%".$endLocationName."%");
            $users->orWhere("name_eng", "like", "%".$endLocationName."%");
        }
        return $users->get();
    }
    
    public function locationType()
    {
	    return $this->hasOne(LocationType::class, 'id', 'location_type_id');
    }
}
