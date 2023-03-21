<div>
    <div class="m-5">
        <div class="card">
            <div class="card-header">
                Cek Ticket Anda
            </div>
            <div class="card-body">
                <input wire:model="email" type="text" class="form-control" placeholder="silahkan masukan email">
                <button class="btn m-3 btn-primary" wire:click="cekTicket">Cek</button>
                {{ $hasil }}
            </div>
        </div>
    </div>
</div>
