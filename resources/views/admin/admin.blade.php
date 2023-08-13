@extends('admin.templates.master')

@section('cssthis')
    <link rel="stylesheet" href="{{ asset('assets/index/compiled/css/iconly.css') }}">
@endsection
@section('upkonten')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Hi, welcome {{ Auth::user()->username }}</h3>

        </div>
        {{-- <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Layout Vertical Navbar
                    </li>
                </ol>
            </nav>
        </div> --}}
    </div>
@endsection

@section('konten')
    <div class="col-9">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon purple mb-2">
                                    <?xml version="1.0" encoding="UTF-8"?>
                                    <!DOCTYPE svg
                                        PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        version="1.1" id="mdi-sync" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="#FFFFFF"
                                            d="M12,18A6,6 0 0,1 6,12C6,11 6.25,10.03 6.7,9.2L5.24,7.74C4.46,8.97 4,10.43 4,12A8,8 0 0,0 12,20V23L16,19L12,15M12,4V1L8,5L12,9V6A6,6 0 0,1 18,12C18,13 17.75,13.97 17.3,14.8L18.76,16.26C19.54,15.03 20,13.57 20,12A8,8 0 0,0 12,4Z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">
                                    Pesanan proses
                                </h6>
                                <h6 class="font-extrabold mb-0">{{ $jumlahProses }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon blue mb-2">
                                    <?xml version="1.0" encoding="UTF-8"?>
                                    <!DOCTYPE svg
                                        PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        version="1.1" id="mdi-truck-delivery-outline" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="#FFFFFF"
                                            d="M18 18.5C18.83 18.5 19.5 17.83 19.5 17C19.5 16.17 18.83 15.5 18 15.5C17.17 15.5 16.5 16.17 16.5 17C16.5 17.83 17.17 18.5 18 18.5M19.5 9.5H17V12H21.46L19.5 9.5M6 18.5C6.83 18.5 7.5 17.83 7.5 17C7.5 16.17 6.83 15.5 6 15.5C5.17 15.5 4.5 16.17 4.5 17C4.5 17.83 5.17 18.5 6 18.5M20 8L23 12V17H21C21 18.66 19.66 20 18 20C16.34 20 15 18.66 15 17H9C9 18.66 7.66 20 6 20C4.34 20 3 18.66 3 17H1V6C1 4.89 1.89 4 3 4H17V8H20M3 6V15H3.76C4.31 14.39 5.11 14 6 14C6.89 14 7.69 14.39 8.24 15H15V6H3M10 7L13.5 10.5L10 14V11.5H5V9.5H10V7Z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Pesanan dikirim</h6>
                                <h6 class="font-extrabold mb-0">{{ $jumlahDikirim }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon green mb-2">
                                    <?xml version="1.0" encoding="UTF-8"?>
                                    <!DOCTYPE svg
                                        PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        version="1.1" id="mdi-check-outline" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="#FFFFFF"
                                            d="M19.78,2.2L24,6.42L8.44,22L0,13.55L4.22,9.33L8.44,13.55L19.78,2.2M19.78,5L8.44,16.36L4.22,12.19L2.81,13.55L8.44,19.17L21.19,6.42L19.78,5Z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Pesanan Selesai</h6>
                                <h6 class="font-extrabold mb-0">{{ $jumlahSelesai }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-9">
        <div class="card">
            <div class="card-header">
                <h4>Ulasan terbaru</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-lg">
                        <thead>
                            <tr>
                                <th>Kode Pesanan</th>
                                <th>Komentar</th>
                                <th>Star</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ulasan as $index => $row)
                                <tr>
                                    <td class="col-3">
                                        <p class="font-bold ms-3 mb-0">{{ $row->pesanan->no_pesanan }}</p>
                                    </td>
                                    <td class="col-auto">
                                        <p class="mb-0">
                                            {{ $row->komen }}
                                        </p>
                                    </td>
                                    <td>
                                        @for ($i = 1; $i <= $row->rating; $i++)
                                            <span class="bi bi-star-fill "></span>
                                            {{-- <span class="bi bi-star "></span> --}}
                                        @endfor

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
