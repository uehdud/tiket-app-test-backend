<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (session()->has('messageerror'))
        <div class="alert alert-warning">
            {{ session('messageerror') }}
        </div>
    @endif
    <div class="m-5">
        <div class="card">
            <div class="card-header">
                <h3>Selamat Datang</h3>
                <h5>Silahkan Isi Form untuk mendapatkan Ticket</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input wire:model="nama" type="text" class="form-control" placeholder="silahkan isi nama">
                    @error('nama')
                        <small class="text-danger"><i>{{ $message }}</i></small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input wire:model="email" type="email" class="form-control" placeholder="email@email.com">
                    @error('email')
                        <small class="text-danger"><i>{{ $message }}</i></small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>No Whatsapp</label>
                    <input wire:model="telp" type="text" class="form-control" placeholder="085xxxxxx">
                    @error('telp')
                        <small class="text-danger"><i>{{ $message }}</i></small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Alamat <small><i>(optional)</i></small></label>
                    <input wire:model="alamat" type="Text" class="form-control">
                </div>
                <button wire:click="createTicket" class="btn m-3 btn-primary">Daftar</button>
            </div>
        </div>
    </div>
</div>
