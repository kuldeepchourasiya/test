<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
	public $timestamps = false;
    protected $fillable = [
       'pnt_aid', 'pnt_uhid', 'pnt_mobile', 'pnt_name', 'pnt_gender','pnt_address','pnt_email','pnt_age','pnt_status'
    ];
}