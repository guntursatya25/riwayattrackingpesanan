@extends('admin.templates.master')
@section('title')
    Ulasan
@endsection

@section('cssthis')
    <link rel="stylesheet" href="{{ asset('assets/index/extensions/simple-datatables/style.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/index/compiled/css/table-datatable.css') }}" />
@endsection

@section('upkonten')
@endsection

@section('konten')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Ulasan</h3>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            {{-- {{ $ulasan }} --}}
            @if ($ulasan->isEmpty())
                Belum ada data
            @else
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <th>
                                Kode Pesanan
                            </th>
                            <th>Rating</th>
                            <th>
                                Komentar
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($ulasan as $index => $row)
                                <tr>
                                    <td>
                                        {{ $row->pesanan->kdpsn }}
                                    </td>
                                    <td>
                                        @for ($i = 1; $i <= $row->rating; $i++)
                                            <span class="bi bi-star-fill text-warning"></span>
                                        @endfor
                                    </td>
                                    <td>
                                        {{ $row->komen }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $ulasan->links() }}

                </div>
            @endif
        </div>

    </div>
@endsection

@section('jscript')
    <script src="{{ asset('assets/index/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/index/static/js/pages/simple-datatables.js') }}"></script>
@endsection
