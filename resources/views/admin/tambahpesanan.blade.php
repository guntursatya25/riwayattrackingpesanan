@extends('admin.templates.master')
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
                                <div class="col-lg-6">
                                    <form action="{{ route('pesanan.store') }}" method="POST" id="pesananForm"
                                        class="">
                                        @csrf
                                        <h5 class="card-subtitle">Pelanggan</h5>
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <div class="form-floating">
                                                    <input name="nama" type="text"
                                                        class="form-control @error('nama') is-invalid @enderror"
                                                        id="floatingName" placeholder="Name" value="{{ old('nama') }}">
                                                    <label for="floatingName">Nama</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input name="email" type="email" class="form-control"
                                                        id="floatingEmail" placeholder="Email" value="{{ old('email') }}">
                                                    <label for="floatingEmail">Email</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input name="noWa" type="text" class="form-control"
                                                        id="floatingnoWA" placeholder="noWA" value="{{ old('noWa') }}">
                                                    <label for="floatingnoWA">Whatsapp</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating">
                                                    <textarea name="address" class="form-control  @error('address') is-invalid @enderror"
                                                        placeholder="Address value="{{ old('address') }}"" id="floatingTextarea" style="height: 100px;"></textarea>
                                                    <label for="floatingTextarea">Alamat lengkap</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center mt-2">
                                            <input type="hidden" id="itemDataInput" name="itemData">
                                            <input type="hidden" id="quantityDataInput" name="quantityData">
                                            <input name="track_order" type="hidden" id="statusDataInput">

                                            <button onclick="captureData()" type="submit"
                                                class="btn btn-primary">Simpan</button>
                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-6">
                                    <div id="orderContainer">
                                        <div class="order-item">
                                            <h5 class="card-subtitle">Pesanan</h5>
                                            <div class="row g-3 mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control " name="item[]"
                                                            id="Pesanan" placeholder="Pesanan" required>
                                                        <label for="Pesanan">Pesanan</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-floating">
                                                        <input type="number" class="form-control" name="quantity[]"
                                                            id="floatingJumlah" placeholder="Jumlah" required>
                                                        <label for="floatingJumlah">Jumlah</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 d-flex align-items-center justify-content-center">
                                                    <button class="btn btn-primary btn-sm" onclick="addItem()"><i
                                                            class="bi bi-plus"></i></button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->any())
                                        <div class="row">
                                            <div class="col-md-6">
                                                @error('itemData')
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <strong>Warning</strong>
                                                        <p>Isi pesanan</p>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-5">
                                                @error('quantityData')
                                                    <div class="alert alert-danger alert-dismissible fade show"
                                                        role="alert">
                                                        <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
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
        function addItem() {
            var orderContainer = document.getElementById("orderContainer");
            var orderItem = document.createElement("div");
            orderItem.className = "order-item";
            var html = `
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" name="item[]" id="Pesanan" placeholder="Pesanan">
                    <label for="Pesanan">Pesanan</label>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-floating">
                    <input type="number" class="form-control" name="quantity[]" id="floatingJumlah" placeholder="Jumlah">
                        <label for="floatingJumlah">Jumlah</label>
                </div>
            </div>
                <div class="col-md-1 d-flex align-items-center justify-content-center">
                    <button class="btn btn-primary btn-sm" onclick="removeItem(this)"><i class="bi bi-dash""></i></button>            
                </div>
            </div>
        </div>
`;
            orderItem.innerHTML = html;
            orderContainer.appendChild(orderItem);
        }

        function removeItem(button) {
            var orderItem = button.closest(".order-item");
            var orderContainer = orderItem.parentNode;
            orderContainer.removeChild(orderItem);
        }

        function captureData() {
            var orderItems = document.getElementsByClassName("order-item");
            var table = document.getElementById("orderTable");

            var itemData = "";
            var quantityData = "";
            var track_order = "";

            for (var i = 0; i < orderItems.length; i++) {
                var itemInput = orderItems[i].getElementsByTagName("input")[0].value;
                var quantityInput = orderItems[i].getElementsByTagName("input")[1].value;

                itemData += itemInput + ",";
                quantityData += quantityInput + ",";
                track_order += "masuk" + ",";
            }

            document.getElementById("itemDataInput").value = itemData.slice(0, -1);
            document.getElementById("statusDataInput").value = track_order.slice(0, -1);
            document.getElementById("quantityDataInput").value = quantityData.slice(0, -1);
        }
    </script>
@endsection
