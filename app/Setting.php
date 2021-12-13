<?php

/**
 * App\Setting
 * @property mixed $id
 * @property mixed $name
 * @property mixed $value
 * @property mixed $updated_at
 * @property mixed $created_at
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $table = "tt_settings";

    public $timestamps = true;

    protected $fillable = ['name',  'value'];

    public function getAll($filters = array())
    {
        $users = $this->select('*');
        foreach ($filters as $key => $value) {
            $users->where($value['field'], $value['operation'], $value['value']);
        }
        return $users->paginate(10);
    }

    public function getSetting($key, $default)
    {
        $setting = $this->where("name","=",$key)->first();
        if(isset($setting->value)){
            return $setting->value;
        }else{
            return $default;
        }
    }

}

