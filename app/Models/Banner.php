<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Storage;
use Venturecraft\Revisionable\Revisionable;
use Venturecraft\Revisionable\RevisionableTrait;

class Banner extends Model{
    protected $fillable = [
        'title',
        'banner_type_id',
        'image',
        'channel',
        'enabled',
        
    ];
}
