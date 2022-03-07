<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Execute | Login</title>

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Constra HTML Template v1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('execute/images/favicon.png') }}" />

    <!-- Themefisher Icon font -->
    <link rel="stylesheet" href="{{ asset('execute/plugins/themefisher-font/style.css') }}">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{ asset('execute/plugins/bootstrap/css/bootstrap.min.css') }}">

    <!-- Animate css -->
    <link rel="stylesheet" href="{{ asset('execute/plugins/animate/animate.css') }}">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="{{ asset('execute/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('execute/plugins/slick/slick-theme.css') }}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('execute/css/style.css') }}">

</head>

<body id="body">

    <section class="signin-page account">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="block text-center">
                        <a class="logo" href="{{ route('home') }}">
                            <img src="{{ asset('execute/images/logo.png') }}" alt="">
                        </a>
                        <h2 class="text-center">Selamat Datang!</h2>
                        <x-jet-validation-errors class="mb-4" />

                        @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form class="text-left clearfix" method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" :value="old('email')" required autofocus placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password" placeholder="password">
                            </div>
                            <div class="">
                                <label for="remember_me" class="flex items-center">
                                    <x-jet-checkbox id="remember_me" name="remember" />
                                    <span class="" style="font-size: 13px; font-weight: lighter;">{{ __('Ingat saya') }}</span>
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-main text-center">Masuk</button>
                            </div>
                        </form>
                        <p class="mt-20">Pengguna baru ?<a href="{{ route('register') }}"> Buat Akun</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Essential Scripts -->

    <!-- Main jQuery -->
    <script src="{{ asset('execute/plugins/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.1 -->
    <script src="{{ asset('execute/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Bootstrap Touchpin -->
    <script src="{{ asset('execute/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>
    <!-- Instagram Feed Js -->
    <script src="{{ asset('execute/plugins/instafeed/instafeed.min.js') }}"></script>
    <!-- Video Lightbox Plugin -->
    <script src="{{ asset('execute/plugins/ekko-lightbox/dist/ekko-lightbox.min.js') }}"></script>
    <!-- Count Down Js -->
    <script src="{{ asset('execute/plugins/syo-timer/build/jquery.syotimer.min.js') }}"></script>

    <!-- slick Carousel -->
    <script src="{{ asset('execute/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('execute/plugins/slick/slick-animation.min.js') }}"></script>

    <!-- Main Js File -->
    <script src="{{ asset('execute/js/script.js') }}"></script>



</body>

</html>