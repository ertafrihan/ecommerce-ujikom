@extends('frontend.layouts.check')
@section('title', 'Manual Bank Transfer')

@section('content')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Pembayaran</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('checkout') }}">Checkout</a></li>
                            <li class="active">manual bank transfer</li>
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
                    <form action="{{ route('pay.manual') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="name" value="{{ $data['name'] }}">
                        <input type="hidden" name="email" value="{{ $data['email'] }}">
                        <input type="hidden" name="phone" value="{{ $data['phone'] }}">
                        <input type="hidden" name="postcode" value="{{ $data['postcode'] }}">
                        <input type="hidden" name="address" value="{{ $data['address'] }}">
                        <input type="hidden" name="nama_kota" value="{{ $data['nama_kota'] }}">
                        <input type="hidden" name="nama_provinsi" value="{{ $data['nama_provinsi'] }}">
                        <input type="hidden" name="kurir" value="{{ $data['kurir'] }}">
                        <input type="hidden" name="service" value="{{ $data['service'] }}">
                        <input type="hidden" name="totalqty" value="{{ $cartQty }}">
                        <input type="hidden" name="totalberat" value="{{ $data['totalberat'] }}">
                        <input type="hidden" name="totalbelanja" value="{{ $data['totalbelanja'] }}">
                        <input type="hidden" name="totalongkir" value="{{ $data['totalongkir'] }}">
                        <input type="hidden" name="totalbayar" value="{{ $data['totalbayar'] }}">

                        <div class="col-md-8">
                            <h4 class="widget-title">Rekap Pesanan</h4>
                            <div class="row">
                                <div class="col-md-7">
                                    <p>{{ $data['name'] }}</p>
                                    <p>{{ $data['phone'] }}</p>
                                    <p style="margin-bottom: 40px;">{{ $data['address'] }},
                                        {{ $data['nama_kota'] }},
                                        {{ $data['nama_provinsi'] }},
                                        {{ $data['postcode'] }}
                                    </p>
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
                                                <p style="font-size: 14px">{{ $item->qty }} produk
                                                    ({{ $item->weight * $item->qty }} gr)
                                                    x</p>
                                                <h5 class="">
                                                    Rp{{ number_format($item->price, 0, ',', '.') }}</h5>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-5">
                                    <p>{{ $data['email'] }}</p>
                                    <p>-</p>
                                    <p style="text-transform: uppercase">{{ $data['kurir'] }} - {{ $data['service'] }}
                                    </p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="product-checkout-details">
                                <div class="block">
                                    <div class="discount-code" style="margin-top: -15px;">
                                        <p>Kupon promo <span style="float: right">-</span></p>
                                    </div>
                                    <ul class="summary-prices">
                                        <li>
                                            <span>Total Harga ({{ $cartQty }} produk)</span>
                                            <span
                                                class="price">Rp<span>{{ number_format($data['totalbelanja'], 0, '', '.') }}</span>
                                            </span>
                                        </li>
                                        <li>
                                            <span>Total Ongkos Kirim
                                                ({{ number_format($data['totalberat'], 0, '', '.') }}
                                                gr)</span>
                                            <span>Rp<span>{{ number_format($data['totalongkir'], 0, '', '.') }}</span></span>
                                        </li>
                                    </ul>
                                    <div class="summary-total">
                                        <span>Total Tagihan</span>
                                        <span>Rp<span>{{ number_format($data['totalbayar'], 0, '', '.') }}</span>
                                        </span>
                                    </div>
                                    <div class="verified-icon">
                                        {{-- <img src="images/shop/verified.png"> --}}
                                    </div>
                                    <h4 class="widget-title" style="margin-top: 59px;">Pembayaran</h4>
                                    <div class="checkout-product-details">
                                        <div class="payment">
                                            <div class="card-details">
                                                <p style="margin-bottom: 20px; font-size: 14px;">Silahkan lakukan pembayaran transfer
                                                    bank pada no. rekening berikut!</p>
                                                <img src="{{ asset('execute/images/payment/bri.png') }}" alt="bri"
                                                    style="width: 125px;">
                                                <h3 style="float: right; margin-top: 0px;">029872653781 <br><span style="font-size: 14px; font-style: italic;">A.n. Execute Fashion</span></h3>
                                                <div class="form-group mt-50">
                                                    <label class="" for="foto">Unggah Bukti Pembayaran <span class="text-danger">*
                                                        </span></label>
                                                    <input type="file" id="foto" name="bukti_pembayaran" class="form-control" accept="image/*" required>
                                                </div>

                                                <p style="font-size: 12px; margin: 20px 0 15px; color: #b1b1b1">Saya
                                                    menyetujui syarat dan ketentuan yang berlaku.</p>
                                                <button type="submit" class="btn btn-main"
                                                    style="display: block; width: 100%;">
                                                    <i class="fas fa-shield-alt"></i> Buat Pesanan
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
    </script>
@endpush
