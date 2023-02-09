<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuRole extends Model
{
    //
    protected $table    = 'menu_role';
    protected $fillable = [
        'menu_id',
        'role_id'
    ];
}
