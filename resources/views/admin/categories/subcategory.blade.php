@extends('admin.layouts.backend')

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('adminlte3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Sub Kategori</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">SubCategories</li>
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
                    <!-- Daftar Brand -->
                    <div class="col-md-8">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">No.</th>
                                            <th>Kategori</th>
                                            <th>Sub Kategori</th>
                                            <th>Slug</th>
                                            <th width="17%">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subcategories as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item['category']['category_name'] }}</td>
                                                <td>{{ $item->subcategory_name }}</td>
                                                <td>{{ $item->subcategory_slug }}</td>
                                                <td>
                                                    <a href="{{ route('subcategory.edit', $item->id) }}"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('subcategory.delete', $item->id) }}"
                                                        class="btn btn-sm btn-danger" id="delete">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->
                    </div>

                    <!-- Tambah Brand -->
                    <div class="col-md-4">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Tambah Sub Kategori</h3>
                                <i class="fas fa-plus" style="float: right;"></i>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{ route('subcategory.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Kategori <span class="text-danger">*</span></label>
                                        <select class="form-control" name="category_id">
                                            <option selected disabled>Pilih Kategori</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="subkategori">Sub Kategori <span class="text-danger">*</span></label>
                                        <input type="text" name="subcategory_name" class="form-control" id="subkategori"
                                            placeholder="Nama SubKategori">
                                        @error('subcategory_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-plus-square"></i> Tambah
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

@push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('adminlte3/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte3/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte3/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminlte3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte3/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('adminlte3/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminlte3/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('adminlte3/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminlte3/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminlte3/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "pdf", "print", ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
