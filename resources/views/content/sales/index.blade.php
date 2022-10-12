@extends('content.layouts.main')
@section('title')
    Sales Team
@endsection
@section('styles')
    <link href="{{asset('libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"
          type="text/css"/>
@endsection
@section('content')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h4 class="page-title">Sales Team</h4>
                    <div class="text-sm-right mb-2">
                        <a href="{{route('sales-team.create')}}" id="create_order_btn"
                           class="btn btn-primary waves-effect waves-light"><i
                                class="mdi mdi-plus-circle mr-1"></i>Add New</a>
                    </div>
                </div>
            </div>
            @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{Session::get('message')}}!
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card author-box card-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table
                                            class="table table-hover m-0 table-centered table-hover dt-responsive w-100"
                                            id="datatable">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Telephone</th>
                                                <th>Current Route</th>
                                                <th>Action</th>
                                            </tr>
                                            <tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete !</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="form-delete">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="modal-body">
                        <p>Dou you want to delete this record?</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Delete It</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="salePersonModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sale Person Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="name">Full Name</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="Enter Full Name" name="name"
                                                           id="name"
                                                           disabled>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="Enter email" name="email" id="email"
                                                           disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="telephone">Telephone</label>
                                                    <input type="number" class="form-control"
                                                           placeholder="Enter Telephone" name="telephone"
                                                           id="telephone"
                                                           disabled>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="name">Joined Date</label>
                                                    <input type="date" class="form-control"
                                                           placeholder="Enter Joined Date" name="doj" id="doj"
                                                           disabled>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="name">Current Routes</label>
                                                    <select class="form-control" id="current_route" name="current_route"
                                                            disabled>
                                                        <option value="">Current Routes</option>
                                                        @foreach($currentRoutes as $currentRoute)
                                                            <option value="{{$currentRoute['key']}}"
                                                                    @isset($teamData) @if($teamData->current_route==$currentRoute['key']) selected @endif @endisset >{{$currentRoute['value']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name">Comments</label>
                                                    <textarea class="form-control" rows="5" name="comment"
                                                              id="comment">{{isset($teamData)?$teamData->comment:""}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('jscript')
    <script src="{{asset('libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script>

        $(document).ready(function () {
            $('#datatable').DataTable(
                {
                    "scrollX": true,
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        url: "{{route('get.sales.team.data')}}",
                        type: 'GET',
                        contentType: "application/json; charset=utf-8",
                    },
                    "columns": [
                        {data: "name"},
                        {data: "email"},
                        {data: "telephone"},
                        {data: "route"},
                        {data: "action", className: "text-center"},
                    ],
                    "searching": false,
                    "ordering": false,
                    "columnDefs": [{
                        "targets": 3,
                        "orderable": false
                    }],
                },
            );
        });

        $('#deleteModal').on('shown.bs.modal', function (e) {
            $("#form-delete").attr("action", $(e.relatedTarget).data('url'));
        });

        function viewData(id) {
            $.ajax({
                type: "GET",
                url: '{{route('get.selected.sale.person.data')}}',
                data: {id: id},
                success: function (result) {
                    $('#name').val(result.name);
                    $('#email').val(result.email);
                    $('#telephone').val(result.telephone);
                    $('#doj').val(result.joined_date);
                    $('#current_route').val(result.current_route);
                    $('#comment').val(result.comment);
                    $('#salePersonModal').modal('show');
                },
            });
        }

    </script>
@endsection
