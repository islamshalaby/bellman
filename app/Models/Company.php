<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'email', 'logo', 'website'];
    protected $path = 'storage/';

    public function getLogoAttribute($logo) {
        return  $this->path . $logo;
    }
}
