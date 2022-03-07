@extends('frontend.layouts.master')
@section('title', 'Beranda')

@section('content')
<div class="hero-slider">
		<div class="slider-item th-fullpage hero-area" style="background-image: url({{ asset('execute/images/slider/slider-1.jpg') }});">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 text-center">
						<p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUK</p>
						<h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">Keindahan hakiki
							<br> di setiap sisi.</h1>
						<a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
							href="shop.html">Belanja Sekarang</a>
					</div>
				</div>
			</div>
		</div>
		<div class="slider-item th-fullpage hero-area" style="background-image: url({{ asset('execute/images/slider/slider-3.jpg') }});">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 text-left">
						<p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUK</p>
						<h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">Keindahan hakiki
							<br> di setiap sisi.</h1>
						<a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
							href="shop.html">Belanja Sekarang</a>
					</div>
				</div>
			</div>
		</div>
		<div class="slider-item th-fullpage hero-area" style="background-image: url({{ asset('execute/images/slider/slider-2.jpg') }});">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 text-right">
						<p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUK</p>
						<h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">Keindahan hakiki
							<br> di setiap sisi.</h1>
						<a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
							href="shop.html">Belanja Sekarang</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section class="product-category section" style="margin-top: 60px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title text-center">
						<h2>Kategori Produk</h2>
					</div>
				</div>
				<div class="col-md-6">
					<div class="category-box">
						<a href="#!">
							<img src="{{ asset('execute/images/shop/category/category-1.jpg') }}" alt="" />
							<div class="content">
								<h3>Sweet Formals</h3>
								<p>Pakaian Formal</p>
							</div>
						</a>
					</div>
					<div class="category-box">
						<a href="#!">
							<img src="{{ asset('execute/images/shop/category/category-2.jpg') }}" alt="" />
							<div class="content">
								<h3>Smart Casuals</h3>
								<p>Pakaian Kasual</p>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-6">
					<div class="category-box category-box-2">
						<a href="#!">
							<img src="{{ asset('execute/images/shop/category/category-3.jpg') }}" alt="" />
							<div class="content">
								<h3>Just Sporty</h3>
								<p>Pakaian Sporti</p>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="products section bg-gray">
		<div class="container">
			<div class="row">
				<div class="title text-center">
					<h2>Produk Trendi</h2>
				</div>
			</div>
			<div class="row">
				@foreach ($products as $product)
				<div class="col-md-4">
					<div class="product-item">
						<div class="product-thumb">
							<span class="bage">Promo</span>
							<img class="img-responsive" src="{{ asset($product->product_thumbnail) }}" alt="product-img" />
							<div class="preview-meta">
								<ul>
									<li>
										<span data-toggle="modal" data-target="#product-modal" id="{{ $product->id }}" onclick="productView(this.id)" title="Lihat">
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
							<h4><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">{{ $product->product_name }}</a></h4>
							<p class="price">Rp{{ number_format($product->product_price, 0, ',', '.') }}</p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>


	<!--
Start Call To Action
==================================== -->
	<section class="call-to-action bg-gray section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="title">
						<h2>DAPATKAN INFO PRODUK TERBARU</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, <br> facilis numquam
							impedit ut sequi. Minus facilis vitae excepturi sit laboriosam.</p>
					</div>
					<div class="col-lg-6 col-md-offset-3">
						<div class="input-group subscription-form">
							<input type="text" class="form-control" placeholder="Masukkan Alamat Email Anda">
							<span class="input-group-btn">
								<button class="btn btn-main" type="button">Subscribe!</button>
							</span>
						</div><!-- /input-group -->
					</div><!-- /.col-lg-6 -->

				</div>
			</div> <!-- End row -->
		</div> <!-- End container -->
	</section> <!-- End section -->

	<section class="section instagram-feed">
		<div class="container">
			<div class="row">
				{{-- <div class="title">
					<h2>Ikuti Kami di Instagram</h2>
				</div> --}}
			</div>
			<div class="row">
				<div class="col-12">
					<div class="mx-auto">
						<img class="" style="height: 125px" src="{{ asset('execute/images/brand/all-brand.png') }}" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection