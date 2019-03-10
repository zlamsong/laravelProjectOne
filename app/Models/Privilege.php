<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    protected $fillable = ['privilege_name', 'status'];
    public function user(){
        return$this->belongsToMany('App\Models\Admin', 'manage_privilege','privilege_id','admin_id','id');
    }
}
