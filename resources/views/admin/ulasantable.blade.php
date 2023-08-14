@extends('admin.templates.master')
@section('title')
    Ulasan
@endsection

@section('cssthis')
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
        {{ $ulasan }}
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped dataTable-table">
                    <thead>
                        <th>
                            Kode Pesanan
                        </th>
                        <th>
                            Komentar
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($ulasan as $row)
                            <tr>
                                <td>
                                    {{ $row->kdpsn }}
                                </td>
                                <td>
                                    {{ $row->komen }}
                                </td>
                                <td>
                                    @for ($i = 1; $i <= $row->rating; $i++)
                                        <span class="bi bi-star-fill "></span>
                                    @endfor
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

@section('jscript')
@endsection
