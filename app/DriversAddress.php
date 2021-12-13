<?php
	
	/**
	 * App\DriversAddress
	 * @property mixed $id
* @property mixed $driver_id
* @property mixed $address
* @property mixed $city
* @property mixed $state
* @property mixed $zipcode
* @property mixed $country
* @property mixed $status
* @property mixed $updated_at
* @property mixed $created_at

	 */
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	class DriversAddress extends Model
	{
		public $table = "tt_drivers_address";
		
		public $timestamps = true;
		
		protected $fillable = ['driver_id','address','city','state','zipcode','country','status'];
		
		public function getAll($filters = array())
		{
			$users = $this->select('*');
			foreach ($filters as $key => $value) {
				$users->where($value['field'], $value['operation'], $value['value']);
			}
			return $users->paginate(10);
		}
		
	}
