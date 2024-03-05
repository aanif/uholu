<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Cashier\Billable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use Billable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','last_name', 'email', 'password', 'phone','dob', 'code','stripe_id','unit','street','city','zip','key_id','key_quantity','doc_id','doc_quantity','kname','klast_name','kemail','kphone','krelation','delivery_info','profile_pic','license_front','license_back','photo_id','profile_check_1','profile_check_2','profile_check_3','payment_counter','payment_counter_del','role','message','sub_id','sub_id2',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ['deleted_at'];


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }


    public function doc()
    {
        return $this->hasMany('App\Doc','custid');
    }

    public function key()
    {
        return $this->hasMany('App\Key','custid');
    }

    public function delivery()
    {
        return $this->hasMany('App\Delivery','customer_id');
    }
    public function pickup()
    {
        return $this->hasMany('App\Pickup','customer_id');
    }
    public function message()
    {
        return $this->hasMany('App\Message','customer_id');
    }

    public function scans()
    {
        return $this->hasMany('App\Message','user_id');
    }

    public static function registerNewUser(array $data): self
    {
        $user = new self();
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->name = $data['name'];
        $user->last_name = $data['last_name'];
        $user->dob = $data['date_of_birth'];
        $user->stripe_id = $data['stripe_id'];
        $user->role = $data['role'];
        $user->save();

        return $user;
    }

}

