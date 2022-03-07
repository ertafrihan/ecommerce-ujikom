@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin/dashboard') }}" class="brand-link">
        <img src="{{ asset('adminlte3/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin<strong>EXE</strong>.</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @php
                $adminData = DB::table('admins')->first();
            @endphp
            <div class="image">
                <img src="{{ !empty($adminData->profile_photo_path)? url('upload/admin-images/' . $adminData->profile_photo_path): url('upload/no-img.jpg') }}"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.profile') }}" class="d-block">
                    {{ $adminData->name }}
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('admin/dashboard') }}"
                        class="nav-link {{ $route == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">MASTER</li>
                <li class="nav-item">
                    <a href="{{ route('brand.view') }}" class="nav-link {{ $prefix == '/brand' ? 'active' : '' }}">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Brands
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ $prefix == '/category' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $prefix == '/category' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Kategori
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('category.view') }}"
                                class="nav-link {{ $route == 'category.view' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('subcategory.view') }}"
                                class="nav-link {{ $route == 'subcategory.view' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Sub Kategori</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ $prefix == '/product' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $prefix == '/product' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Produk
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('add.product') }}"
                                class="nav-link {{ $route == 'add.product' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tambah Produk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manage.product') }}"
                                class="nav-link {{ $route == 'manage.product' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelola Produk</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ $prefix == '/orders' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $prefix == '/orders' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Transaksi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('all.transaction') }}"
                                class="nav-link {{ $route == 'all.transaction' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Transaksi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Widgets
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
