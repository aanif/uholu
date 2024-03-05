<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scan extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'filename','doc_id','user_id','filename',
    ];

    protected $dates = ['deleted_at'];


    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
