<?php
	

	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
    /**
     * App\Request
     * @property mixed $id
     * @property mixed $name
     * @property mixed $email
     * @property mixed $phone
     * @property mixed $request
     * @property mixed $status
     * @property mixed $updated_at
     * @property mixed $created_at

     */
	class ContactMessage extends Model
	{
		public $table = "tt_requests";
		
		public $timestamps = true;
		
		protected $fillable = ['name','email','phone','request','status'];
		
		public function getAll($filters = array())
		{
			$users = $this->select('*');
			foreach ($filters as $key => $value) {
				$users->where($value['field'], $value['operation'], $value['value']);
			}
			return $users->paginate(10);
		}
		
	}
