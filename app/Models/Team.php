<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name',
        'role',
        'bio',
        'image_url',
        'talents',
        'order',
    ];
    protected $casts = [
        'talents' => 'array',
    ];

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'hotel_team');
    }

    public function tours()
    {
        return $this->belongsToMany(Tour::class, 'tour_team');
    }
}
