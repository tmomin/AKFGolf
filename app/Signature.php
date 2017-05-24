<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    protected $fillable = [
        'player_id', 'signator', 'signature', 'sig_hash',
    ];

    public function player()
    {
        return $this->belongsTo('App\Player');
    }
}
