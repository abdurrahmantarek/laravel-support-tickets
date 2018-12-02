<?php

namespace Pountech\Ticket\Traits;

use App\User;

trait TicketOptions
{

    public function markAsFresh()
    {
        $this->update([
            'status' => 'fresh',
            'agent_id' => null
        ]);
    }

    public function markAsTaken(User $user)
    {
        $this->update([
            'status' => 'taken',
            'agent_id' => $user->id
        ]);
    }

    public function markAsDone()
    {
        $this->update([
            'status' => 'done'
        ]);
    }

}
