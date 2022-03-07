@extends('admin.layouts.backend')

@push('styles')
    {{-- Tagsinput --}}
    <link rel="stylesheet" href="{{ asset('adminlte3/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush
@push('summernote-css')
    {{-- Summernote --}}
    <link rel="stylesheet" href="{{ asset('adminlte3/plugins/summernote/summernote-bs4.min.css') }}">
@endpush

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Produk</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Add new product</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">

                        <div class="card card-success">

                            <!-- form start -->
                            <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="produk-name">Nama Produk <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="product_name" class="form-control"
                                                            id="produk-name" placeholder="Nama Produk" required>
                                                        @error('product_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="stok">Berat Produk (gram) <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="product_weight" class="form-control"
                                                            id="stok" placeholder="Berat Produk" required>
                                                        @error('product_weight')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="produk-code">Kode Produk <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="product_code" class="form-control"
                                                            id="produk-code" placeholder="Kode Produk" required>
                                                        @error('product_code')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="stok">Stok Produk <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="product_qty" class="form-control"
                                                            id="stok" placeholder="Jumlah Stok Produk" required>
                                                        @error('product_qty')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="size">Ukuran Produk <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="product_size" class="form-control"
                                                            value="S,M,L" data-role="tagsinput" id="size" required>
                                                        @error('product_size')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="color">Warna Produk <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="product_color" class="form-control"
                                                            value="Black,Navy" data-role="tagsinput"
                                                            id="color">
                                                        @error('product_color')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="harga">Harga Produk <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="product_price" class="form-control"
                                                            id="harga" placeholder="Harga Jual *" required>
                                                        @error('product_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="custom-control custom-checkbox mb-2">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox1" name="product_promo" value="1">
                                                        <label for="customCheckbox1" class="custom-control-label">Produk
                                                            Promo</label>
                                                    </div>
                                                    <input type="text" name="product_discount" class="form-control"
                                                        id="harga" placeholder="Harga Discount">
                                                    @error('product_discount')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="short-desc">Deskripsi Produk (Short)</label>
                                                <textarea name="product_short_desc" id="short-desc" class="form-control"
                                                    placeholder="Deskripsi pendek"></textarea>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <label>Deskripsi Produk (Long) <span
                                                                class="text-danger">*</span></label>
                                                        <div class="">
                                                            <textarea id="summernote" name="product_long_desc"
                                                                required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Brand <span class="text-danger">*</span></label>
                                                <select class="form-control" name="brand_id" required>
                                                    <option selected disabled>Pilih Brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}">
                                                            {{ $brand->brand_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('brand_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Kategori > Sub Kategori <span class="text-danger">*</span></label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <select class="form-control" name="category_id" required>
                                                            <option selected disabled>Pilih Kategori</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->category_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-control" name="subcategory_id" required>
                                                            <option value="" selected disabled>Pilih Sub Kategori</option>
                                                        </select>
                                                        @error('subcategory_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="gambar">Foto Produk (Thumbnail) <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="product_thumbnail"
                                                                    class="custom-file-input" id="gambar"
                                                                    onChange="ThumbUrl(this)" required>
                                                                @error('product_thumbnail')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                                <label class="custom-file-label" for="gambar">Unggah
                                                                    Foto</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="galeri">Galeri Produk <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="product_gallery[]"
                                                                    class="custom-file-input" id="multiImg" multiple
                                                                    required>
                                                                @error('product_galleries')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                                <label class="custom-file-label" for="galeri">Unggah
                                                                    beberapa Foto</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row ml-1 mt-4">
                                                    <div class="col-md-6">
                                                        <img src="" id="Thumb">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row ml-1" id="preview_img"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->


                                    <!-- /.card-body -->
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-plus-square"></i> Tambah Produk
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>



@endsection


@push('summernote-js')
    <!-- bs-custom-file-input -->
    <script src="{{ asset('adminlte3/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>

    {{-- Tagsinput --}}
    <script src="{{ asset('adminlte3/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>

    <!-- Summernote -->
    <script src="{{ asset('adminlte3/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <script>
        $('#summernote').summernote({
            placeholder: 'Ketikkan deskripsi panjang di sini!',
        });
    </script>

    {{-- Ajax SubCategory --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/category/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>

    {{-- Ajax Foto Thumbnail --}}
    <script type="text/javascript">
        function ThumbUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#Thumb').attr('src', e.target.result).width(150).height(200);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    {{-- Ajax Galeri Foto --}}
    <script>
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(75)
                                        .height(100); //create image element 
                                    $('#preview_img').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
@endpush
