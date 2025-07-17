<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Destinos extends Model
{
    protected $table = 'destinos';
    protected $fillable = [
        'name'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($destino) {
            $destino->slug = Str::slug($destino->name);
        });

        static::saving(function ($destino) {
            $destino->slug = Str::slug($destino->name);
        });
    }

    public function hoteles()
    {
        return $this->hasMany(Hotel::class);
    }
}
