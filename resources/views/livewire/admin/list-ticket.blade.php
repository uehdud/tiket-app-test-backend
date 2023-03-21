<div>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="m-3">
        <div class="card">
            <div class="card-header">
                List Pendaftaran Tiket
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">No Whatsapp</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Nomor Ticket</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataticket as $ticket)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $ticket->nama }}</td>
                                <td>{{ $ticket->email }}</td>
                                <td>{{ $ticket->telp }}</td>
                                <td>{{ $ticket->alamat ?? '' }}</td>
                                <td>{{ $ticket->nomor_ticket }}</td>
                                <td>
                                    @if ($ticket->status === 1)
                                        <span class="badge text-bg-success">sudah redeem</span>
                                    @else
                                        <span class="badge text-bg-secondary">belum redeem</span>
                                    @endif
                                </td>
                                <td>
                                    <button wire:click="editTicketModal({{ $ticket->id }})"><span
                                            class="badge text-bg-warning">edit</span></button>
                                    <button wire:click="hapusTicketModal({{ $ticket->id }})"><span
                                            class="badge text-bg-danger">hapus</span></button>
                                </td>
                            </tr>
                        @endforeach

                </table>
                <div class="card-footer">
                    {{ $dataticket->links() }}
                </div>
            </div>
        </div>

    </div>



    <div class="modal" id="editDataTicket" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Tiket ({{ $nomor_ticket }})</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (isset($datast))
                        <div class="">
                            <div class="form-group">
                                <label>Nama</label>
                                <input wire:model.defer="nama" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input wire:model.defer="email" type="email" class="form-control" disabled>

                            </div>
                            <div class="form-group">
                                <label>No Whatsapp</label>
                                <input wire:model.defer="telp" type="text" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input wire:model.defer="alamat" type="Text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <select name="" id="" wire:model.defer="status" class="form-control">
                                    <option value="">silahkan pilih</option>
                                    <option value="1">Sudah Redeem</option>
                                    <option value="0">Belum Redeem</option>
                                </select>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button wire:click="updateDataTicket" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>



</div>
