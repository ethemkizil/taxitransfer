<?php
	
	/**
	 * App\User
	 * @property mixed $id
* @property mixed $username
* @property mixed $auth_key
* @property mixed $password_hash
* @property mixed $password_reset_token
* @property mixed $email
* @property mixed $firstname
* @property mixed $lastname
* @property mixed $title
* @property mixed $phone
* @property mixed $permissions
* @property mixed $status
* @property mixed $created_at
* @property mixed $updated_at

	 */
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	class User2 extends Model
	{
		public $table = "tt_user";
		
		public $timestamps = true;
		
		protected $fillable = ['username','auth_key','password_hash','password_reset_token','email','firstname','lastname','title','phone','permissions','status'];
		
		public function getAll($filters = array())
		{
			$users = $this->select('*');
			foreach ($filters as $key => $value) {
				$users->where($value['field'], $value['operation'], $value['value']);
			}
			return $users->paginate(10);
		}
		
	}
