@extends('frontend.layouts.master')
@section('title', 'F.A.Q')

@section('content')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Frequently Asked Questions</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="active">f.a.q</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4>Pertanyaan yang sering ditanyakan </h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, repudiandae.</p>
                    <p>Narahubung: admin@execute.com</p>
                </div>
                <div class="col-md-8">
                    <h4>Status Pesanan</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas iusto, alias, tempora fuga quam
                        eveniet neque excepturi aliquid. Eligendi, mollitia.</p>
                    <h4>Pengiriman</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam voluptatibus, incidunt similique
                        nobis sint quisquam nam ab error consequuntur sit ullam ex eum exercitationem, excepturi explicabo
                        beatae eos aspernatur odit ad perspiciatis, neque saepe magni enim. Maiores quia, quae sequi.</p>
                    <h4>Pembayaran</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus repellat id, laboriosam ipsa
                        repudiandae quisquam, suscipit officiis, praesentium itaque facilis distinctio dolorum. Velit
                        reiciendis libero laudantium corporis, delectus impedit sunt.</p>
                    <h4>Pengembalian</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam eaque nam, ab voluptas et debitis
                        sint hic vel ratione dignissimos.</p>
                    <h4>Kebijakan Privasi</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae blanditiis quod saepe, inventore
                        ipsum sint cum iste quae ratione nobis laborum minima autem totam similique, quia neque deleniti!
                        Provident, suscipit.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
