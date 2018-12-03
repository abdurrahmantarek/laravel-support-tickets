<?php

namespace Pountech\Ticket\Models;

use App\User;
use Pountech\Ticket\Models\Ticket;
use Illuminate\Database\Eloquent\Model;

class TicketAnswer extends Model
{
    protected $fillable = [
        'ticket_id',
        'from',
        'to',
        'message'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'from');
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
