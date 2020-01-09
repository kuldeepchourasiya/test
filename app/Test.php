<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
	public $timestamps = false;

    protected $fillable = [
       'test_aid', 'test_name','test_description', 'test_under', 'test_unit', 'test_status','test_charge'
    ];
}
