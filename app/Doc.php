<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doc extends Model
{
    use SoftDeletes;
    //
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name','type','status','stripe_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User','custid');
    }
}
