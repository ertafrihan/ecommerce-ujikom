@extends('frontend.layouts.check')
@section('title', 'Checkout')

@section('content')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Checkout</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">Beranda</a></li>
                            <li><a href="{{ route('mycart') }}">Keranjang</a></li>
                            <li class="active">checkout</li>
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
                    <form action="{{ route('checkout.store') }}" method="post">
                        @csrf

                        @php
                            $total = 0;
                            $totalberat = 0;
                        @endphp
                        @foreach ($carts as $item)
                            @php
                                $total = $total + $item->qty * $item->price;
                                $totalberat = $totalberat + $item->qty * $item->weight;
                            @endphp
                        @endforeach

                        <input type="hidden" name="totalbayar">
                        <input type="hidden" name="totalbelanja" id="totalbelanja" value="{{ $total }}">
                        <input type="hidden" name="totalongkir" id="totalongkir" >
                        <input type="hidden" name="totalberat" id="weight" value="<?php echo $totalberat;?>">
                        <input type="hidden" name="nama_provinsi" id="nama_provinsi" >
                        <input type="hidden" name="nama_kota" id="nama_kota" >
                        <input type="hidden" name="service" id="service">
                        <input type="hidden" name="province_origin" value="9" >
                        <input type="hidden" name="city_origin" id="city_origin" value="23">

                        <div class="col-md-8">
                            <div class="block billing-details">
                                <h4 class="widget-title">Data Pengiriman</h4>
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <input type="text" name="name" value="{{ Auth::user()->name }}"
                                                class="form-control" placeholder="Nama Penerima" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" value="{{ Auth::user()->email }}"
                                                class="form-control" placeholder="Email Penerima" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="address" id="alamat" class="form-control"
                                                placeholder="Jl. Babakantiga No.82 Ciwidey, 40973" cols="10" rows="4"
                                                required>{{ Auth::user()->address }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="checkout-country-code clearfix">
                                            <div class="form-group">
                                                <input type="text" name="phone" value="{{ Auth::user()->phone }}"
                                                    class="form-control" placeholder="Nomor HP Penerima" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="postcode" value="{{ Auth::user()->postcode }}" class="form-control"
                                                    placeholder="Kode Pos" required>
                                            </div>
                                            <div class="form-group">
                                                <select name="province_id" id="province_id" class="form-control" required>
                                                    <option value="">Pilih Provinsi</option>
                                                    @foreach ($provinsi as $row)
                                                        <option value="{{ $row['province_id'] }}"
                                                            namaprovinsi="{{ $row['province'] }}">
                                                            {{ $row['province'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select name="kota_id" id="kota_id" class="form-control" required>
                                                    <option value="">Pilih Kota</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block">
                                <div class="row">
                                    <div class="col-md-7">
                                        <h4 class="widget-title">Ringkasan Belanja</h4>
                                        @foreach ($carts as $item)
                                            <div class="media product-card">
                                                <a class="pull-left" href="#">
                                                    <img class="img-checkout" src="{{ asset($item->options->image) }}"
                                                        alt="Image" />
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="media-heading">{{ $item->name }}</h5>
                                                    <p class="">{{ $item->options->size }} -
                                                        {{ $item->options->color }}</p>
                                                    <p style="font-size: 14px">{{ $item->qty }} produk ({{ $item->weight * $item->qty}} gr) x</p>
                                                    <h5 class="">
                                                        Rp{{ number_format($item->price, 0, ',', '.') }}</h5>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-5">
                                        <h4 class="widget-title">Pengiriman</h4>
                                        <div class="checkout-product-details">
                                            <div class="payment">
                                                <div class="card-details">
                                                    <div class="checkout-country-code clearfix mt-20">
                                                        <div class="form-group">
                                                            <select name="kurir" id="kurir" class="form-control" required>
                                                                <option value="">Pilih Ekspedisi</option>
                                                                <option value="jne">JNE</option>
                                                                <option value="tiki">TIKI</option>
                                                                <option value="pos">POS INDONESIA</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <select name="layanan" id="layanan" class="form-control"
                                                                required>
                                                                <option value="">Pilih Layanan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="product-checkout-details">
                                <div class="block">
                                    <div class="discount-code">
                                        <p>Kupon promo ? <a data-toggle="modal" data-target="#coupon-modal"
                                                href="#!">Masukkan
                                                di sini</a></p>
                                    </div>
                                    <ul class="summary-prices">
                                        <li>
                                            <span>Total Harga ({{ $cartQty }} produk)</span>
                                            <span class="price">Rp<span id="cartSubtotal"></span>
                                            </span>
                                        </li>
                                        <li>
                                            <span>Total Ongkos Kirim (<?php echo $totalberat;?> gr)</span>
                                            <span>Rp<span id="ongkoskirim"></span></span>
                                        </li>
                                    </ul>
                                    <div class="summary-total">
                                        <span>Total Tagihan</span>
                                        <span>Rp<span id="totaltagihan"></span>
                                        </span>
                                    </div>
                                    <div class="verified-icon">
                                        {{-- <img src="images/shop/verified.png"> --}}
                                    </div>
                                    <h4 class="widget-title" style="margin-top: 59px;">Metode Pembayaran</h4>
                                    <div class="checkout-product-details">
                                        <div class="payment">
                                            <div class="card-details">
                                                {{-- <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="radio" name="payment_method" value="cod">
                                                        <img src="{{ asset('execute/images/payment/cash-on-delivery.png') }}"
                                                            alt="" style="width: 100px">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="radio" name="payment_method" value="gopay">
                                                        <img src="{{ asset('execute/images/payment/GoPay.png') }}" alt=""
                                                            style="width: 100px">
                                                    </div>
                                                </div> --}}
                                                <div class="form-group">
                                                    <select name="payment_method" class="form-control" required>
                                                        <option value="">Pilih Pembayaran</option>
                                                        <option value="cod">Cash on Delivery (CoD)</option>
                                                        <option value="manual">Bank Transfer (cek manual)</option>
                                                        <option value="midtrans">Midtrans (cek otomatis)</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-main"
                                                    style="display: block; width: 100%; margin-top: 20px;">
                                                    <i class="fas fa-shield-alt"></i> Pilih Pembayaran
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('rajaongkir')
    <script>
        function numberformat(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        function cart() {
            $.ajax({
                type: 'GET',
                url: '/user/get-cart-product',
                dataType: 'json',
                success: function(response) {
                    $('span[id="cartSubtotal"]').text(numberformat(response.cartSubtotal));
                    $('#cartQty').text(response.cartQty);
                    var rows = ""
                    $.each(response.carts, function(key, value) {
                        rows += `<tr class="">
                                    <td class="">
                                        <img width="100" src="/${value.options.image}" alt="" />
                                    </td>
                                    <td class="">
                                        <a href="#!">${value.name} - ${value.options.size} - ${value.options.color == null ? ` ` : `${value.options.color}`} </a>
                                    </td>
                                    <td class="" style="font-weight: 600;">Rp${numberformat(value.price)}</td>
                                    <td class="">
                                        ${value.qty > 1
                                            ? `<button type="submit" class="btn btn-success btn-xs" id="${value.rowId}" onclick="cartDecrement(this.id)">-</button>`
                                            : `<button type="submit" class="btn btn-default btn-xs" disabled>-</button>`
                                        }   
                                            <input type="text" value="${value.qty}" min="1" max="100" disabled style="width:40px; height:40px; margin:5px; border:none" class="text-center">      
                                        <button type="submit" class="btn btn-success btn-xs" id="${value.rowId}" onclick="cartIncrement(this.id)">+</button>
                                    </td>
                                    <td class="">
                                        <button type="submit" class="remove" id="${value.rowId}" onclick="cartRemove(this.id)"><i class="fas fa-times"></i></button>
                                    </td>
                                </tr>`
                    });
                    $('#cartPage').html(rows);
                }
            })
        }
        cart();

        $(document).ready(function() {
            //ini ketika provinsi tujuan di klik maka akan eksekusi perintah yg kita mau
            //name select nama nya "provinve_id" kalian bisa sesuaikan dengan form select kalian
            $('select[name="province_id"]').on('change', function() {
                var namaprovinsiku = $("#province_id option:selected").attr("namaprovinsi");
                $("#nama_provinsi").val(namaprovinsiku);
                // kita buat variable provincedid untk menampung data id select province
                let provinceid = $(this).val();
                //kita cek jika id di dpatkan maka apa yg akan kita eksekusi
                if (provinceid) {
                    // jika di temukan id nya kita buat eksekusi ajax GET
                    jQuery.ajax({
                        // url yg di root yang kita buat tadi
                        url: "/user/city/" + provinceid,
                        // aksion GET, karena kita mau mengambil data
                        type: 'GET', // type data json
                        dataType: 'json', // jika data berhasil di dapat maka kita mau apain nih
                        success: function(data) {
                            console.log(data);
                            $('select[name="kota_id"]').empty();
                            $.each(data, function(key, value) {

                                if (key == 0) {
                                    $('select[name="kota_id"]').append(
                                        '<option value="">Pilih Kota</option>');
                                }

                                $('select[name="kota_id"]').append('<option value="' +
                                    value.city_id + '" namakota="' + value.type +
                                    ' ' + value.city_name + '">' + value.type +
                                    ' ' + value.city_name + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="kota_id"]').empty();
                }
            });
            $('select[name="kota_id"]').on('change', function() {
                // membuat variable namakotaku untyk mendapatkan atribut nama kota
                var namakotaku = $("#kota_id option:selected").attr("namakota");
                // menampilkan hasil nama provinsi ke input id nama_provinsi
                $("#nama_kota").val(namakotaku);
            });
        });

        $('select[name="kurir"]').on('change', function() {
            let origin = $("input[name=city_origin]").val();
            let destination = $("select[name=kota_id]").val();
            let courier = $("select[name=kurir]").val();
            let weight = $("input[name=totalberat]").val();
            if (courier) {
                jQuery.ajax({
                    url: "/user/origin=" + origin + "&destination=" + destination + "&weight=" + weight +
                        "&courier=" + courier,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('select[name="layanan"]').empty();
                        console.log(data);
                        // $('select[name="layanan"]').empty();
                        $('select[name="layanan"]').append('<option value="">Pilih Layanan</option>');
                        $.each(data, function(key, value) {
                            $.each(value.costs, function(key1, value1) {
                                $.each(value1.cost, function(key2, value2) {
                                    $('select[name="layanan"]').append(
                                        '<option value="' + key +
                                        '" harga_ongkir="' + value2.value +
                                        '" service="' + value1.service +
                                        '">' + value1.service + '-' + value1
                                        .description + '-' + value2.value +
                                        '</option>');
                                });
                            });
                        });
                    }
                });
            } else {
                $('select[name="layanan"]').empty();
            }
        });

        $('select[name="layanan"]').on('change', function() {
            $("#ongkoskirim").html('');
            $("#totaltagihan").html('');

            let totalbelanja = $("input[name=totalbelanja]").val();
            // membuat variable namakotaku untyk mendapatkan atribut nama kota
            var harga_ongkir = $("#layanan option:selected").attr("harga_ongkir");
            var service = $("#layanan option:selected").attr("service");
            // menampilkan hasil nama provinsi ke input id nama_provinsi
            $("#ongkoskirim").append(numberformat(harga_ongkir));
            $("#service").val(service);
            var total_ongkir = $("#layanan option:selected").attr("harga_ongkir");
            $("#totalongkir").val(total_ongkir);
            let total = parseInt(totalbelanja) + parseInt(harga_ongkir);
            $("input[name='totalbayar']").val(total);
            $("#totaltagihan").append(numberformat(total));
        });
    </script>
@endpush
