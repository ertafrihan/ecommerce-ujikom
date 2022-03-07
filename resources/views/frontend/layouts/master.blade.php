<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>EXECUTE | @yield('title')</title>

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Constra HTML Template v1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('execute/images/favicon.png') }}" />

    <!-- Themefisher Icon font -->
    <link rel="stylesheet" href="{{ asset('execute/plugins/themefisher-font/style.css') }}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adminlte3/plugins/fontawesome-free/css/all.min.css') }}">
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

    <!-- Start Top Header Bar -->
    @include('frontend.includes.navbar')

    @yield('content')

    @include('frontend.includes.footer')

    <!-- Product Modal -->
    <div class="modal product-modal fade" id="product-modal">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
            <i class="tf-ion-close"></i>
        </button>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="product-title" style="margin-left: 15px"><span id="pname"></span></h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="modal-image">
                                <img class="img-responsive" src=" " id="pimage" alt="product-img" />
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                            <div class="product-short-details">
                                <ul class="" style="margin-bottom: 10px">
                                    <li class="">
                                        Brand: <strong><span id="pbrand" style=""></span></strong>
                                    </li>
                                </ul>
                                <ul class="" style="margin-bottom: 10px">
                                    <li class="">
                                        Kategori: <strong><span id="pcategory" style=""></span></strong>
                                    </li>
                                </ul>
                                <ul class="" style="margin-bottom: 10px">
                                    <li class="">
                                        Barcode: <strong><span id="pcode" style=""></span></strong>
                                    </li>
                                </ul>
                                <ul class="" style="margin-bottom: 15px">
                                    <li class="">
                                        Stok: <strong><span id="pqty" style=""></span></strong>
                                    </li>
                                </ul>
                                <p class="product-short-description">
                                    <span id="pdesc"></span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="product-short-details">
                                <div class="form-group" id="sizeArea">
                                    <label for="size">Pilih Ukuran</label>
                                    <select class="form-control" id="size" name="size">
                                        <option>1</option>
                                    </select>
                                </div>
                                <div class="form-group" id="colorArea">
                                    <label for="color">Pilih Warna</label>
                                    <select class="form-control" id="color" name="color">

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="qty">Atur Jumlah</label>
                                    <input type="number" class="form-control" id="qty" value="1" min="1">
                                </div>
                                <div class="row" style="padding-right: 15px; margin-top: 20px;">
                                    <span
                                        style="text-decoration: line-through; float: right; color: #b1b1b1; font-size: 13px; margin-bottom: 2px;">Rp<span
                                            id="pdiscount"></span></span>
                                </div>
                                <ul class="" style="margin-bottom: 15px">
                                    <li class="">
                                        Harga: <strong style="float: right; font-size: 16px">Rp<span
                                                id="pprice"></span></strong>
                                    </li>
                                </ul>
                                <input type="hidden" id="product_id">
                                <button type="submit" class="btn btn-main" onclick="addToCart()"
                                    style="display: block; margin: 0; width: 100%;">+ Keranjang</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.modal -->


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

    <!-- Sweet Alert -->
    <script src="{{ asset('adminlte3/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>

    {{-- Ajax Modal --}}
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        function numberformat(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        // Start Product View with Modal 
        function productView(id) {
            // alert(id)
            $.ajax({
                type: 'GET',
                url: '/product/view/modal/' + id,
                dataType: 'json',
                success: function(data) {
                    // console.log(data)
                    $('#pname').text(data.product.product_name);
                    $('#pprice').text(numberformat(data.product.product_price));
                    $('#pdiscount').text(numberformat(data.product.product_discount));
                    $('#pbrand').text(data.product.brand.brand_name);
                    $('#pcategory').text(data.product.category.category_name);
                    $('#pcode').text(data.product.product_code);
                    $('#pqty').text(data.product.product_qty);
                    $('#pdesc').text(data.product.product_short_desc);
                    $('#pimage').attr('src', '/' + data.product.product_thumbnail);
                    $('#product_id').val(id);
                    $('#qty').val(1);

                    // Start Stock opiton
                    if (data.product.product_qty > 0) {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#aviable').text('aviable');
                    } else {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#stockout').text('stockout');
                    } // end Stock Option

                    // Size
                    $('select[name="size"]').empty();
                    $.each(data.size, function(key, value) {
                        $('select[name="size"]').append('<option value=" ' + value + ' ">' + value +
                            ' </option>')
                    })

                    // Color
                    $('select[name="color"]').empty();
                    $.each(data.color, function(key, value) {
                        $('select[name="color"]').append('<option value=" ' + value + ' ">' + value +
                            ' </option>')
                        if (data.color == "") {
                            $('#colorArea').hide();
                        } else {
                            $('#colorArea').show();
                        }
                    }) // end color
                }
            })
        } // end ProductVIew

        // Add to Cart
        function addToCart() {
            var product_name = $('#pname').text();
            var id = $('#product_id').val();
            var color = $('#color option:selected').text();
            var size = $('#size option:selected').text();
            var quantity = $('#qty').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    product_color: color,
                    product_size: size,
                    product_qty: quantity,
                    product_name: product_name
                },
                url: "/cart/data/store/" + id,
                success: function(data) {
                    miniCart()
                    $('#closeModal').click();
                    // console.log(data)
                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: data.error
                        })
                    }
                }
            })
        }
    </script>

    <script>
        function numberformat(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function miniCart() {
            $.ajax({
                type: 'GET',
                url: '/product/mini/cart',
                dataType: 'json',
                success: function(response) {
                    $('span[id="cartSubtotal"]').text(numberformat(response.cartSubtotal));
                    $('span[id="cartQty"]').text(response.cartQty);
                    var miniCart = ""
                    $.each(response.carts, function(key, value) {
                        miniCart += `<div class="media">
                                        <a class="pull-left" href="#!">
                                            <img class="media-object"
                                                src="/${value.options.image}" alt="image" />
                                        </a>
                                        <div class="media-body">
                                            <h5 class="media-heading name batas-cart"><a href="#!">${value.name}</a></h5>
                                            <div class="cart-price price">
                                                <span>${value.qty} x</span>
                                                <span>Rp${numberformat(value.price)}</span>
                                            </div>
                                        </div>
                                        <button type="submit" class="remove" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fas fa-times text-danger"></i></button>
                                    </div>`
                    });
                    $('#miniCart').html(miniCart);
                }
            })
        }
        miniCart();

        function miniCartRemove(rowId) {
            $.ajax({
                type: 'GET',
                url: '/minicart/product-remove/' + rowId,
                dataType: 'json',
                success: function(data) {
                    miniCart();
                    cart();

                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: data.error
                        })
                    }
                }
            });
        }
    </script>

    <script>
        function cart() {
            $.ajax({
                type: 'GET',
                url: '/user/get-cart-product',
                dataType: 'json',
                success: function(response) {
                    $('span[id="cartSubtotal"]').text(numberformat(response.cartSubtotal));
                    $('span[id="cartQty"]').text(response.cartQty);
                    var rows = ""
                    $.each(response.carts, function(key, value) {
                        rows += `<tr class="">
                                    <td class="">
                                        <img width="100" src="/${value.options.image}" alt="" />
                                    </td>
                                    <td class="">
                                        <a href="#!">${value.name} - <br /> ${value.options.size} - ${value.options.color == null ? ` ` : `${value.options.color}`} </a>
                                        <p style="font-size: 14px; margin-top: 10px">(${value.weight} gr)</p>
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

        function cartRemove(rowId) {
            $.ajax({
                type: 'GET',
                url: '/user/cart-remove/' + rowId,
                dataType: 'json',
                success: function(data) {
                    cart();
                    miniCart();
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: data.error
                        })
                    }
                }
            });
        }

        function cartIncrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/user/cart-increment/" + rowId,
                dataType: 'json',
                success: function(data) {
                    cart();
                    miniCart();
                }
            });
        }

        function cartDecrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/user/cart-decrement/" + rowId,
                dataType: 'json',
                success: function(data) {
                    cart();
                    miniCart();
                }
            });
        }
    </script>

    @stack('rajaongkir')

</body>

</html>
