<?php

namespace Pountech\Ticket\Traits;

use App\User;
use Pountech\Ticket\Models\TicketAnswer;

trait TicketOptions
{
    protected $answer;

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

    public function answer($answer)
    {
        if($this->isTaken()) {
            $this->answer = $answer;
            return $this->answerATakenTicket();
        }
        return TicketAnswer::create([
            'ticket_id' => $this->id,
            'to' => null,
            'from' => $answer['from'],
            'message' => $answer['message']
        ]);
    }

    public function isTaken()
    {
        return isset($this->agent->id);
    }

    public function answerATakenTicket()
    {
        return TicketAnswer::create([
            'ticket_id' => $this->id,
            'to' => $this->redirectTo(),
            'from' => $this->answer['from'],
            'message' => $this->answer['message']
        ]);
    }

    public function redirectTo()
    {
        return ($this->user->id == $this->answer['from']) ? $this->agent->id : $this->user->id;
    }
}
