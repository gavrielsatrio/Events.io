<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // protected $appends = ['start_date_formatted'];

    protected $table = 'event';
    protected $fillable = ['event_organizer_id', 'event_type_id', 'name', 'artist', 'description', 'thumbnail_path', 'banner_path', 'city_and_province', 'place', 'gradient_cover_color', 'start_date', 'end_date', 'start_time', 'end_time', 'status'];
    protected $casts = ['start_date' => 'date', 'end_date' => 'date', 'start_time' => 'datetime', 'end_time' => 'datetime'];
    public $timestamps = false;

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'event_id', 'id');
    }

    public function event_ticket_categories()
    {
        return $this->hasMany(EventTicketCategory::class, 'event_id', 'id');
    }

    // public function getStartDateFormattedAttribute() {
    //     return $this->start_date->format('d M y'); 
    // }
}
