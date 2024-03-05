<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'customer_id','customer_name','message','flag',
    ];
    //

    public function user()
    {
        return $this->belongsTo('App\User','customer_id');
    }
}
