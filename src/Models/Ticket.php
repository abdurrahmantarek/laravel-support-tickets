<?php

namespace Pountech\Ticket\Models;

use App\User;
use Pountech\Ticket\Models\TicketMessage;
use Pountech\Ticket\Traits\TicketOptions;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use TicketOptions;

    protected $fillable = [
        'agent_id',
        'user_id',
        'subject',
        'message',
        'status',
    ];

    public function messages()
    {
        return $this->hasMany(TicketMessage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }
}
