<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Contact extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contacts';

    protected $fillable = ['name', 'email', 'password','firstname','username','function','mobile','telephone'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public static function findByEmailOrFail($email, $columns = array('*'))
    {
        if ( ! is_null($user = static::whereEmail($email)->first($columns)))
        {
            return $user;
        }


    }


    public function organisations()
    {
        return $this->belongsToMany('App\Organisation');
    }

    public function sites()
    {
        return $this->belongsToMany('App\Site');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
    public function hasRole($name)
    {
        foreach($this->roles as $role)
        {
            if($role->name == $name) return true;
        }
        return false;
    }




}
