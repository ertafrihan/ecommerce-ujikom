@extends('frontend.layouts.master')
@section('title')
    {{ $product->product_name }}
@endsection
@section('content')
    <section class="single-product">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}">Beranda</a></li>
                        <li><a href="shop.html">Belanja</a></li>
                        <li class="active">detail produk</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-md-5">
                    <div class="single-product-slider">
                        <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
                            <div class='carousel-outer'>
                                <!-- me art lab slider -->
                                <div class='carousel-inner '>
                                    <div class='item active'>
                                        <img src='{{ asset($product->product_thumbnail) }}' alt=''
                                            data-zoom-image="{{ asset($product->product_thumbnail) }}" />
                                    </div>
                                    @foreach ($product_gallery as $prodGal)
                                        <div class='item' id="prodgal{{ $prodGal->id }}">
                                            <img src='{{ asset($prodGal->photo_name) }}' alt=''
                                                data-zoom-image="{{ asset($prodGal->photo_name) }}" />
                                        </div>
                                    @endforeach
                                </div>

                                <!-- sag sol -->
                                <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
                                    <i class="tf-ion-ios-arrow-left"></i>
                                </a>
                                <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
                                    <i class="tf-ion-ios-arrow-right"></i>
                                </a>
                            </div>

                            <!-- thumb -->
                            <ol class='carousel-indicators mCustomScrollbar meartlab'>
                                <li data-target='#carousel-custom' data-slide-to='0' class='active'>
                                    <a href="{{ asset($product->product_thumbnail) }}">
                                        <img src='{{ asset($product->product_thumbnail) }}' alt='' />
                                    </a>
                                </li>
                                @foreach ($product_gallery as $prodGal)
                                    <li data-target='#carousel-custom' data-slide-to='1'>
                                        <a href="#prodgal{{ $prodGal->id }}">
                                            <img src='{{ asset($prodGal->photo_name) }}' alt='' />
                                        </a>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="single-product-details">
                                <h4 id="pname">{{ $product->product_name }}</h4>
                                <div class="" style="margin: 20px 0">
                                    <span
                                        style="font-weight: 600; font-size: 25px; line-height: 30px; margin: 0">Rp{{ number_format($product->product_price, 0, ',', '.') }}</span>
                                    <span
                                        style="text-decoration: line-through; color: #b1b1b1; font-size: 16px; margin-left: 5px;">Rp{{ $product->product_discount }}</span>
                                </div>
                                <ul class="" style="margin-bottom: 10px; margin-top: 20px;">
                                    <li class="">
                                        Brand: <strong><span>{{ $product->brand->brand_name }}</span></strong>
                                    </li>
                                </ul>
                                <ul class="" style="margin-bottom: 10px">
                                    <li class="">
                                        Kategori: <strong><span>{{ $product->category->category_name }}</span></strong>
                                    </li>
                                </ul>
                                <ul class="" style="margin-bottom: 10px">
                                    <li class="">
                                        Barcode: <strong><span>{{ $product->product_code }}</span></strong>
                                    </li>
                                </ul>
                                <p class="product-description mt-20">
                                    {!! $product->product_long_desc !!}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-5" style="border: solid 1px #dedede; padding: 30px 20px">
                            <div class="form-group" style="margin-bottom: 25px">
                                <label for="size">Pilih Ukuran</label>
                                <select name="product_size" id="size" class="form-control">
                                    @foreach ($product_size as $size)
                                        <option value="{{ $size }}">{{ ucwords($size) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" style="margin-bottom: 25px">
                                @if ($product->product_color == null)
                                    
                                @else
                                <label for="color">Pilih Warna</label>
                                <select name="product_color" id="color" class="form-control">
                                    @foreach ($product_color as $color)
                                        <option value="{{ $color }}">{{ ucwords($color) }}</option>
                                    @endforeach
                                </select>
                                @endif
                            </div>
                            <div class="form-group" style="margin-bottom: 25px">
                                <label for="qty">Atur Jumlah</label>
                                <div class="row">
                                    <div class="col-md-6" style="padding-right: 0">
                                        <input type="number" name="product_qty" class="form-control" id="qty" value="1"
                                            min="1">
                                    </div>
                                    <div class="col-md-6" style="margin-top: 7px; padding-left: 10px">
                                        Stok <strong>{{ $product->product_qty }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-right: 15px; margin-top: 40px;">
                                <span
                                    style="text-decoration: line-through; float: right; color: #b1b1b1; font-size: 15px; margin-bottom: 5px;">Rp{{ $product->product_discount }}</span>
                            </div>
                            <ul class="" style="margin-bottom: 15px">
                                <li class="">
                                    Subtotal: <strong
                                        style="float: right; font-size: 20px; line-height: 20px;">Rp<span>{{ number_format($product->product_price, 0, ',', '.') }}</span></strong>
                                </li>
                            </ul>
                            <button type="submit" class="btn btn-main" onclick="addToCart()"
                            style="display: block; margin: 0; width: 100%;">+ Keranjang</button>
                            <div class="text-center" style="margin-top: 10px">
                                <a href="#" class="btn btn-small btn-solid-border" style="display: block;">
                                    <i class="fas fa-heart"></i> WISHLIST
                                </a>
                            </div>
                        </div>
                        <input type="hidden" id="product_id" value="{{ $product->id }}" min="1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="tabCommon mt-20">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#details" aria-expanded="true">Detail</a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#reviews" aria-expanded="false">Ulasan (2)</a>
                            </li>
                        </ul>
                        <div class="tab-content patternbg">
                            <div id="details" class="tab-pane fade active in">
                                <h4>Deskripsi Produk</h4>
                                <p>{!! $product->product_long_desc !!}</p>
                            </div>
                            <div id="reviews" class="tab-pane fade">
                                <div class="post-comments">
                                    <ul class="media-list comments-list m-bot-50 clearlist">
                                        <!-- Comment Item start-->
                                        <li class="media">

                                            <a class="pull-left" href="#!">
                                                <img class="media-object comment-avatar"
                                                    src="{{ asset('execute/images/blog/avater-1.jpg') }}" alt=""
                                                    width="50" height="50" />
                                            </a>

                                            <div class="media-body">
                                                <div class="comment-info">
                                                    <h4 class="comment-author">
                                                        <a href="#!">Asep Betmen</a>

                                                    </h4>
                                                    <time datetime="2013-04-06T13:53">02 Januari, 2022 11:34</time>
                                                    <a class="comment-button" href="#!"><i
                                                            class="tf-ion-chatbubbles"></i>Balas</a>
                                                </div>

                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at
                                                    magna ut ante eleifend eleifend.Lorem ipsum dolor sit amet,
                                                    consectetur adipisicing elit. Quod laborum minima, reprehenderit
                                                    laboriosam officiis praesentium? Impedit minus provident assumenda
                                                    quae.
                                                </p>
                                            </div>

                                        </li>
                                        <!-- End Comment Item -->
                                        <!-- Comment Item start-->
                                        <li class="media">

                                            <a class="pull-left" href="#!">
                                                <img class="media-object comment-avatar"
                                                    src="{{ asset('execute/images/blog/avater-1.jpg') }}" alt=""
                                                    width="50" height="50" />
                                            </a>

                                            <div class="media-body">
                                                <div class="comment-info">
                                                    <h4 class="comment-author">
                                                        <a href="#!">Asep Betmen</a>

                                                    </h4>
                                                    <time datetime="2013-04-06T13:53">02 Januari, 2022 11:34</time>
                                                    <a class="comment-button" href="#!"><i
                                                            class="tf-ion-chatbubbles"></i>Balas</a>
                                                </div>

                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at
                                                    magna ut ante eleifend eleifend.Lorem ipsum dolor sit amet,
                                                    consectetur adipisicing elit. Quod laborum minima, reprehenderit
                                                    laboriosam officiis praesentium? Impedit minus provident assumenda
                                                    quae.
                                                </p>
                                            </div>

                                        </li>
                                        <!-- End Comment Item -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="products related-products section">
        <div class="container">
            <div class="row">
                <div class="title text-center">
                    <h2>Pilihan Lainnya</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($relatedProduct as $product)
                    <div class="col-md-3">
                        <div class="product-item">
                            <div class="product-thumb">
                                <span class="bage">Promo</span>
                                <img class="img-responsive" src="{{ asset($product->product_thumbnail) }}"
                                    alt="product-img" />
                                <div class="preview-meta">
                                    <ul>
                                        <li>
                                            <span data-toggle="modal" data-target="#product-modal"
                                                id="{{ $product->id }}" onclick="productView(this.id)" title="Lihat">
                                                <i class="fas fa-shopping-bag"></i>
                                            </span>
                                        </li>
                                        <li>
                                            <a href="#!" title="Wishlist"><i class="fas fa-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#!" title="Bandingkan"><i class="fas fa-stream"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a
                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">{{ $product->product_name }}</a>
                                </h4>
                                <p class="price">Rp{{ $product->product_price }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="text-center">
                    <a class="btn btn-small btn-solid-border" href="#">Lihat Semua</a>
                </div>
            </div>
        </div>
    </section>
@endsection
