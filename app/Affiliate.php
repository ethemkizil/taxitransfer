<?php
	
	/**
	 * App\Affiliate
	 * @property mixed $id
* @property mixed $site_url
* @property mixed $logo
* @property mixed $site_name
* @property mixed $status
* @property mixed $created_at
* @property mixed $updated_at

	 */
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	class Affiliate extends Model
	{
		public $table = "tt_affiliates";
		
		public $timestamps = true;
		
		protected $fillable = ['site_url','logo','site_name','status'];
		
		public function getAll($filters = array())
		{
			$users = $this->select('*');
			foreach ($filters as $key => $value) {
				$users->where($value['field'], $value['operation'], $value['value']);
			}
			return $users->paginate(10);
		}
		
	}
