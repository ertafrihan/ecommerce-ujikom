@extends('admin.layouts.backend')

@section('content')

    <!-- jQuery -->
    <script src="{{ asset('adminlte3/plugins/jquery/jquery.min.js') }}"></script>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Profile</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile</li>
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
                    <div class="col-md-4">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ !empty($adminData->profile_photo_path)? url('upload/admin-images/' . $adminData->profile_photo_path): url('upload/no-img.jpg') }}"
                                        alt="Profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ $adminData->name }}</h3>

                                <p class="text-muted text-center">{{ $adminData->email }}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Followers</b> <a class="float-right">1,322</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Following</b> <a class="float-right">543</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Friends</b> <a class="float-right">13,287</a>
                                    </li>
                                </ul>

                                <a href="#" class="btn btn-primary btn-block">
                                    <b>Follow</b>
                                </a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-8">
                        <div class="card card-warning">
                            <div class="card-header">
                                <i class="fas fa-user-edit" style="float: right;"></i>
                                <h3 class="card-title">Edit Profile</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.profile.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="labelname">Username <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="labelname" name="name"
                                                    value="{{ $adminData->name }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="profileImage">Profile Image <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="profileImage"
                                                            name="profile_photo_path">
                                                        <label class="custom-file-label" for="profileImage">Choose
                                                            image</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="labelemail">Email address <span class="text-danger">*</label>
                                                <input type="email" class="form-control" id="labelemail" name="email"
                                                    value="{{ $adminData->email }}" required>
                                            </div>
                                            <img id="showImage" class="w-25"
                                                src="{{ !empty($adminData->profile_photo_path)? url('upload/admin-images/' . $adminData->profile_photo_path): url('upload/no-img.jpg') }}"
                                                alt="Profile picture">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warning">
                                        <i class="fas fa-user-shield"></i>
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <script>
        $(document).ready(function() {
            $('#profileImage').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    <!-- bs-custom-file-input -->
    <script src="{{ asset('adminlte3/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>

@endsection
