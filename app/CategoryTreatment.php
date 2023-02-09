<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class CategoryTreatment extends Model
{





    protected $table    = 'categorytreatment';

    protected $fillable = ['treatmentName'];


    public static function boot()
    {
        parent::boot();

        CategoryTreatment::observe(new UserActionsObserver);
    }
}
