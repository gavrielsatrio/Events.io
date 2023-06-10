<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPromo extends Model
{
    use HasFactory;

    protected $table = 'event_promo';
    protected $fillable = ['event_id', 'code', 'start_date', 'end_date', 'discount_percentage', 'description'];
    public $timestamps = false;

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'event_promo_id', 'id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }
}
