<div>
    <div wire:ignore class="table-responsive">
        {{-- <table class="table table-striped table-bordered no-wrap"> --}}
        <table class="table table-striped " id="table1">
            <thead>
                <tr>
                    <th>Nomor Pesanan</th>
                    {{-- <th>Nama</th> --}}
                    <th>Pesanan</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanan as $index => $row)
                    <tr>
                        <td>{{ $row->kdpsn }}</td>
                        <td>{{ $row->namabarang }}</td>
                        <td>{{ $row->jumlah }}</td>
                        <td>{{ $row->status }}</td>
                        <td>

                            <button type="button" name="modalView"
                                class="btn waves-effect waves-light btn-sm btn-rounded btn-primary "
                                wire:click="openModals('{{ $row->id }}','edit')"
                                wire:loading.attr="disabled">Edit</button>

                            <button type="button"
                                class="btn waves-effect waves-light btn-sm btn-rounded btn-success mt-2 mt-md-0"
                                wire:loading.attr="disabled"><a href="{{ route('tambahstatus', ['id' => $row->id]) }}"
                                    class="text-white">Status</a>
                            </button>

                            <button type="button" name="modalViewdelete"
                                class="btn waves-effect waves-light btn-sm btn-rounded btn-danger mt-2 mt-md-0"
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
