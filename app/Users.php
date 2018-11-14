<?php 
namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['username','name', 'email','phone','address', 'password', 'photo'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function getFieldList()
    {
        return $this->fillable;
    }

    public function authorization()
    {
        return $this->hasOne('App\Authorization', 'user_id')->select([
            'user_id',
            'is_super_admin',
            'can_setting',
            'can_category_news',
            'can_news',
            'can_contact',
            'can_question',
            'can_delete_question',            
        ]);
    }

    /**
     * [getAuthorizationData description]
     * @return [data] [description]
     */
    public function getAuthorizationData()
    {
        $auth = [];
        foreach ($this->authorization->toArray() as $field => $value) {
            if ($value) {
                $auth[] = $field;
            }
        }
        return $auth;
    }

    public function getList()
    {
        $query = $this->selectRaw("
            users.id,
            users.name,
            users.username,
            users.phone,
            users.address,
            users.photo,
            users.password,
            users.email
        ");
        return $query->orderBy('name')->get();
    }
}
