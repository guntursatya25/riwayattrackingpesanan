@extends('admin.templates.master')

@section('title')
    Status Pesanan
@endsection

@section('cssthis')
    {{-- <link rel="stylesheet" href="{{ asset('assets/index/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/index/compiled/css/table-datatable.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/index/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/index/compiled/css/table-datatable.css') }}">
    @livewireStyles
@endsection

@section('upkonten')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Riwayat Status Pesanan</h3>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <svg class="bd-placeholder-img rounded me-2" width="20" height="20"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice"
                        focusable="false">
                        <rect width="100%" height="100%" fill="#007aff"></rect>
                    </svg>
                    <strong class="me-auto">Berhasil</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ $message }}
                </div>
            </div>
        </div>
    @endif
@endsection

@section('konten')
    <div class="card">
        <div class="card-body">
            @livewire('table-tracking')
        </div>
    </div>
@endsection

@section('modal')
    @livewire('modal-tracking')
@endsection
{{-- @push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush --}}
@section('jscript')
    <script>
        const myToastEl = document.getElementById('tosku')
        myToastEl.addEventListener('shown.bs.toast', () => {})

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

        function addItems() {
            var kolomPesanan = document.getElementById("kolompesanan");
            var kolomJumlah = document.getElementById("kolomjumlah");

            var orderItem = document.createElement("div");
            orderItem.setAttribute("class", "row mb-2 ulangin");
            var orderItem2 = document.createElement("div");
            orderItem2.setAttribute("class", "row mb-2 ulangin");

            var html1 = `<div class="col"><input type="text" name="jumlahku[]" id="pesanan" class="form-control"></div>`;
            var html2 = `<div class="col"><input type="text" name="pesananku[]" id="pesanan" class="form-control"></div>`;

            orderItem.innerHTML = html1;
            orderItem2.innerHTML = html2;

            kolomJumlah.appendChild(orderItem);
            kolomPesanan.appendChild(orderItem2);
        }

        function combineValues() {
            const input1Elements = document.querySelectorAll('input[name="pesananku[]"]');
            const input2Elements = document.querySelectorAll('input[name="jumlahku[]"]');

            var input1Values = [];
            var input2Values = [];

            for (var i = 0; i < input1Elements.length; i++) {
                var itemPesanan = input1Elements[i].value;
                var quantityInput = input2Elements[i].value;

                input1Values.push(itemPesanan);
                input2Values.push(quantityInput);
            }

            var hiddenInputPesanan = document.getElementById('hiddenInputPesanan');
            var hiddenInputJumlah = document.getElementById('hiddenInputJumlah');
            hiddenInputPesanan.value = input1Values.join(',');
            hiddenInputJumlah.value = input2Values.join(',');

            hiddenInputPesanan.dispatchEvent(new Event('input'));
            hiddenInputJumlah.dispatchEvent(new Event('input'));
        }
    </script>
    <script src="{{ asset('assets/index/extensions/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('assets/index/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/index/static/js/pages/simple-datatables.js') }}"></script>

    <script src="{{ asset('assets/index/static/js/pages/component-toasts.js') }}"></script>
    <script>
        window.addEventListener('show-view-modal', event => {
            $('#viewModal').modal('show');
        });
        document.addEventListener('show-delete-modal', event => {
            $('#deleteModal').modal('show');
        });
        document.addEventListener('show-status-modal', event => {
            $('#statusModal').modal('show');
        });
        window.addEventListener('close-modal', event => {
            // $('#addStudentModal').modal('hide');
            // $('#editStudentModal').modal('hide');
            // $('#deleteStudentModal').modal('hide');
            $('#viewModal').modal('hide');
            $('#deleteModal').modal('hide');
            $('#statusModal').modal('hide');


        });
    </script>

    @livewireScripts
@endsection
