<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Nomor Pesanan</h4>
                </div>
                <div class="card-body">
                    <div>Ex: FIR20230014</div>

                    <div class="row">
                        <div class="col-8">
                            <input wire:model="searchTerm" type="text" class="form-control col-8" name="search"
                                placeholder="@if ($hasil === null && $searchTerm === '') Masukkan nomor pesanan                    
                                @else Nomor Pesanan @endif" />
                        </div>
                        <button wire:click="search" wire:loading.attr="disabled" id="btnsearch"
                            class="btn btn-primary col-4" type="button">
                            Cari
                        </button>
                    </div>
                    {{-- @if ($hasil === null && $searchTerm === '')
                        <div class="mt-1">Masukkan nomor pesanan</div>
                    @endif --}}


                </div>

            </div>
        </div>
    </div>

    <div wire:ignore.self>

        @if ($showResults && $hasil)
            @foreach ($hasil as $pesanan)
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 id="hasil">Hasil</h4>
                                @php
                                    $items = explode(',', $pesanan->pesanan);
                                    $qty = explode(',', $pesanan->jumlah);
                                    $status = explode(',', $pesanan->track_order);
                                @endphp
                                <div>
                                    Nomor Pesanan : {{ $pesanan->no_pesanan }}
                                </div>
                                <div>
                                    Nama Pemesan : {{ $pesanan->nama_pelanggan }}
                                </div>
                                <div class="mb-3">
                                    Tanggal Pemesanan : {{ $pesanan->created_at->format('d-m-Y') }}
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-9">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr class="table-dark">
                                                        <th scope="col" class="text-center">Pesanan</th>
                                                        <th scope="col" class="text-center">Jumlah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center">
                                                            @foreach ($items as $item)
                                                                <p>{{ $item }}</p>
                                                            @endforeach
                                                        </td>
                                                        <td class="text-center">
                                                            @foreach ($qty as $qty)
                                                                <p>{{ $qty }}</p>
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                <h3>Status</h3>

                                @foreach ($pesanan->PesananLogs->sortByDesc('created_at') as $pesananLog)
                                    <div class="table-responsive {{ !$showAll && !$loop->first ? 'd-none' : '' }}">


                                        <table class="table table-hover table_history data-table ">
                                            Tanggal: {{ $pesananLog->created_at->format('d-m-Y') }}


                                            Waktu: {{ $pesananLog->created_at->format('H:i') }}
                                            @php
                                                $qtys = explode(',', $pesananLog->qtys);
                                                $status = explode(',', $pesananLog->riwayat);
                                            @endphp

                                            <thead>
                                                <th>Pesanan</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Jumlah</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        @foreach ($items as $iiiiiiiii)
                                                            <p>{{ $iiiiiiiii }}</p>
                                                        @endforeach
                                                    </td>
                                                    <td class="text-center">
                                                        @foreach ($status as $stat)
                                                            <p>
                                                                {{ $stat }}
                                                            </p>
                                                        @endforeach
                                                    </td>
                                                    <td class="text-center">
                                                        @foreach ($qtys as $qty)
                                                            <p>
                                                                {{ $qty }}
                                                            </p>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach


                                @if (count($pesanan->PesananLogs) > 1)
                                    <a href="#hasil" wire:click="toggleTables">{{ $linkText }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @elseif ($searchTerm && $hasil === null && $showResults)
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

</div>
