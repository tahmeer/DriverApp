@extends('Admin.layout')

@section('main')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Trips List</h1>
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
                        <div class="card">
                           
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="data_table table ">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Flight Number</th>
                                                <th scope="col">Departure City</th>
                                                <th scope="col">Departure Time</th>
                                                <th scope="col">Arrival City</th>
                                                <th scope="col">Arrival Time</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.trip.complete')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>Do you want to complete ?</p>
                        <input type="hidden" name="id" id="tripId">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Complete Trip</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        function CompleteModal(e) {
            $('#deleteModal').modal('show');
            let TripId = e.getAttribute('data-tripId');
            $('#tripId').val(TripId);
            
        }
        $(function() {

            var table = $('.data_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('tripsList') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'flight_number',
                        name: 'flight_number'
                    },
                    {
                        data: 'departure_city_id',
                        name: 'departure_city_id'
                    },
                    {
                        data: 'departure_date',
                        name: 'departure_date'
                    },
                    {
                        data: 'arrival_city_id',
                        name: 'arrival_city_id'
                    },
                    {
                        data: 'arrival_date',
                        name: 'arrival_date'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
        
    </script>
@endpush
