<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiciosCategoria extends Model
{
    public function subcategoria()
    {
        return $this->belongsTo(ServiciosSubCategoria::class);
    }
}
