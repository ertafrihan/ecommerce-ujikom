@extends('frontend.layouts.check')
@section('title', 'Detail Transaksi')

@section('content')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Transaksi</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">Beranda</a></li>
                            <li><a href="{{ route('order-list') }}">Daftar Transaksi</a></li>
                            <li class="active">detail transaksi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="page-wrapper">
        <div class="checkout shopping">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h4 class="widget-title">Detail Produk</h4>
                        @foreach ($orderItem as $item)
                            <div class="media product-card">
                                <a class="pull-left" href="#">
                                    <img class="img-checkout" src="{{ asset($item->product->product_thumbnail) }}"
                                        alt="Image" />
                                </a>
                                <div class="media-body">
                                    <h4 style="font-size: 16px; font-weight: 500" class="media-heading">
                                        {{ $item->product->product_name }}</h4>
                                    <span style="float: right">
                                        <a href="#" class="btn btn-default" style="padding: 6px 40px">Beli Lagi</a>
                                    </span>
                                    <p class="">{{ $item->size }} -
                                        {{ $item->color }}</p>
                                    {{-- <p>{{ $item->product->product_code }}</p> --}}
                                    <p style="font-size: 14px">{{ $item->qty }} produk
                                        ({{ $item->weight }} gr)
                                        x</p>
                                    <h5 class="">
                                        Rp{{ number_format($item->price, 0, ',', '.') }}</h5>
                                </div>
                            </div>
                        @endforeach

                        <h4 class="widget-title mt-50">Info Pengiriman</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Status (Pengiriman)</p>
                                <p>Kurir</p>
                                <p>Nomor Resi</p>
                                <p>Alamat</p>
                            </div>
                            <div class="col-md-8">
                                <p>
                                    <span style="margin-right: 10px">:</span>
                                    @if ($order->shipping_status == 'Dikemas')
                                        <span class="label label-info"> Dikemas </span>
                                    @elseif ($order->shipping_status == 'Dikirim')
                                        <span class="label label-primary"> Dikirim </span>
                                    @elseif ($order->shipping_status == 'Tiba di Tujuan')
                                        <span class="label label-success"> Tiba di Tujuan </span>
                                        <span class="label label-default" style="margin-left: 3px"> Diterima oleh {{ $order->name }}</span>
                                    @endif
                                </p>
                                <p style="text-transform: uppercase">
                                    <span style="margin-right: 10px">:</span>
                                    {{ $order->kurir }} - {{ $order->service }}
                                </p>
                                <p class="text-success">
                                    <span style="margin-right: 10px">:</span>
                                    {{ $order->resi }}
                                    <i class="fas fa-copy"></i>
                                </p>
                                <p style="margin-bottom: 3px">
                                    <span style="margin-right: 10px">:</span>
                                    {{ $order->name }} ({{ $order->email }})
                                </p>
                                <p style="margin-left: 15px; margin-bottom: 3px;">{{ $order->phone }}</p>
                                <p style="margin-left: 15px; margin-bottom: 3px;">{{ $order->address }},
                                    {{ $order->nama_kota }}, {{ $order->nama_provinsi }}, {{ $order->postcode }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="product-checkout-details">
                            <div class="block" style="margin-top: -63px;">
                                <h4 class="widget-title" style="margin-top: 59px;">Rincian Pembayaran</h4>
                                <ul class="summary-prices">
                                    <li>
                                        <span>Status (Pesanan)</span>
                                        @if ($order->order_status == 'Diproses')
                                            <span style="padding: 4px 12px 3px;" class="label label-info"> Diproses </span>
                                        @elseif ($order->order_status == 'Selesai')
                                            <span style="padding: 4px 12px 3px;" class="label label-success"> Selesai
                                            </span>
                                        @elseif ($order->order_status == 'Dibatalkan')
                                            <span style="padding: 4px 12px 3px;" class="label label-danger"> Dibatalkan
                                            </span>
                                        @endif
                                    </li>
                                    <li>
                                        <span>Nomor Invoice</span>
                                        @if ($order->order_status == 'Selesai')
                                            <a href="{{ url('user/invoice-p/' . $order->id) }}" target="_blank"
                                                class="text-success" style="float: right; ">
                                                <i class="fas fa-print"></i>
                                                {{ $order->invoice_number }}/00{{ $order->id }}/00{{ $order->user_id }}
                                            </a>
                                        @else
                                            <span>
                                                <i class="fas fa-print"></i>
                                                {{ $order->invoice_number }}/00{{ $order->id }}/00{{ $order->user_id }}
                                            </span>
                                        @endif
                                    </li>
                                    <li>
                                        <span>Tanggal Pembelian</span>
                                        <span class="">{{ $order->order_date }}</span>
                                    </li>
                                </ul>
                                <ul class="summary-prices mt-20">
                                    <li>
                                        <span>Metode Pembayaran</span>
                                        <span class="">{{ $order->payment_method }}</span>
                                    </li>
                                    <li>
                                        <span>
                                            Total Harga ({{ $order->totalqty }} produk)
                                        </span>
                                        <span
                                            class="">Rp{{ number_format($order->totalbelanja, 0, '', '.') }}</span>
                                    </li>
                                    <li>
                                        <span>
                                            Total Ongkos Kirim ({{ number_format($order->totalberat, 0, ',', '.') }} gr)
                                        </span>
                                        <span
                                            class="">Rp{{ number_format($order->totalongkir, 0, '', '.') }}</span>
                                    </li>
                                    <li>
                                        <span>
                                            <strong style="font-size: 16px">Total Belanja</strong>
                                        </span>
                                        <span class="">
                                            <strong
                                                style="font-size: 16px">Rp{{ number_format($order->totalbayar, 2, ',', '.') }}</strong>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
