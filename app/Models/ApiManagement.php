<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ApiManagement extends Model
{
    //
    protected $fillable = ['name', 'content_type', 'url', 'method'];
    protected $table = 'apis';

    public function fields() :HasMany
    {
        return $this->hasMany(Fields::class, 'api_id');
    }
}
