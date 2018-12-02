<?php

namespace Pountech\Ticket\Traits;

use Pountech\Ticket\Models\Ticket;

trait HasTickets
{
   public function tickets()
   {
       return $this->hasMany(Ticket::class, 'user_id');
   }
}
