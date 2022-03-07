@extends('frontend.layouts.master')
@section('title', 'Daftar Transaksi')

@section('content')
    @php
    $route = Route::current()->getName();
    @endphp
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Transaksi</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="active">daftar transaksi</li>
                            <li class="active">pesanan saya</li>
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
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><i class="fas fa-shopping-bag"></i> Belanja</th>
                                        <th>Invoice</th>
                                        <th>Pembayaran</th>
                                        <th>Total Belanja</th>
                                        <th>Status</th>
                                        <th width="16%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>
                                                {{ $order->order_date }} <br>
                                            </td>
                                            <td>{{ $order->invoice_number }}/00{{ $order->id }}/00{{ $order->user_id }}
                                            </td>
                                            <td>{{ $order->payment_method }}</td>
                                            <td><strong>Rp{{ number_format($order->totalbayar, 2, ',', '.') }}</strong>
                                            </td>
                                            <td>
                                                @if ($order->shipping_status == 'Dikemas')
                                                    <span class="label label-info"> Dikemas </span>
                                                @elseif ($order->shipping_status == 'Dikirim')
                                                    <span class="label label-primary"> Dikirim </span>
                                                @elseif ($order->shipping_status == 'Tiba di Tujuan')
                                                    <span class="label label-success"> Tiba di Tujuan </span>
                                                @endif
                                                <span style="margin-left: 3px;"></span>
                                                @if ($order->order_status == 'Diproses')
                                                    <span class="label label-info"> Diproses </span>
                                                @elseif ($order->order_status == 'Selesai')
                                                    <span class="label label-success"> Selesai </span>
                                                @elseif ($order->order_status == 'Dibatalkan')
                                                    <span class="label label-danger"> Dibatalkan </span>
                                                @endif
                                            </td>
                                            <td align="right"><a href="{{ url('user/order_details/' . $order->id) }}"
                                                    class="btn btn-sm btn-default" style="padding: 3px 20px">
                                                    <i class="fas fa-print"></i> Detail Transaksi
                                                </a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
