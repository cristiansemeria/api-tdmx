<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Hotel extends Model
{
    protected $table = 'hotels';
    protected $casts = [
        'services' => 'array',
        'images' => 'array',
        'google_maps' => 'array'
    ];

    protected $fillable = [
        'name'
    ];

    public function destino()
    {
        return $this->belongsTo(Destinos::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($hotel) {
            $hotel->slug = Str::slug($hotel->name);
        });

        static::saving(function ($hotel) {
            $hotel->slug = Str::slug($hotel->name);
        });
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'hotel_team');
    }
}
