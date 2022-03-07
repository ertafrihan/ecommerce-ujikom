<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Execute | Register</title>

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
                        <h2 class="text-center">Buat Akun Baru</h2>
                        <x-jet-validation-errors class="mb-4" />
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" :value="old('name')" required autofocus autocomplete="name" class="form-control" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="Nomor Telepon">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" :value="old('email')" required class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" required autocomplete="new-password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" required autocomplete="new-password" class="form-control" placeholder="Ulangi Password">
                            </div>

                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-jet-label for="terms">
                                    <div class="flex items-center">
                                        <x-jet-checkbox name="terms" id="terms" />

                                        <div class="ml-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-jet-label>
                            </div>
                            @endif

                            <div class="text-center">
                                <button type="submit" class="btn btn-main text-center">Daftar</button>
                            </div>
                        </form>
                        <p class="mt-20">Sudah punya akun ?<a href="{{ route('login') }}"> Masuk</a></p>
                        <p>
                            @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Lupa password?') }}
                            </a>
                            @endif
                        </p>
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