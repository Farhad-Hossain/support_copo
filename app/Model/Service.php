<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['board_id', 'name'];

    public function board()
    {
    	return $this->belongsTo('App\Model\Board');
    }
}
