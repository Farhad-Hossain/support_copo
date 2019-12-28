<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EnqueryTrash extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'board', 'eiin', 'service', 'doc1', 'doc2', 'message', 'status', 'feedback_message'];

    public function board_name()
    {
    	return $this->belongsTo('App\Model\Board', 'board');
    }
}
