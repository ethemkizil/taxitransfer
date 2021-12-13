<?php
	
	/**
	 * App\Vehicle
	 * @property mixed $id
	 * @property mixed $name
	 * @property mixed $picture
	 * @property mixed $passenger
	 * @property mixed $luggage
	 * @property mixed $suitcase
	 * @property mixed $description
	 * @property mixed $status
	 * @property mixed $orderby
	 */
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	class Vehicle extends Model
	{
		public $table = "tt_vehicles";
		
		public $timestamps = true;
		
		protected $fillable = ['name',  'picture',  'passenger',  'luggage',  'suitcase',  'description',  'status',  'orderby'];
		
		public function getAll($filters = array())
		{
			$users = $this->select('*');
			foreach ($filters as $key => $value) {
				$users->where($value['field'], $value['operation'], $value['value']);
			}
			return $users->paginate(10);
		}
		
	}
