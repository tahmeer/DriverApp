@extends('Admin.layout')

@section('main')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Order List</h1>
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
                                                <th scope="col">Pick up Location</th>
                                                <th scope="col">Drop Location</th>
                                                <th scope="col">Phone No</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Payment Status</th>
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
    <div class="modal fade" id="assignModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.assign.order')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        {{-- <p>Are you want to delete ?</p> --}}
                        <input type="hidden" name="order_id" id="orderId">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Assign To:</label>
                                <select class="select2 form-control" name="assign_to"
                                    data-placeholder="Select User" style="width: 100%;" required>
                                    <option>Select Option</option>
                                    @foreach ($users as $item)
                                        <option value="{{ $item->id }}" >
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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
        function AssignModal(e) {
            $('#assignModal').modal('show');
            let orderId = e.getAttribute('data-orderId');
            $('#orderId').val(orderId);
            
        }
        $(function() {

            var table = $('.data_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('orderList') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'pickup_location',
                        name: 'pickup_location'
                    },
                    {
                        data: 'drop_location',
                        name: 'drop_location'
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'payment_status',
                        name: 'payment_status'
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
