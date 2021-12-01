<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleStatus extends Model
{
    protected $table = 'sale_statuses';
    protected $fillable = ['sale_id','status','edited_by'];
}
