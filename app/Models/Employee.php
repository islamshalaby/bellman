<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['firstName', 'lastName', 'company', 'email', 'phone'];

    public function companyy() {
        return $this->belongsTo(Company::class, 'company');
    }
}
