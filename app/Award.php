<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    protected $fillable = [
        'playerId', 'checkin'
    ];

    public function player()
    {
        return $this->belongsTo('App\Player', 'id');
    }
}
