<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class RumahSakit extends Model {

    

    

    protected $table    = 'rumahsakit';
    
    protected $fillable = [
          'user_id',
          'name_of_rs',
          'detail'
    ];
    

    public static function boot()
    {
        parent::boot();

        RumahSakit::observe(new UserActionsObserver);
    }
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }


    
    
    
}