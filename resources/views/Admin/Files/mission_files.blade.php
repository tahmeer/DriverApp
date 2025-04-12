@extends('Admin.layout')

@section('main')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Mission Files</h1>
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
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form method="POST">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>From Date</label>
                                                <input type="date" onchange="getTrip()" name="from" id="from"
                                                    class="form-control">

                                            </div>
                                            <div class="col-md-2">
                                                <label>To Date</label>
                                                <input type="date" onchange="getTrip()" name="to" id="to"
                                                    class="form-control">

                                            </div>
                                            <div class="col-md-2">
                                                <label>Event</label>
                                                <select name="event_id" onchange="getMeetings(this)" class="form-control"
                                                    id="events">
                                                    <option>Select Option</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Meeting</label>
                                                <select name="meeting_id" onchange="getMissions(this)" class="form-control"
                                                    id="meetings">
                                                    <option>Select Option</option>

                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Missions</label>
                                                <select name="mission_id" onchange="getMissionsPerson(this)"
                                                    class="form-control" id="missions">
                                                    <option>Select Option</option>

                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Mission User</label>
                                                <select name="mission_person_id" class="form-control" id="mission_persons">
                                                    <option>Select Option</option>

                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <button onclick="FormSubmit(event)" class="btn btn-info">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div id="tableContainer">

                                    </div>

                                    {{-- <table class="data_table table " id="MissionFilesTable">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">User Name</th>
                                                <th scope="col">Files</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table> --}}
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
                <form action="{{ route('admin.user.delete') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>Are you want to delete ?</p>
                        <input type="hidden" name="id" id="userId">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        function DeleteModal(e) {
            $('#deleteModal').modal('show');
            let userId = e.getAttribute('data-userId');
            $('#userId').val(userId);

        }
        // $(function() {

        //     var table = $('.data_table').DataTable({
        //         processing: true,
        //         serverSide: true,
        //         ajax: "{{ route('userList') }}",
        //         columns: [{
        //                 data: 'id',
        //                 name: 'id'
        //             },
        //             {
        //                 data: 'name',
        //                 name: 'name'
        //             },
        //             {
        //                 data: 'email',
        //                 name: 'email'
        //             },
        //             {
        //                 data: 'phone',
        //                 name: 'phone'
        //             },
        //             {
        //                 data: 'action',
        //                 name: 'action',
        //                 orderable: false,
        //                 searchable: false
        //             },
        //         ]
        //     });
        // });
        // $(document).ready(function() {

        //     $('.deleteUserButton').click(function() {
        //         
        //     });
        // });
    </script>

    <script type="text/javascript">
        function getTrip() {
            let from_date = $('#from').val();
            let to_date = $('#to').val();

            if (from_date && to_date) {
                $.ajax({
                    method: 'POST',
                    url: "{{ route('admin.mission_filter') }}",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'from_date': from_date,
                        'to_date': to_date
                    },
                    success: function(response) {
                        if (response.message == "Success") {
                            $('#events').append(response.data);

                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {}
                });

            } else {
                console.log("from and to dates are not setted");

            }
        }

        function getMeetings(element) {
            let event_id = $(element).val();

            if (event_id) {
                $.ajax({
                    method: 'POST',
                    url: "{{ route('admin.get_meeting') }}",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'event_id': event_id
                    },
                    success: function(response) {
                        if (response.message == "Success") {
                            $('#meetings').append(response.data);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {}
                });

            } else {
                console.log("from and to dates are not setted");

            }
        }

        function getMissions(element) {
            let meeting_id = $(element).val();

            if (meeting_id) {
                $.ajax({
                    method: 'POST',
                    url: "{{ route('admin.get_mission') }}",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'meeting_id': meeting_id
                    },
                    success: function(response) {
                        if (response.message == "Success") {
                            $('#missions').append(response.data);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {}
                });

            } else {
                console.log("from and to dates are not setted");

            }
        }

        function getMissionsPerson(element) {
            let mission_id = $(element).val();

            if (mission_id) {
                $.ajax({
                    method: 'POST',
                    url: "{{ route('admin.get_mission_person') }}",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'mission_id': mission_id
                    },
                    success: function(response) {
                        if (response.message == "Success") {
                            $('#mission_persons').append(response.data);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {}
                });

            } else {
                console.log("from and to dates are not setted");

            }
        }

        function FormSubmit(event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('admin.get_mission_person_files') }}",
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    from_date: $('#from').val(),
                    to_date: $('#to').val(),
                    event_id: $('#events').val(),
                    meeting_id: $('#meetings').val(),
                    mission_id: $('#missions').val(),
                    mission_person_id: $('#mission_persons').val()
                },
                success: function(response) {
                    if (response.message === "Success") {
                        // Load the response HTML into the target div
                        $('#tableContainer').html(response.html);

                        // Initialize DataTable
                        $('#MissionFilesTable').DataTable();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("Error:", errorThrown);
                }
            });
        }
    </script>
@endpush
