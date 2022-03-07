@extends('admin.layouts.backend')
@section('title', 'Order Details')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Detail Transaksi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a class="" href="{{ route('all.transaction') }}">Data Transaksi</a>
                            </li>
                            <li class="breadcrumb-item active">transaction details</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Data Pembayaran</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <td>Nama</td>
                                        <td width="2%">:</td>
                                        <td>{{ $order->user->name }} | {{ $order->user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>No. HP</td>
                                        <td>:</td>
                                        <td>{{ $order->user->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Pesanan</td>
                                        <td>:</td>
                                        <td>{{ $order->order_date }}</td>
                                    </tr>
                                    <tr>
                                        <td>ID Pesanan <span class="text-info ml-1">Invoice</span></td>
                                        <td>:</td>
                                        <td>
                                            {{ $order->id }}/{{ $order->user_id }}/{{ $order->order_number }}
                                            <a href="{{ url('user/invoice-p/' . $order->id) }}" target="_blank"
                                                class="text-info">
                                                <i class="fas fa-print ml-1"></i> {{ $order->invoice_number }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Metode Pembayaran</td>
                                        <td>:</td>
                                        <td>{{ $order->payment_method }}</td>
                                    </tr>
                                    <tr>
                                        <td>TRX ID</td>
                                        <td>:</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Total Harga ({{ $order->totalqty }} produk)
                                        </td>
                                        <td>:</td>
                                        <td>Rp{{ number_format($order->totalbelanja, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Total Ongkos Kirim ({{ number_format($order->totalberat, 0, ',', '.') }} gr)
                                        </td>
                                        <td>:</td>
                                        <td>Rp{{ number_format($order->totalongkir, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Total Belanja
                                        </td>
                                        <td>:</td>
                                        <td>Rp{{ number_format($order->totalbayar, 2, ',', '.') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Data Pengiriman</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <td>Nama Penerima</td>
                                        <td width="2%">:</td>
                                        <td>{{ $order->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>No. HP Penerima</td>
                                        <td>:</td>
                                        <td>{{ $order->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Pengiriman</td>
                                        <td>:</td>
                                        <td>
                                            {{ $order->address }}, {{ $order->postcode }} <br>
                                            {{ $order->nama_kota }}, {{ $order->nama_provinsi }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jasa Kurir</td>
                                        <td>:</td>
                                        <td style="text-transform: uppercase">{{ $order->kurir }} -
                                            {{ $order->service }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        @if ($order->order_status == 'Selesai')
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <table class="table">
                                                <tr>
                                                    <td width="35%">Status Pengiriman</td>
                                                    <td width="2%">:</td>
                                                    <td>
                                                        <span class="badge badge-pill badge-success"> Tiba di Tujuan </span> <br>
                                                        <span class="badge badge-pill badge-secondary"> Diterima oleh {{ $order->name }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Resi Pengiriman</td>
                                                    <td width="2%">:</td>
                                                    <td class="text-info">{{ $order->resi }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Status Pesanan</td>
                                                    <td width="2%">:</td>
                                                    <td><span class="badge badge-pill badge-success"> Selesai </span></td>
                                                </tr>
                                                @if ($order->payment_method == 'Cash on Delivery')
                                                    <tr>
                                                        <td colspan="3">
                                                            <em>Pihak <strong
                                                                    class="text-info text-uppercase">{{ $order->kurir }}</strong>
                                                                telah menyetorkan pembayaran! <br> <span
                                                                    class="text-info">{{ $order->updated_at }}
                                                                    WIB</span></em>
                                                        </td>
                                                    </tr>
                                                @else
                                                    @php
                                                        $adminData = DB::table('admins')->first();
                                                    @endphp
                                                    <tr>
                                                        <td colspan="3">
                                                            <em>Pembayaran diverifikasi oleh <strong
                                                                    class="text-info">{{ $adminData->name }}</strong>!
                                                                <br> <span
                                                                    class="text-info">{{ $order->updated_at }}
                                                                    WIB</span></em>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </table>
                                        </div>
                                        <div class="col-md-5">
                                            @if ($order->payment_method == 'Bank Transfer Manual')
                                                <img src="{{ asset($order->bukti_pembayaran) }}" alt="bukti-pembayaran"
                                                    class="w-100 rounded mx-auto d-block">
                                            @else
                                                <img src="{{ asset('/upload/orders/successful.png') }}"
                                                    alt="bukti-pembayaran" class="w-100 rounded mx-auto d-block">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="card card-warning card-outline">
                                <form action="{{ route('order-status.update') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $order->id }}">

                                    <div class="card-header">
                                        <h3 class="card-title">Verifikasi Pesanan</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove"
                                                title="Remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-7">
                                                @if ($order->payment_method == 'Bank Transfer Manual')
                                                    <p><strong>Bukti Pembayaran</strong></p>
                                                    <img src="{{ asset($order->bukti_pembayaran) }}"
                                                        alt="bukti-pembayaran" class="w-100 mt-n1">
                                                @else
                                                @endif
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Status Pesanan</label>
                                                    <select class="form-control" name="order_status">
                                                        <option value="{{ $order->order_status }}">
                                                            {{ $order->order_status }}
                                                        </option>
                                                        <option value="Selesai">Selesai</option>
                                                        <option value="Dibatalkan">Dibatalkan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Status Pengiriman</label>
                                                    <select class="form-control" name="shipping_status">
                                                        <option value="{{ $order->shipping_status }}">
                                                            {{ $order->shipping_status }}
                                                        </option>
                                                        <option value="Dikirim">Dikemas</option>
                                                        <option value="Dikirim">Dikirim</option>
                                                        <option value="Tiba di Tujuan">Tiba di Tujuan</option>
                                                    </select>
                                                </div>
                                                @if ($order->shipping_status == 'Dikirim')
                                                    <div class="form-group">
                                                        <label>Input Resi</label>
                                                        <input type="text" class="form-control" name="resi"
                                                            value="{{ $order->resi }}"
                                                            placeholder="{{ $order->kurir }}...">
                                                    </div>
                                                @else
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-warning">
                                            <i class="fas fa-check-square"></i> Verifikasi Status
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>

                    {{-- detail produk --}}
                    <div class="col-md-12">
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Detail Produk</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="12%"></th>
                                            <th>Nama Produk</th>
                                            <th>Barcode</th>
                                            <th>Berat</th>
                                            <th>Ukuran</th>
                                            <th>Warna</th>
                                            <th>Qty</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderItem as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    <img src="{{ asset($item->product->product_thumbnail) }}"
                                                        width="100px;">
                                                </td>
                                                <td>{{ $item->product->product_name }}</td>
                                                <td>{{ $item->product->product_code }}</td>
                                                <td>{{ $item->weight }} gr</td>
                                                <td>{{ $item->size }}</td>
                                                <td>{{ $item->color }}</td>
                                                <td>{{ $item->qty }} pcs</td>
                                                <td>Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                                                @php
                                                    $total = $item->qty * $item->price;
                                                @endphp
                                                <td>Rp{{ number_format($total, 0, ',', '.') }}</td>
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
        <!-- /.content -->
    </div>

@endsection
