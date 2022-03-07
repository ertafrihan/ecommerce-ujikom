<section class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12 col-sm-4">
                <div class="">
                    <i class="fas fa-phone-alt"></i>
                    <a href="tel:+6282321233881">+62 823 2123 3881</a>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4">
                <!-- Site Logo -->
                <div class="logo text-center">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('execute/images/logo.png') }}">
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4">
                <!-- Cart -->
                <ul class="top-menu text-right list-inline">
                    <li class="dropdown cart-nav dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                            <span class="badge" id="cartQty"></span>
                            <i class="fas fa-shopping-bag"></i> Keranjang
                        </a>
                        <div class="dropdown-menu cart-dropdown">
                            <!-- Cart Item -->
                            <div id="miniCart"></div>
                            <!-- / Cart Item -->
                            <div class="cart-summary">
                                <span>Subtotal</span>
                                <span class="total-price">Rp
                                    <span class="total-price" id="cartSubtotal"></span>
                                </span>
                            </div>
                            <ul class="text-center cart-buttons">
                                <li><a href="{{ route('mycart') }}" class="btn btn-small">Keranjang</a></li>
                                <li><a href="{{ route('checkout') }}"
                                        class="btn btn-small btn-solid-border">Pembayaran</a></li>
                            </ul>
                        </div>

                    </li><!-- / Cart -->

                    <!-- Search -->
                    <li class="dropdown search dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
                                class="fas fa-search"></i> Cari</a>
                        <ul class="dropdown-menu search-dropdown">
                            <li>
                                <form action="post"><input type="search" class="form-control" placeholder="Cari...">
                                </form>
                            </li>
                        </ul>
                    </li><!-- / Search -->

                    <!-- Akun -->
                    <li class="dropdown">
                        @auth
                            @php
                                $id = Auth::user()->id;
                                $user = App\Models\User::find($id);
                            @endphp
                            <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false">
                                <img src="{{ !empty($user->profile_photo_path)? url('upload/user-images/' . $user->profile_photo_path): url('upload/no-img.jpg') }}"
                                    alt="avatar" style="width: 25px; height: 25px; border-radius: 50%">
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('dashboard') }}">
                                        Akun Saya
                                    </a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" class="">
                                        @csrf

                                        <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                    this.closest('form').submit();"
                                            style="margin-left: 20px">
                                            {{ __('Keluar') }}
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        @else
                            <a href="{{ route('login') }}">
                                <i class="far fa-user-circle"></i>
                            </a>
                        @endauth
                    </li><!-- / Akun -->

                </ul><!-- / .nav .navbar-nav .navbar-right -->
            </div>
        </div>
    </div>
</section><!-- End Top Header Bar -->


<!-- Main Menu Section -->
<section class="menu">
    <nav class="navbar navigation">
        <div class="container">
            <div class="navbar-header">
                <h2 class="menu-title">Main Menu</h2>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div><!-- / .navbar-header -->

            <!-- Navbar Links -->
            <div id="navbar" class="navbar-collapse collapse text-center">
                <ul class="nav navbar-nav">

                    <!-- Home -->
                    <li class="dropdown ">
                        <a href="{{ route('home') }}">Beranda</a>
                    </li><!-- / Home -->


                    <!-- Elements -->
                    <li class="dropdown dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                            data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Belanja <span
                                class="tf-ion-ios-arrow-down"></span></a>
                        <div class="dropdown-menu">
                            <div class="row">

                                <!-- Basic -->
                                <div class="col-lg-12 col-md-6 mb-sm-3">
                                    <ul>
                                        @php
                                            $categories = App\Models\Category::orderBy('category_name', 'ASC')->get();
                                        @endphp
                                        <li class="dropdown-header">Kategori</li>
                                        <li role="separator" class="divider"></li>
                                        @foreach ($categories as $category)
                                            <li>
                                                <i class="{{ $category->category_icon }}"></i>
                                                <a href="#">{{ $category->category_name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div><!-- / .row -->
                        </div><!-- / .dropdown-menu -->
                    </li><!-- / Elements -->

                    <!-- About -->
                    <li class="dropdown ">
                        <a href="{{ route('about') }}">Tentang</a>
                    </li><!-- / About -->

                    <!-- Contact Us -->
                    <li class="dropdown ">
                        <a href="{{ route('contact') }}">Kontak</a>
                    </li><!-- / Contact Us -->
                </ul><!-- / .nav .navbar-nav -->

            </div>
            <!--/.navbar-collapse -->
        </div><!-- / .container -->
    </nav>
</section>
