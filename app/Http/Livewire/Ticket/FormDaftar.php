<?php

namespace App\Http\Livewire\Ticket;

use App\Models\Ticket;
use Livewire\Component;
use Illuminate\Support\Str;

class FormDaftar extends Component
{

    public $nama;
    public $alamat;
    public $email;
    public $telp;


    protected $rules = [
        'nama' => 'required',
        'email' => 'required|email',
        'telp' => 'required|min:1|max:15',
    ];

    protected $messages = [
        'nama.required' => 'silahkan masukkan nama jelas',
        'email.required' => 'silahkan masukkan alamat email',
        'telp.required' => 'Silahkan masukkan no whatsapp',
        'email.email' => 'Email tidak valid',
        'telp.min' => 'Silahkan masukkan no whatsapp',
        'telp.max' => 'no whatsapp tidak valid',
    ];

    public function createTicket()
    {

        try {
            $validatedData = $this->validate();

            $nomor_ticket = Str::random(10);
            if (!Ticket::where('email', $this->email)->exists()) {
                Ticket::create([
                    'nama' => $this->nama,
                    'alamat' => $this->alamat,
                    'email' => $this->email,
                    'telp' => $this->telp,
                    'status' => 0,
                    'nomor_ticket' => $nomor_ticket

                ]);
                session()->flash('message', 'Tiket berhasil dibuat silahkan cek email anda atau cek pada bagian cek tiket dibawah.');
                return redirect(request()->header('Referer'));
            } else {
                session()->flash('messageerror', 'Email Sudah Terdaftar silahkan gunakan email lain');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }




    public function render()
    {
        return view('livewire.ticket.form-daftar');
    }
}
