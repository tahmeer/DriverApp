@extends('Admin.layout')

@section('main')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create User</h1>
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
                                <h3 class="card-title">Create User</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('addUser') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Full Name</label>
                                        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Full Name">

                                        @if ($errors->has('name'))
                                            <p class="error-tag alert-danger">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter email">
                                        @if ($errors->has('email'))
                                        <p class="error-tag alert-danger">{{ $errors->first('email') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" value="{{old('phone')}}" class="form-control" id="phone"
                                            placeholder="Enter Phone">
                                            @if ($errors->has('phone'))
                                        <p class="error-tag alert-danger">{{ $errors->first('phone') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="identity_no">Identity Number</label>
                                        <input type="text" name="cnic_no" value="{{old('cnic_no')}}" class="form-control" id="cnic_no"
                                            placeholder="Enter CNIC Number">
                                            @if ($errors->has('cnic_no'))
                                            <p class="error-tag alert-danger">{{ $errors->first('cnic_no') }}</p>
                                            @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="position">Address 1</label>
                                        <input type="text" name="address_1" value="{{old('address_1')}}" class="form-control" id="address_1"
                                            placeholder="Enter Address 1">

                                            @if ($errors->has('address_1'))
                                            <p class="error-tag alert-danger">{{ $errors->first('address_1') }}</p>
                                            @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="position">Address 2</label>
                                        <input type="text" name="address_2" value="{{old('address_2')}}" class="form-control" id="address_2"
                                            placeholder="Enter Address 2">

                                            @if ($errors->has('address_2'))
                                            <p class="error-tag alert-danger">{{ $errors->first('address_2') }}</p>
                                            @endif
                                    </div>


                                    <div class="form-group">
                                        
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="exampleInputPassword1" placeholder="Password">

                                                @if ($errors->has('password'))
                                            <p class="error-tag alert-danger">{{ $errors->first('password') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Confirm Password</label>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                id="exampleInputPassword1" placeholder="Password">

                                                @if ($errors->has('password_confirmation'))
                                            <p class="error-tag alert-danger">{{ $errors->first('password_confirmation') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div> --}}
                                </div>
                                <!-- /.card-body -->

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
