<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Nomor Pesanan</h4>
                </div>
                <div class="card-body">
                    <div>Ex: FIR20230009</div>

                    <div class="row">
                        <div class="col-8">
                            <input wire:model="searchTerm" type="text" class="form-control col-8" name="search"
                                placeholder="@if ($hasil === null && $searchTerm === '') Masukkan nomor pesanan                    
                                @else Nomor Pesanan @endif" />
                        </div>
                        <button wire:click="search" id="btnsearch" class="btn btn-primary col-4"
                            type="submit">Cari</button>
                    </div>
                    {{-- @if ($hasil === null && $searchTerm === '')
                        <div class="mt-1">Masukkan nomor pesanan</div>
                    @endif --}}


                </div>

            </div>
        </div>
    </div>
    @if ($hasil)

        @foreach ($hasil as $data => $pesanan)
            <div class="row">
                <div class="col-12">

                    <h4 id="hasil">Hasil</h4>
                    <div class="card">
                        <div class="card-body">
                            <div>
                                Nomor Pesanan : {{ $pesanan->no_pesanan }}

                            </div>
                            <div class="mb-3">
                                Nama Pemesan : {{ $pesanan->nama_pelanggan }}

                            </div>
                            </>
                            <table class="table table-hover">
                                <thead>
                                    <tr class="table-dark">
                                        <th scope="col" style="width:35%;">Pesanan</th>
                                        <th scope="col" style="width:35%;">Jumlah</th>
                                        <th scope="col" style="width:30%;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $items = explode(',', $pesanan->pesanan);
                                        $qty = explode(',', $pesanan->jumlah);
                                        $status = explode(',', $pesanan->track_order);
                                    @endphp

                                    <tr>

                                        <td>
                                            @foreach ($items as $item)
                                                <p>{{ $item }}</p>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($qty as $qty)
                                                <p>{{ $qty }}</p>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($status as $status)
                                                <p>{{ $status }}</p>
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
        @endforeach
    @elseif ($searchTerm && $hasil === null)
        <div class="row">
            <div class="col-12">

                <h4>Hasil</h4>
                <div class="card">
                    <div class="card-body">

                        <div>Data tidak ditemukan</div>

                    </div>
                </div>
            </div>
        </div>

    @endif



</div>
