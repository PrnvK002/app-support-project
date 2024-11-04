<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fields extends Model
{
    protected $fillable = ['name', 'input_type', 'default_value', 'value_type', 'api_id'];
    //
    protected $table = 'fields';

}
