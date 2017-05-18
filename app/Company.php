<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'companyName', 'sponsorId',
    ];

    public function sponsor()
    {
        return $this->belongsTo('App\Sponsor', 'sponsorId');
    }
}
