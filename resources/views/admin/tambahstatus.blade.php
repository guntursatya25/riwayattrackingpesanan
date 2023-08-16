@extends('admin.templates.master')
@section('title')
    Status Riwayat Pesanan
@endsection
@section('cssthis')
    <style>
        .alert {
            --bs-alert-margin-bottom: 0;
            --bs-alert-padding-y: 0.4rem;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('assets/index/extensions/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('upkonten')
    <div class="row">

        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Status Pesanan</h3>


        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <div class="float-start float-lg-end">
                <button type="button" class="btn btn-secondary"> <a href="{{ route('tracking') }}" class="text-white">
                        <span class="bi bi-arrow-left"></span> Kembali</a>
                </button>
            </div>
        </div>
    </div>
@endsection
@section('konten')
    <div class="card">
        <div class="card-body">
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
                <span>Kode Pesanan : {{ $pesanan->kdpsn }}</span>
                <div class="row">
                    <div class="col-5">
                        <h4 class="card-title">Detail Pesanan </h4>
                    </div>
                    <div class="col-7">
                        <h4 class="card-title">Update Status </h4>
                    </div>
                </div>
                <form action="{{ route('actionTambahStatus') }}" class="row" method="POST">
                    @csrf
                    @php
                        $items = explode(',', $pesanan->namabarang);
                        $qty = explode(',', $pesanan->jumlah);
                    @endphp
                    <div class="col-3">
                        <div class="form-group">
                            <label for="Pesanan">Pesanan</label>
                            @foreach ($items as $row)
                                <input type="text" class="form-control mb-2" name="Pesanan" readonly="readonly"
                                    value=" {{ $row }}">
                            @endforeach
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            @foreach ($qty as $row)
                                <input type="number" class="form-control mb-2" name="jumlah" readonly="readonly"
                                    value="{{ $row }}">
                            @endforeach
                        </div>
                    </div>

                    <div class="col-3">
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
                                        {{-- AAA --}}
                                        @if ($i <= count($qtyss))
                                            <input value="{{ $qtyss[$i - 1] }}" class="form-control mb-2 qty_input"
                                                type="number" pattern="[0-9]+" max="{{ $qty[$i - 1] }}"
                                                title="Masukkan angka saja" oninput="checkMaxValue(this)"
                                                name="quan{{ $i }}">
                                        @else
                                            <input value="" type="number" class="form-control mb-2 qty_input"
                                                pattern="[0-9]+" title="Masukkan angka saja">
                                        @endif
                                    @else
                                        <input value="" type="number" class="form-control mb-2 qty_input"
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
                    <div class="row">
                        <div class="col-3">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="status">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="Proses" {{ $pesanan->status === 'Proses' ? 'selected' : '' }}>Proses
                                    </option>
                                    <option value="Dikirim" {{ $pesanan->status === 'Dikirim' ? 'selected' : '' }}>Dikirim
                                    </option>
                                    <option value="Selesai" {{ $pesanan->status === 'Selesai' ? 'selected' : '' }}>Selesai
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-7 ms-2 ">
                            <div id="maxValueError" style="display: none;"
                                class="alert alert-light-danger color-danger error-message">
                                <i class="bi bi-exclamation-circle"></i> Nilai melebihi batas maksimum jumlah pesanan
                            </div>
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
        <div class="card-body">
            <div class="row p-4">
                <h4 class="card-title">Riwayat Status</h4>
                @if ($pesanan->PesananLogs->isNotEmpty())
                    <div class="row">
                        @foreach ($pesanan->PesananLogs->sortByDesc('created_at') as $index => $pesananLog)
                            <div class="col-9">
                                <div class="accordion" id="hasilriwayat{{ $index }}">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                                aria-expanded="false" aria-controls="flush-collapseOne">
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
                                                <table class="table table-hover ">

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
                            </div>
                            <div class="col-3 d-flex justify-content-center align-items-center">
                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col-2 me-3">
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modal{{ $pesananLog->id }}">Edit</button>
                                    </div>
                                    <div class="col-2 ms-3">
                                        <button class="btn btn-danger">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                @else
                    <p>Belum ada riwayat status</p>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('modal')
    @if ($pesanan->PesananLogs->isNotEmpty())
        @foreach ($pesanan->PesananLogs->sortByDesc('created_at') as $index => $pesananLog)
            <!-- Modal -->
            <div class="modal fade" id="modal{{ $pesananLog->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="modalLabel{{ $pesananLog->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg"">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @php
                                $qtys = explode(',', $pesananLog->qtys);
                                $status = explode(',', $pesananLog->riwayat);
                                $barang = explode(',', $pesanan->namabarang);
                                $jqty = explode(',', $pesanan->jumlah);
                            @endphp
                            {{-- {{ $pesananLog }}
                            <hr>
                            {{ $pesanan }} --}}
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title">Detail Pesanan </h5>
                                </div>
                                <div class="col-6">
                                    <h5 class="card-title">Update Status </h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label for="">Pesanan</label>
                                    @foreach ($barang as $dbarang)
                                        <input type="text" class="form-control modalnamabarang mt-2"
                                            value="{{ $dbarang }}" readonly>
                                    @endforeach
                                </div>
                                <div class="col-2">
                                    <label for="">Jumlah</label>
                                    @foreach ($jqty as $djqty)
                                        <input type="number" class="form-control modaljumlahbarang mt-2"
                                            value="{{ $djqty }}" readonly>
                                    @endforeach
                                </div>
                                <div class="col-4">
                                    <label for="">Tahap</label>
                                    @foreach ($status as $dstatus)
                                        <input type="text" class="form-control modaltahap mt-2"
                                            value="{{ $dstatus }}">
                                    @endforeach
                                </div>
                                <div class="col-2">
                                    <label for="">Jumlah</label>
                                    @foreach ($qtys as $dqtys)
                                        <input type="number" max="{{ $dqtys }}"
                                            class="form-control modaljumlah mt-2" value="{{ $dqtys }}">
                                    @endforeach
                                </div>
                            </div>


                        </div>
                        <form action="{{ route('actionUpdateStatus') }}" method="POST">
                            @csrf
                            <input type="hidden" name="idstatus" value="{{ $pesananLog->id }}">
                            {{-- <input type="hidden" name="nambar" id="nambar" class="nambar"
                                value="{{ $pesanan->namabarang }}">
                            <input type="hidden" name="jumbar" id="jumbar" class="jumbar"
                                value="{{ $pesanan->jumlah }}"> --}}
                            <input type="hidden" name="tahapbar" id="tahapbar" class="tahapbar"
                                value="{{ $pesananLog->riwayat }}">
                            <input type="hidden" name="jumtapbar" id="jumtapbar" class="jumtapbar"
                                value="{{ $pesananLog->qtys }}">
                            {{-- <button type="button" class="btn btn-success" data-index="{{ $pesananLog->id }}"
                                onclick="capturedatamodal(this)">Capture</button> --}}

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" id="toast-success" class="btn btn-primary"
                                    data-index="{{ $pesananLog->id }}" onclick="capturedatamodal(this)">Simpan</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection

@section('jscript')
    <script>
        function capturedatamodal(button) {
            let index = button.getAttribute('data-index');

            // let namabarang = document.getElementById('nambar');
            // let jumlahbarang = document.getElementById('jumbar');
            // let tahapan = document.getElementById('tahapbar');
            // let jumlahtahapan = document.getElementById('jumtapbar');

            // let itemValue = '';
            // let jumlahasliValue = '';
            let aslitahapValue = '';
            let jumlahValue = '';

            let modal = document.getElementById('modal' + index);

            // let itemInputs = modal.getElementsByClassName('modalnamabarang');
            // let jmlhaslibarang = modal.getElementsByClassName('modaljumlahbarang');
            let tahapInputsmodal = modal.getElementsByClassName('modaltahap');
            let jumlahInputs = modal.getElementsByClassName('modaljumlah');

            // let namabarang = modal.querySelector('#nambar');
            // let jumlahbarang = modal.querySelector('#jumbar');
            let tahapan = modal.querySelector('#tahapbar');
            let jumlahtahapan = modal.querySelector('#jumtapbar');

            for (let i = 0; i < tahapInputsmodal.length; i++) {
                // let currentitemInputs = itemInputs[i].value.trim();
                // let currentqtyInputs = jmlhaslibarang[i].value.trim();
                let currenttahapInputs = tahapInputsmodal[i].value.trim();
                let currentjumlahInputs = jumlahInputs[i].value.trim();

                // itemValue += currentitemInputs + ',';
                // jumlahasliValue += currentqtyInputs + ',';
                aslitahapValue += currenttahapInputs + ',';
                jumlahValue += currentjumlahInputs + ',';
            }

            // itemValue = itemValue.slice(0, -1);
            // jumlahasliValue = jumlahasliValue.slice(0, -1);
            aslitahapValue = aslitahapValue.slice(0, -1);
            jumlahValue = jumlahValue.slice(0, -1);

            // namabarang.value = itemValue;
            // jumlahbarang.value = jumlahasliValue;
            tahapan.value = aslitahapValue;
            jumlahtahapan.value = jumlahValue;

            // console.log(namabarang, jumlahbarang, tahapan, jumlahtahapan);
        }

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

        function checkMaxValue(input) {
            var maxValue = parseFloat(input.getAttribute('max'));
            var value = parseFloat(input.value);
            var errorMessage = document.getElementById('maxValueError');


            if (value > maxValue) {
                errorMessage.style.display = 'block';
            } else {
                errorMessage.style.display = 'none';
            }
        }
    </script>
    <script src="{{ asset('assets/index/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/index/static/js/pages/sweetalert2.js') }}"></script>
    <script>
        @if ($message = Session::get('sukses'))
            Toast.fire({
                icon: 'success',
                title: '{{ $message }}'
            })
        @endif
        // document.getElementById('toast-success').addEventListener('click', () => {
        //     Toast.fire({
        //         icon: 'success',
        //         title: '{{ $message }}'
        //     })
        // })

        // Toast.fire({
        //     icon: 'success',
        //     title: 'Signed in successfully'
        // })
    </script>
@endsection
