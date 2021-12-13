<?php
	
	/**
	 * App\TourCategory
	 * @property mixed $id
* @property mixed $name
* @property mixed $updated_at
* @property mixed $created_at

	 */
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	class TourCategory extends Model
	{
		public $table = "tt_tour_categories";
		
		public $timestamps = true;
		
		protected $fillable = ['name'];
		
		public function getAll($filters = array())
		{
			$users = $this->select('*');
			foreach ($filters as $key => $value) {
				$users->where($value['field'], $value['operation'], $value['value']);
			}
			return $users->paginate(10);
		}
		
	}
