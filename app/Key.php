<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Key extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name','type','status','stripe_id',
    ];
    //
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User','custid');
    }
}
