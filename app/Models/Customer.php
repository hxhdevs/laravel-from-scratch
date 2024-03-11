<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //Fillable example
    //protected $fillable = ['name','email','active'];
    //la diferencia es que fillable se le asigna que debe esperar especificamente en cambio guarded recibe lo que venga
    //Guarded Example
    protected $guarded = [];

    protected $attributes = [
        'active' => 1
    ];

    public function getActiveAttribute($attribute)
    {
        return $this->activeOptions()[$attribute];
    }

    //use HasFactory;
    //las siguientes funciones son de scopes se escribe scope al inicio y despues el nombre
    // se hace de este modo por convencion
    public function scopeActive($query)
    {
        return $query->where('active',1);
    }
    public function scopeInactive($query)
    {
        return $query->where('active',0);
    }
    ////con esto relacinamos los modelos y le decimos que  modelo cliente pertenece a una compañia
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function activeOptions()
    {
        return [
            1 => 'Active',
            0 => 'Inactive',
            2 => 'In-Progress',
        ];
    }
}
