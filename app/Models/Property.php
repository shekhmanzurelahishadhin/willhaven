<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $table = 'properties';
    protected $fillable = [
        
        'title',
        'type',
        'purpose',
        'division',
        'address',
        'phone',
        'email',
        'price',
        'area',
        'unit',
        'room',
        'bedroom',
        'washroom',
        'floor',
        'kitchen',
        'parking',
        'img',
        'video_link',
        'amenities',
        'locations',
        'distance',
        'google_map_embed_code',
        'descriptions',
        'featured',
        'top_property',
        'urgent_property',
        'addedBy',
    ];
}
