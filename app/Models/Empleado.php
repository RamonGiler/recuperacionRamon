<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = ['nombre', 'fechadecontratacion', 'sueldo', 'horastrabajas', 'departamento'];
    public function tasks()
    {
        return $this->hasMany(tarea::class);
    }
}
