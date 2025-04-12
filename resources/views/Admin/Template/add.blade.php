@extends('Admin.layout')

@section('main')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Template</h1>
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
                                <h3 class="card-title">Add Template</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('addTemplate') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Days</label>
                                        <input type="number" name="days" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Days">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Name">
                                    </div>


                                    {{-- <div class="form-group">
                                        <label>Excercise</label>
                                        <select name="excercise_id" class="form-control">
                                            <option>Select Option</option>
                                            @foreach ($excercise as $item)
                                                
                                            <option value="{{$item->id}}">{{$item->name}}   - {{$item->excercise_bank_name}}</option>
                                            @endforeach
                                           
                                        </select>
                                    </div>   --}}
                                    <div class="form-group">
                                        <label>Multiple</label>
                                        <select class="select2" multiple="multiple" name="excercises[]"
                                           data-placeholder="Select Excercise" style="width: 100%;">
                                            <option>Select Option</option>
                                            @foreach ($excercise as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }} -
                                                    {{ $item->excercise_bank_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputFile">Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">

                                                <input type="file" id="avatar" name="image" />
                                            </div>

                                        </div>

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


    @push('scripts')
        <!-- Select2 -->
        <script src="../../plugins/select2/js/select2.full.min.js"></script>

        <script>
            $(function() {
                //Initialize Select2 Elements
                $('.select2').select2();

            });
        </script>
    @endpush
@endsection
