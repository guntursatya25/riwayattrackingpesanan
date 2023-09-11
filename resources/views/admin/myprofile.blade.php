@extends('admin.templates.master')
@section('title')
    Profil
@endsection
@section('konten')
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#profil" role="tab"
                        aria-controls="profil" aria-selected="true">Edit Profile</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#settings" role="tab"
                        aria-controls="settings" aria-selected="false" tabindex="-1">Setting</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active py-3 px-1" id="profil" role="tabpanel" aria-labelledby="home-tab">
                    <form action="{{ route('actionupdateprofil') }}" method="POST">
                        @csrf
                        <input type="hidden" name="idnya" value="{{ Auth::user()->id }}">
                        <div class="col-6">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label" for="nama">Nama</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ Auth::user()->name }}" placeholder="Nama">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label" for="username">Username</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="text" class="form-control" id="username" name="username"
                                        value="{{ Auth::user()->username }}" placeholder="Nama">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label" for="email">email</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="{{ Auth::user()->email }}" placeholder="Nama">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </form>
                </div>
                {{-- <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab">
                    -
                </div> --}}
            </div>
        </div>
    </div>
@endsection
