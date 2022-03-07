@extends('frontend.layouts.master')

@section('title', 'Kontak Kami')

@section('content')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Kontak</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="active">kontak kami</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-wrapper">
        <div class="contact-section">
            <div class="container">
                <div class="row">
                    <!-- Contact Form -->
                    <div class="contact-form col-md-6 ">
                        <form id="contact-form" method="post" action="" role="form">

                            <div class="form-group">
                                <input type="text" placeholder="Nama" class="form-control" name="name" id="name">
                            </div>

                            <div class="form-group">
                                <input type="email" placeholder="Email" class="form-control" name="email" id="email">
                            </div>

                            <div class="form-group">
                                <input type="text" placeholder="Judul" class="form-control" name="subject" id="subject">
                            </div>

                            <div class="form-group">
                                <textarea rows="6" placeholder="Pesan" class="form-control" name="message"
                                    id="message"></textarea>
                            </div>

                            <div id="mail-success" class="success">
                                Terima kasih! Pesan telah terkirim :)
                            </div>

                            <div id="mail-fail" class="error">
                                Maaf, sedang gangguan. Coba lagi nanti :(
                            </div>

                            <div id="cf-submit">
                                <input type="submit" id="contact-submit" class="btn btn-transparent" value="Kirim">
                            </div>

                        </form>
                    </div>
                    <!-- ./End Contact Form -->

                    <!-- Contact Details -->
                    <div class="contact-details col-md-6 ">
                        <div class="google-map">
                            <div id="map"></div>
                        </div>
                        <ul class="contact-short-info">
                            <li>
                                <i class="tf-ion-ios-home"></i>
                                <span>Jl.Babakantiga No.82, Ciwidey, Kab.Bandung</span>
                            </li>
                            <li>
                                <i class="tf-ion-android-phone-portrait"></i>
                                <span>Phone: +62 823 2123 3881</span>
                            </li>
                            <li>
                                <i class="tf-ion-android-mail"></i>
                                <span>Email: execute@gmail.com</span>
                            </li>
                        </ul>
                        <!--/. End Footer Social Links -->
                    </div>
                    <!-- / End Contact Details -->



                </div> <!-- end row -->
            </div> <!-- end container -->
        </div>
    </section>
@endsection
