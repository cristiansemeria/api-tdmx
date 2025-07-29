<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tour extends Model
{
    protected $table = 'tours';
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

        static::creating(function ($tour) {
            $tour->slug = Str::slug($tour->name);
        });

        static::saving(function ($tour) {
            $tour->slug = Str::slug($tour->name);
        });
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'tour_team');
    }
}
