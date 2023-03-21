<?php

namespace App\Http\Livewire\Admin;

use App\Models\Ticket;
use Livewire\Component;

class RedeemTicket extends Component
{
    public $nomor_ticket;

    public function redeemTicket()
    {
        try {
            if ($this->nomor_ticket) {
                if (Ticket::where('nomor_ticket', $this->nomor_ticket)->exists()) {
                    $ticket = Ticket::where('nomor_ticket', $this->nomor_ticket)->first();
                    if ($ticket->status === 0) {
                        $ticket->status = 1;
                        $ticket->save();
                        session()->flash('message', 'Tiket berhasil diredeem');
                        return redirect(request()->header('Referer'));
                    }else{
                        session()->flash('messageerror', 'Tiket sudah pernah diredeem');
                    }
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function render()
    {
        return view('livewire.admin.redeem-ticket');
    }
}
