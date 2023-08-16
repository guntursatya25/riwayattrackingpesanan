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
                                @else Nomor Pesanan @endif"
                                onkeyup="if(event.keyCode === 13) document.getElementById('btnsearch').click();" />
                        </div>
                        <button wire:click="search" wire:loading.attr="disabled" id="btnsearch"
                            class="btn btn-primary col-4" type="button">
                            Cari
                        </button>
                    </div>
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
                                <div class="divider">
                                    <div class="divider-text">
                                        <h4 id="hasil">Hasil</h4>
                                    </div>
                                </div>
                                @php
                                    $items = explode(',', $pesanan->namabarang);
                                    $qty = explode(',', $pesanan->jumlah);
                                    $status = explode(',', $pesanan->track_order);
                                @endphp
                                <div>
                                    Nomor Pesanan : {{ $pesanan->kdpsn }}
                                </div>

                                <div class="mb-3">
                                    Tanggal Pemesanan : {{ $pesanan->created_at->format('d-m-Y') }}
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col">
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


                                <div class="divider">
                                    <div class="divider-text">
                                        <h3>Status</h3>
                                    </div>
                                </div>
                                @if (empty($logstatus))
                                    <p class="text-center">Pesanan belum diproses</p>
                                @elseif ($hasil[0]['status'] === 'Selesai')
                                    <p class="text-center">Pesanan sudah selesai</p>
                                @elseif ($hasil[0]['status'] === 'Dikirim')
                                    <p class="text-center">Pesanan sedang dikirim hari ini</p>
                                @else
                                    @foreach ($pesanan->PesananLogs->sortByDesc('created_at') as $index => $pesananLog)
                                        <div class="accordion" id="hasilriwayat{{ $index }}">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse{{ $index }}"
                                                        aria-expanded="false" aria-controls="flush-collapseOne">
                                                        Tanggal: {{ $pesananLog->created_at->format('d-m-Y') }}
                                                        Waktu: {{ $pesananLog->created_at->format('H:i') }}
                                                    </button>
                                                </h2>
                                                <div id="collapse{{ $index }}"
                                                    class="accordion-collapse collapse"
                                                    data-bs-parent="#hasilriwayat{{ $index }}">
                                                    <div class="accordion-body">
                                                        @php
                                                            $qtys = explode(',', $pesananLog->qtys);
                                                            $status = explode(',', $pesananLog->riwayat);
                                                        @endphp
                                                        <table class="table table-hover   ">

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
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        @if ($ulasanstatus)
                            <div class="card">
                                @livewire('ulasan-section')
                            </div>
                        @endif
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
