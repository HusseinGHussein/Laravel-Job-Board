<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id',
        'user_agent',
        'visitor',
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
