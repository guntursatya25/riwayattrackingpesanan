@extends('admin.templates.master')

@section('upkonten')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Vertical Layout with Navbar</h3>
            <p class="text-subtitle text-muted">
                Navbar will appear on the top of the page.
            </p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
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
        </div>
    </div>
@endsection

@section('konten')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">About Vertical Navbar</h4>
        </div>
        <div class="card-body">
            <p>
                Vertical Navbar is a layout option that you can use with
                Mazer.
            </p>

            <p>
                In case you want the navbar to be sticky on top while
                scrolling, add <code>.navbar-fixed</code> class alongside
                with <code>.layout-navbar</code> class.
            </p>
        </div>
    </div>
@endsection
