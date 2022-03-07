@extends('admin.layouts.backend')
@section('title', 'Orders')

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
                        <h1 class="m-0">Data Transaksi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">all transactions</li>
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
                    <div class="col-md-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">No.</th>
                                            <th width="15%">Tanggal Pesanan</th>
                                            <th>ID Pesanan</th>
                                            <th>Invoice</th>
                                            <th width="">Pembayaran</th>
                                            <th>Total Belanja</th>
                                            <th>Status</th>
                                            <th width="15%">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->order_date }}</td>
                                                <td>{{ $item->id }}/{{ $item->user_id }}/{{ $item->order_number }}
                                                </td>
                                                <td>{{ $item->invoice_number }}</td>
                                                <td>{{ $item->payment_method }}</td>
                                                <td>Rp{{ number_format($item->totalbayar, 2, ',', '.') }}</td>
                                                <td>
                                                    @if ($item->shipping_status == 'Dikemas')
                                                        <span class="badge badge-pill badge-info"> Dikemas </span>
                                                    @elseif ($item->shipping_status == 'Dikirim')
                                                        <span class="badge badge-pill badge-primary"> Dikirim </span>
                                                    @elseif ($item->shipping_status == 'Tiba di Tujuan')
                                                        <span class="badge badge-pill badge-success"> Tiba di Tujuan </span>
                                                    @endif

                                                    @if ($item->order_status == 'Diproses')
                                                        <span class="badge badge-pill badge-info"> Diproses </span>
                                                    @elseif ($item->order_status == 'Selesai')
                                                        <span class="badge badge-pill badge-success"> Selesai </span>
                                                    @elseif ($item->order_status == 'Dibatalkan')
                                                        <span class="badge badge-pill badge-danger"> Dibatalkan </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('transaction.details', $item->id) }}"
                                                        class="btn btn-sm btn-info" title="Ubah Status">
                                                        <i class="fas fa-pen-square mr-1"></i> Detail Transaksi
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
