<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = ['fname','sname','email','phone_number','address','city','province','country','account_status'];

}
