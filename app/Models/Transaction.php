<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';
    protected $fillable = ['customer_id', 'event_id', 'event_ticket_category_id', 'event_promo_id', 'selected_date', 'purchase_date', 'qty', 'total_price', 'start_pay_date', 'payment_method', 'status'];
    protected $appends = ['order_number'];
    protected $casts = ['selected_date' => 'date', 'purchase_date' => 'datetime', 'start_pay_date' => 'datetime'];
    public $timestamps = false;

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }

    public function event_ticket_category()
    {
        return $this->belongsTo(EventTicketCategory::class, 'event_ticket_category_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function promo()
    {
        return $this->belongsTo(EventPromo::class, 'event_promo_id', 'id');
    }

    public function getOrderNumberAttribute()
    {
        return "O-" . str_pad($this->id, 9, "0", STR_PAD_LEFT);
    }
}
