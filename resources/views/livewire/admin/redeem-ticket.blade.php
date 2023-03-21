<div>
    <div class="m-5">
        <div class="card">
            <div class="card-header">
                <h3>Redeem Tiket</h3>
            </div>
            <div class="card-body">
                <div class="input-group mb-3">
                    <input wire:model="nomor_ticket" type="text" class="form-control" placeholder="nomor tiket">
                    <button class="btn btn-outline-secondary" wire:click="redeemTicket" type="button"
                        id="button-addon2">Redeem</button>
                </div>
                @if (session()->has('messageerror'))
                    <div class="alert alert-danger">
                        {{ session('messageerror') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
