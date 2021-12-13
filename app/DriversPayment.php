<?php
	
	/**
	 * App\DriversPayment
	 * @property mixed $id
* @property mixed $driver_id
* @property mixed $datetime
* @property mixed $type
* @property mixed $amount
* @property mixed $after_balance
* @property mixed $driver_cost
* @property mixed $is_paid
* @property mixed $status
* @property mixed $description
* @property mixed $updated_at
* @property mixed $created_at

	 */
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	class DriversPayment extends Model
	{
		public $table = "tt_drivers_payments";
		
		public $timestamps = true;
		
		protected $fillable = ['driver_id','datetime','type','amount','after_balance','driver_cost','is_paid','status','description'];
		
		public function getAll($filters = array())
		{
			$users = $this->select('*');
			foreach ($filters as $key => $value) {
				$users->where($value['field'], $value['operation'], $value['value']);
			}
			return $users->paginate(10);
		}
		
	}
