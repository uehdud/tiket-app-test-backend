<?php

namespace App\Http\Livewire\Admin;

use App\Models\Ticket;
use Livewire\Component;
use Livewire\WithPagination;

class ListTicket extends Component
{
    use WithPagination;
    public $i = 1;
    public $nama;
    public $email;
    public $telp;
    public $nomor_ticket;
    public $alamat;
    public $status;
    public $datast;
    public $datahapus;

    public function editTicketModal($id)
    {
        try {
            $this->dispatchBrowserEvent('openEditDataTicket');
            $this->datast = Ticket::where('id', $id)->first();
            $this->nama = $this->datast->nama;
            $this->email = $this->datast->email;
            $this->telp = $this->datast->telp;
            $this->nomor_ticket = $this->datast->nomor_ticket;
            $this->alamat = $this->datast->alamat;
            $this->status = $this->datast->status;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updateDataTicket()
    {
        try {
            $this->datast->nama = $this->nama;
            $this->datast->email = $this->email;
            $this->datast->telp = $this->telp;
            $this->datast->alamat = $this->alamat;
            $this->datast->status = $this->status;
            $this->datast->save();
            session()->flash('message', 'Tiket berhasil ubah.');
            return redirect(request()->header('Referer'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function hapusTicketModal($id)
    {
        
        try {
          Ticket::findOrFail($id)->delete();
          session()->flash('messageerror', 'Data Berhasil dihapus');
          return redirect(request()->header('Referer'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

   

    public function render()
    {

        $dataticket = Ticket::orderBy('created_at', 'desc')->paginate(10);

        return view('livewire.admin.list-ticket', ['dataticket' => $dataticket]);
    }
}
