<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    use HasFactory;
    protected $guarded = [];
    //con esto relacinamos los modelos y le decimos que entidad compañia tiene muchos clientes
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
