@extends('admin.templates.master')
@section('upkonten')
    <h3>Status Pesanan</h3>
@endsection
@section('konten')
    <div class="card">
        <div class="body">
            <div class="row p-4 align-items-center">
                @if ($message = Session::get('succes'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <strong>{{ $message }}</strong>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="d-none">

                    <h4 class="card-title">Detail Pelanggan </h4>
                    <div class="col-lg-6 col-12">
                        {{-- <input class="form-control" type="text" value="{{ $pesanan->nama_pelanggan }}"> --}}
                        <div class="form-group row align-items-center">
                            <div class="col-3">
                                <label class="col-form-label" for="nama_pelanggan">Nama Pelanggan</label>
                            </div>
                            <div class=" col-9">
                                <input type="text" id="nama_pelanggan" class="form-control" name="nama_pelanggan"
                                    readonly placeholder="Nama" value="{{ $pesanan->nama_pelanggan }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group row align-items-center">
                            <div class=" col-3">
                                <label class="col-form-label" for="no_pesanan">No Pesanan</label>
                            </div>
                            <div class="col-9">
                                <input type="text" id="no_pesanan" class="form-control" name="no_pesanan" readonly
                                    placeholder="No Pesanan" value="{{ $pesanan->no_pesanan }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group row align-items-center">
                            <div class=" col-3">
                                <label class="col-form-label" for="email">Email</label>
                            </div>
                            <div class="col-9">
                                <input type="text" id="email" class="form-control" name="email" placeholder="Email"
                                    value="{{ $pesanan->email }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group row align-items-center">
                            <div class=" col-3">
                                <label class="col-form-label" for="noWa">No Wa</label>
                            </div>
                            <div class="col-9">
                                <input type="text" id="noWa" class="form-control" name="noWa"
                                    placeholder="No Whatsapp" value="{{ $pesanan->whatsapp }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group row align-items-center">
                            <div class=" col-3">
                                <label class="col-form-label" for="alamat">Alamat</label>
                            </div>
                            <div class="col-9">
                                <textarea class="form-control" name="alamat" id="alamat" rows="5" readonly>{{ str_replace(['<br />', '<br>', '<br/>', "\n"], '', $pesanan->address) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <form action="{{ route('actionTambahStatus') }}" class="row" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-5">
                            <h4 class="card-title">Detail Pesanan </h4>
                        </div>
                        <div class="col-7">
                            <h4 class="card-title">Update status </h4>
                        </div>
                    </div>
                    @php
                        $items = explode(',', $pesanan->pesanan);
                        $qty = explode(',', $pesanan->jumlah);
                    @endphp
                    <div class="col-3">
                        <div class="form-group">
                            <label for="Pesanan">Pesanan</label>
                            @foreach ($items as $row)
                                <input type="text" class="form-control mb-2" id="Pesanan" readonly="readonly"
                                    value=" {{ $row }}">
                            @endforeach
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            @foreach ($qty as $row)
                                <input type="text" class="form-control mb-2" id="jumlah" readonly="readonly"
                                    value="{{ $row }}">
                            @endforeach
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-group">
                            <label for="tahap">Tahap</label>

                            {{-- {{ now()->format('H:i:s') }} --}}
                            @for ($i = 1; $i <= count($qty); $i++)
                                <div class="qtys_div[{{ $i }}]">
                                    @if ($pesanan->PesananLogs->isNotEmpty())
                                        @php
                                            $logsSorted = $pesanan->PesananLogs->sortByDesc('created_at');
                                            $logTerbaru = $logsSorted->first();
                                            $riwayat = explode(',', $logTerbaru['riwayat']);
                                        @endphp

                                        @if ($i <= count($riwayat))
                                            <input value="{{ $riwayat[$i - 1] }}" type="text"
                                                class="form-control mb-2 tahap_input" pattern="[A-Za-z0-9 ]+"
                                                title="Masukkan angka dan huruf saja">
                                        @else
                                            <input value="" type="text" class="form-control mb-2 tahap_input"
                                                pattern="[A-Za-z0-9 ]+" title="Masukkan angka dan huruf saja">
                                        @endif
                                    @else
                                        <input value="" type="text" class="form-control mb-2 tahap_input"
                                            pattern="[A-Za-z0-9 ]+" title="Masukkan angka dan huruf saja">
                                    @endif
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="qtys">Jumlah</label>
                            @for ($i = 1; $i <= count($qty); $i++)
                                <div class="qtys_div[{{ $i }}]">
                                    @if ($pesanan->PesananLogs->isNotEmpty())
                                        @php
                                            $logsSorted = $pesanan->PesananLogs->sortByDesc('created_at');
                                            $logTerbaru = $logsSorted->first();
                                            $qtyss = explode(',', $logTerbaru['qtys']);
                                        @endphp

                                        @if ($i <= count($qtyss))
                                            <input value="{{ $qtyss[$i - 1] }}" type="text"
                                                class="form-control mb-2 qty_input" pattern="[0-9]+"
                                                title="Masukkan angka saja">
                                        @else
                                            <input value="" type="text" class="form-control mb-2 qty_input"
                                                pattern="[0-9]+" title="Masukkan angka saja">
                                        @endif
                                    @else
                                        <input value="" type="text" class="form-control mb-2 qty_input"
                                            pattern="[0-9]+" title="Masukkan angka saja">
                                    @endif
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="invisible" for="btn_submit">Jumlah</label>
                            <button onclick="getAllData()" name="btn_submit" type="submit" href="#"
                                class="btn icon icon-left btn-primary btn-sm">
                                <i class="bi bi-check"></i> Save All
                            </button>
                        </div>
                    </div>
                    <input type="hidden" class="form-control mb-2" name="idnya" value="{{ $pesanan->id }}">
                    <input type="hidden" class="form-control mb-2" name="tahap_hasil" id="tahap_hasil">
                    <input type="hidden" class="form-control mb-2" name="qty_hasil" id="qty_hasil">
                </form>
                <div>
                    {{-- <button class="btn btn-primary" onclick="getAllData()">Get All</button> --}}

                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="body">
            <div class="row p-4">
                <h4 class="card-title">Riwayat Status</h4>

                @foreach ($pesanan->PesananLogs->sortByDesc('created_at') as $index => $pesananLog)
                    <div class="accordion" id="hasilriwayat{{ $index }}">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $index }}" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    Tanggal: {{ $pesananLog->created_at->format('d-m-Y') }}
                                    Waktu: {{ $pesananLog->created_at->format('H:i') }}
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}" class="accordion-collapse collapse"
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
            </div>
        </div>
    </div>
@endsection

@section('jscript')
    <script>
        let qtyinputinhidden = document.getElementById('qty_hasil');
        let tahapinputhidden = document.getElementById('tahap_hasil');

        let qtyInputs = document.getElementsByClassName('qty_input');
        let tahapInputs = document.getElementsByClassName('tahap_input');


        function getAllData() {

            let qtyValue = '';
            let tahapValue = '';
            for (let i = 0; i < qtyInputs.length; i++) {
                let currentQtyValue = qtyInputs[i].value.trim();
                let currentTahapValue = tahapInputs[i].value.trim();

                if (currentQtyValue === '') {
                    currentQtyValue = '0';
                }
                if (currentTahapValue === '') {
                    currentTahapValue = 'Pesanan dibuat';
                }

                tahapValue += currentTahapValue + ',';
                qtyValue += currentQtyValue + ',';
            }

            qtyValue = qtyValue.slice(0, -1);
            tahapValue = tahapValue.slice(0, -1);

            qtyinputinhidden.value = qtyValue;
            tahapinputhidden.value = tahapValue;
        }
        getAllData();
    </script>
@endsection
