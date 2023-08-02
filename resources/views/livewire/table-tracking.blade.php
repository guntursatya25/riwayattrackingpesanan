<div>
    <div wire:ignore class="table-responsive">
        {{-- <table class="table table-striped table-bordered no-wrap"> --}}
        <table class="table table-striped " id="table1">
            <thead>
                <tr>
                    <th>Nomor Pesanan</th>
                    <th>Nama</th>
                    <th>Pesanan</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanan as $index => $row)
                    <tr>
                        <td>{{ $row->no_pesanan }}</td>
                        <td>{{ $row->nama_pelanggan }}</td>
                        <td>{{ $row->pesanan }}</td>
                        <td>{{ $row->jumlah }}</td>
                        <td>
                            {{-- <button type="button" class="btn waves-effect waves-light btn-sm btn-rounded btn-primary"
                                data-bs-toggle="modal" data-bs-target="#viewDetails{{ $row->id }}">
                                Edit
                            </button> --}}
                            <button type="button" name="modalView"
                                class="btn waves-effect waves-light btn-sm btn-rounded btn-primary"
                                wire:click="openModals('{{ $row->id }}','edit')"
                                wire:loading.attr="disabled">Edit</button>
                            {{-- <button type="button" class="btn waves-effect waves-light btn-sm btn-rounded btn-success"
                                data-bs-toggle="modal" data-bs-target="#statusModal{{ $row->id }}">
                                Status
                            </button> --}}
                            <a href="{{ route('tambahstatus', ['id' => $row->id]) }}"
                                class="btn waves-effect waves-light btn-sm btn-rounded btn-success">Status</a>

                            {{-- <button type="button" name="modalViewStatus"
                                class="btn waves-effect waves-light btn-sm btn-rounded btn-success"
                                wire:click="openModals('{{ $row->id }}','status')"
                                wire:loading.attr="disabled">Status</button> --}}
                            <button type="button" name="modalViewdelete"
                                class="btn waves-effect waves-light btn-sm btn-rounded btn-danger"
                                wire:click="openModals('{{ $row->id }}','delete')"
                                wire:loading.attr="disabled">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $pesanan->links() }}
    </div>
</div>
