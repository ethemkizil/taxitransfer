<?php
	
	/**
	 * App\Invoice
	 * @property mixed $id
* @property mixed $booking_id
* @property mixed $datetime
* @property mixed $type
* @property mixed $total_amount
* @property mixed $paid_amount
* @property mixed $driver_amount
* @property mixed $fee
* @property mixed $payer
* @property mixed $status
* @property mixed $updated_at
* @property mixed $created_at

	 */
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	class Invoice extends Model
	{
		public $table = "tt_invoices";
		
		public $timestamps = true;
		
		protected $fillable = ['booking_id','datetime','type','total_amount','paid_amount','driver_amount','fee','payer','status'];
		
		public function getAll($filters = array())
		{
			$users = $this->select('*');
			foreach ($filters as $key => $value) {
				$users->where($value['field'], $value['operation'], $value['value']);
			}
			return $users->paginate(10);
		}
		
	}
