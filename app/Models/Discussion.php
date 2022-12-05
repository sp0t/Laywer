<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;

    public function discussion_lawyers()
    {
        return $this->hasMany('App\Models\DiscussionLawyer', 'discussion_id', 'id');
    }

    public function discussion_clients()
    {
        return $this->hasMany('App\Models\DiscussionClient', 'discussion_id', 'id');
    }     
}
