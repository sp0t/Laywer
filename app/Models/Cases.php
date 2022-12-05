<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    use HasFactory;
    protected $table = 'cases';


    public function case_lawyers()
    {
        return $this->hasMany('App\Models\CaseLawyer', 'case_id', 'id');
    }

    public function case_clients()
    {
        return $this->hasMany('App\Models\CaseClient', 'case_id', 'id');
    }    
}
