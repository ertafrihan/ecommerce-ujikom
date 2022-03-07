@extends('frontend.layouts.master')
@section('title', 'Profil Saya')

@section('content')
    @php
    $route = Route::current()->getName();
    @endphp
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Profil</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="active">profil saya</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="user-dashboard page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline dashboard-menu">
                        <li><a class="{{ $route == 'dashboard' ? 'active' : '' }}"
                                href="{{ route('dashboard') }}">Dasbor</a></li>
                        <li><a class="{{ $route == 'user.profile' ? 'active' : '' }}"
                                href="{{ route('user.profile') }}">Profil Saya</a></li>
                        <li><a class="{{ $route == 'order-list' ? 'active' : '' }}"
                                href="{{ route('order-list') }}">Daftar Transaksi</a></li>
                    </ul>
                    <div class="dashboard-wrapper dashboard-user-profile">
                        <div class="row">
                            <div class="col-md-2" href="#!">
                                <img class="media-object"
                                    src="{{ !empty($user->profile_photo_path)? url('upload/user-images/' . $user->profile_photo_path): url('upload/no-img.jpg') }}"
                                    alt="Image" style="width: 165px;">
                            </div>
                            <form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="" for="nama">Nama <span> </span></label>
                                        <input type="text" id="nama" name="name" class="form-control"
                                            value="{{ $user->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="" for="foto">Ubah Foto <span> </span></label>
                                        <input type="file" id="foto" name="profile_photo_path" class="form-control"
                                            value="{{ $user->email }}">
                                    </div>
                                    <button type="submit" class="btn btn-main" style="margin-top: 20px; display: block; width: 100%;">
                                        <i class="fas fa-user-shield"></i> Perbarui Profil
                                    </button>
                                </div>
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label class="" for="email">Email <span> </span></label>
                                                <input type="text" id="email" name="email" class="form-control"
                                                    value="{{ $user->email }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="" for="alamat">Alamat <span> </span></label>
                                                <textarea name="address" id="alamat" class="form-control"
                                                    placeholder="Jl. Babakantiga No.82 Ciwidey, 40973" cols="10"
                                                    rows="5">{{ $user->address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="" for="HP">Nomor HP <span> </span></label>
                                                <input type="text" id="HP" name="phone" class="form-control"
                                                    value="{{ $user->phone }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="" for="postcode">Kode Pos <span> </span></label>
                                                <input type="text" id="postcode" name="postcode" class="form-control"
                                                    value="{{ $user->postcode }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
