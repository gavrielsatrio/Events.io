<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTicketCategory extends Model
{
    use HasFactory;

    protected $table = 'event_ticket_category';
    protected $fillable = ['event_id', 'category', 'price', 'capacity'];
    public $timestamps = false;
    
    public function transactions() {
        return $this->hasMany(Transaction::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
