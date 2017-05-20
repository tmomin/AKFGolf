<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'firstName', 'lastName', 'companyId', 'email', 'teamId',
    ];

    public function company()
    {
        return $this->belongsTo('App\Company', 'companyId');
    }

    public function team()
    {
        return $this->belongsTo('App\Team', 'teamId');
    }
}
