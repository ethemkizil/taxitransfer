<?php
	
	/**
	 * App\Tour
	 * @property mixed $id
* @property mixed $name
* @property mixed $start_location_id
* @property mixed $stop_location_id
* @property mixed $date
* @property mixed $duration
* @property mixed $updated_at
* @property mixed $created_at

	 */
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	class Tour extends Model
	{
		public $table = "tt_tours";
		
		public $timestamps = true;
		
		protected $fillable = ['name','start_location_id','stop_location_id','tour_category_id','date','duration'];
		
		public function getAll($filters = array())
		{
			$users = $this->select('*');
			foreach ($filters as $key => $value) {
				$users->where($value['field'], $value['operation'], $value['value']);
			}
			return $users->paginate(10);
		}
        public function startLocation()
        {
            return $this->hasOne(Location::class, 'id', 'start_location_id');
        }
        public function stopLocation()
        {
            return $this->hasOne(Location::class, 'id', 'stop_location_id');
        }
        public function tourCategory()
        {
            return $this->hasOne(TourCategory::class, 'id', 'tour_category_id');
        }
	}
