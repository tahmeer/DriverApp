@extends('Admin.layout')

@section('main')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create Flight</h1>
                    </div><!-- /.col -->
                   
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
                                <h3 class="card-title">Create Flight</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('addFlight')}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Flight Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Departure City</label>
                                        <select class="select2 form-control" name="departure_city"
                                            data-placeholder="Select City" style="width: 100%;">
                                            <option>Select Option</option>
                                            @foreach ($cities as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Departure Date/Time</label>
                                        <input type="datetime-local" name="departure_date_time" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Arrival City</label>
                                        <select class="select2 form-control" name="arrival_city"
                                            data-placeholder="Select City" style="width: 100%;">
                                            <option>Select Option</option>
                                            @foreach ($cities as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Arrival Date/Time</label>
                                        <input type="datetime-local" name="arrival_date_time" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Name">
                                    </div>

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
