@extends('frontend.layouts.master')
@section('title', 'Keranjangku')

@section('content')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Keranjang</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="active">keranjang</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="page-wrapper">
        <div class="cart shopping">
            <div class="container">
                <div class="row">
                    <div class="col-md-9" style="padding-right: 35px">
                        <div class="block">
                            <div class="product-list">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="15%"></th>
                                            <th width="45%">Produk</th>
                                            <th width="">Harga</th>
                                            <th width="">Jumlah</th>
                                            <th width=""></th>
                                        </tr>
                                    </thead>
                                    <tbody id="cartPage">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" style="border: solid 1px #dedede; padding: 20px 20px 30px">
                        <h5 style="margin-top: 0; font-weight: 600;">Ringkasan Belanja</h5>
                        <p style="margin-bottom: 35px;"><span id="cartQty"></span> produk</p>
                        <ul class="" style="margin-bottom: 20px">
                            <li class="">
                                Total Harga: <strong style="float: right; font-size: 18px; line-height: 20px;">Rp<span id="cartSubtotal"></span></strong>
                            </li>
                        </ul>
                        <a href="{{ route('checkout') }}" class="btn btn-main" style="display: block">
                            Beli
                            (<span id="cartQty"></span>)
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
