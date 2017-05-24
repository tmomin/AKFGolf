<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'firstName', 'lastName', 'companyId', 'email', 'phone', 'teamId', 'checkinTime',
    ];

    public function company()
    {
        return $this->belongsTo('App\Company', 'companyId');
    }

    public function team()
    {
        return $this->belongsTo('App\Team', 'teamId');
    }

    public function signature()
    {
        return $this->hasOne('App\Signature');
    }
}
