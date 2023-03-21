<?php

namespace App\Http\Livewire\Ticket;

use App\Models\Ticket;
use Livewire\Component;

class CekTicket extends Component
{
    public $email;
    public $hasil;

    protected $rules = [
        'email' => 'required|email'
    ];

    protected $message = [
        'email.required' => 'silahkan masukkan alamat email',
        'email.email' => 'Email tidak valid',
    ];

    public function cekTicket()
    {
        try {
            $validatedData = $this->validate();
            if (Ticket::where('email', $this->email)->exists()) {
                $dataticket = Ticket::where('email', $this->email)->first();
                if ($dataticket->status === 1) {
                    $this->hasil = "Nomor Tiket Anda adalah " . $dataticket->nomor_ticket . ". Tiket anda sudah digunakan";
                } else {
                    $this->hasil = "Nomor Tiket Anda adalah " . $dataticket->nomor_ticket . " silahkan tunjukan ke admin pada saat penukaran dipintu masuk";
                }
            } else {
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function render()
    {
        return view('livewire.ticket.cek-ticket');
    }
}
