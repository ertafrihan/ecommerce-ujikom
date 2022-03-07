@extends('frontend.layouts.master')
@section('title', 'Dasbor')

@section('content')
    @php
    $route = Route::current()->getName();
    @endphp
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Dasbor</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="active">dasbor</li>
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
                    <div class="dashboard-wrapper user-dashboard">
                        <div class="row">
                            <div class="col-md-3">
                                <img class=""
                                    src="{{ !empty($user->profile_photo_path)? url('upload/user-images/' . $user->profile_photo_path): url('upload/no-img.jpg') }}"
                                    alt="Image" style="width: 250px">
                            </div>
                            <div class="col-md-9">
                                <h2 class="media-heading"><em>Sampurasun</em>, <span style="font-weight: 500">{{ Auth::user()->name }}</span>!</h2>
                                <h4>({{ Auth::user()->phone }}) - {{ Auth::user()->email }}</h4>
                                <p>Alamat : {{ Auth::user()->address }}, {{ Auth::user()->postcode }}</p>
                                <div class="total-order mt-30">
                                    <h4>Deskripsi Statis</h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi dolor iusto consequuntur assumenda labore dicta, nihil, vitae nesciunt ducimus quasi tempore nostrum officia praesentium natus, explicabo iure totam officiis eligendi?</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
