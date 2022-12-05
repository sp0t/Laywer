<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscussionMessage extends Model
{
    use HasFactory;

    public function reply_message(){

        return $this->belongsTo('App\Models\DiscussionMessage', 'reply_to_id', 'id');
        
    }
}
