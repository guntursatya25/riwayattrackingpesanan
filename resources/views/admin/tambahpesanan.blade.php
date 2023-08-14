@extends('admin.templates.master')

@section('title')
    Tambah Pesanan
@endsection

@section('upkonten')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Tambah Pesanan</h3>
        </div>
    </div>
@endsection

@section('konten')
    <div class="card">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible show fade">
                            <strong>{{ $message }}</strong>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                Form Pesanan
                            </h4>
                            <div class="row">
                                <div class="col-lg-9">
                                    <form action="{{ route('pesanan.store') }}" method="POST" id="pesananForm"
                                        class="">
                                        @csrf
                                        <h5 class="card-subtitle">Pelanggan</h5>
                                        <div class="col-12">
                                            <div class="row">
                                                <div id="kolompesanan" class="col-6">
                                                    <label for="pesanan">Pesanan</label>
                                                    <div class="row mb-2">
                                                        <div class="col">
                                                            <input type="text" name="namapesanan"
                                                                class="form-control barang">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="kolomjumlah" class="col-6">
                                                    <label for="jumlah">Jumlah</label>
                                                    <div class="row mb-2">
                                                        <div class="col">
                                                            <input type="text" name="jumlah"
                                                                class="form-control jumlah">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col d-flex justify-content-center">
                                            <button type="button" onclick="addItems()" class="btn btn-secondary btn-sm">
                                                <i class="bi bi-plus"></i>
                                            </button>
                                            <button class="btn btn-danger ms-2" type="button" onclick="removeItem()">
                                                <i class="bi bi-dash"></i>
                                            </button>
                                        </div>

                                        <div class="text-center mt-2">
                                            <input type="hidden" id="itemDataInput" name="itemData" placeholder="items">
                                            <input type="hidden" id="quantityDataInput" name="quantityData"
                                                placeholder="jumlah">

                                            <button type="submit" onclick="captureData()"
                                                class="btn btn-primary">Simpan</button>
                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                        </div>
                                    </form>
                                    {{-- <button type="button" onclick="captureData()" class="btn btn-primary">get</button> --}}
                                </div>

                            </div>
                        </div>
                        @if ($errors->any())
                            <div class="row">
                                <div class="col-md-6">
                                    @error('itemData')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Warning</strong>
                                            <p>Isi pesanan</p>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-5">
                                    @error('quantityData')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Warning</strong>
                                            <p>
                                                Isi jumlah
                                            </p>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection

@section('jscript')
    <script>
        function addItems() {
            var kolomPesanan = document.getElementById("kolompesanan");
            var kolomJumlah = document.getElementById("kolomjumlah");

            var orderItem = document.createElement("div");
            orderItem.setAttribute("class", "row mb-2 ulangin");
            var orderItem2 = document.createElement("div");
            orderItem2.setAttribute("class", "row mb-2 ulangin");

            var html1 = `<div class="col"><input type="text" name="jumlah" class="form-control jumlah"></div>`;
            var html2 = `<div class="col"><input type="text" name="namapesanan" class="form-control barang"></div>`;

            orderItem.innerHTML = html1;
            orderItem2.innerHTML = html2;

            kolomJumlah.appendChild(orderItem);
            kolomPesanan.appendChild(orderItem2);
        }

        function removeItem() {
            var kolomPesanan = document.getElementById("kolompesanan");
            var kolomJumlah = document.getElementById("kolomjumlah");

            var lastPesananRow = kolomPesanan.querySelector('.ulangin:last-of-type');
            var lastJumlahRow = kolomJumlah.querySelector('.ulangin:last-of-type');

            kolomPesanan.removeChild(lastPesananRow);
            kolomJumlah.removeChild(lastJumlahRow);
            input1Values.pop();
            input2Values.pop();
        }

        function captureData() {
            let qtyInputs = document.getElementsByClassName('jumlah');
            let itemInputs = document.getElementsByClassName('barang');

            var itemData = "";
            var quantityData = "";

            for (var i = 0; i < qtyInputs.length; i++) {
                var itemInput = itemInputs[i].value;
                var quantityInput = qtyInputs[i].value;

                itemData += itemInput + ",";
                quantityData += quantityInput + ",";
            }

            document.getElementById("itemDataInput").value = itemData.slice(0, -1);
            document.getElementById("quantityDataInput").value = quantityData.slice(0, -1);
        }
    </script>
@endsection
