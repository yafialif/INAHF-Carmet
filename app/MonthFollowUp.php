<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class MonthFollowUp extends Model {

    

    

    protected $table    = 'monthfollowup';
    
    protected $fillable = ['mount'];
    

    public static function boot()
    {
        parent::boot();

        MonthFollowUp::observe(new UserActionsObserver);
    }
    
    
    
    
}