<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    public $timestamps = false;
    protected $fillable = [
       'cat_aid', 'cat_name', 'cat_status', 'cat_cr_date', 'cat_up_date'
    ];
}
