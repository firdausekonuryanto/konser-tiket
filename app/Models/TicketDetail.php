<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketDetail extends Model
{
    protected $fillable = ['ticket_order_id', 'ticket_code', 'is_used'];

    public function order()
{
    return $this->belongsTo(TicketOrder::class, 'ticket_order_id');
}
}
