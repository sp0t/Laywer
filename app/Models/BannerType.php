<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BannerType extends Model
{
    protected $guarded = ['id'];
    public $timestamps = FALSE;

    public function banners()
    {
        return $this->hasMany('App\Models\Banner', 'id', 'banner_type_id');
    }

}
