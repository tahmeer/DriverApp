@extends('Admin.layout')

@section('main')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit User</h1>
                    </div><!-- /.col -->
                    {{-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col --> --}}
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->

                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit User</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('editUser',$user->id)}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Full Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Name" value="{{$user->name}}">
                                            @if ($errors->has('name'))
                                            <p class="error-tag alert-danger">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>

                                    {{-- <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter email"  value="{{$user->email}}">
                                    </div> --}}

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone</label>
                                        <input type="text" name="phone" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Phone"  value="{{$user->phone}}">
                                            @if ($errors->has('phone'))
                                        <p class="error-tag alert-danger">{{ $errors->first('phone') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="identity_no">Identity Number</label>
                                        <input type="text" name="cnic_no" class="form-control" id="cnic_no"
                                            placeholder="Enter Identity Number" value="{{$user->cnic_no}}">
                                            @if ($errors->has('cnic_no'))
                                            <p class="error-tag alert-danger">{{ $errors->first('cnic_no') }}</p>
                                            @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="position">Address 1</label>
                                        <input type="text" name="address_1" value="{{$user->address_1}}" class="form-control" id="address_1"
                                            placeholder="Enter Address 1">

                                            @if ($errors->has('address_1'))
                                            <p class="error-tag alert-danger">{{ $errors->first('address_1') }}</p>
                                            @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="position">Address 2</label>
                                        <input type="text" name="address_2" value="{{$user->address_2}}" class="form-control" id="address_2"
                                            placeholder="Enter Address 2">

                                            @if ($errors->has('address_2'))
                                            <p class="error-tag alert-danger">{{ $errors->first('address_2') }}</p>
                                            @endif
                                    </div>

                                </div>
                               

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
