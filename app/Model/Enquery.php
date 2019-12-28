<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Enquery extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'board', 'eiin', 'eiin_password', 'student_reg', 'service', 'doc1', 'doc2', 'message', 'enquery_from', 'actioned_by', 'status', 'feedback_message'];

    public function board_name()
    {
    	return $this->belongsTo('App\Model\Board', 'board');
    }

    public function actioned_user()
    {
    	return $this->belongsTo('App\User', 'actioned_by');
    }
}
