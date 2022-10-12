@extends('content.layouts.main')
@section('title')
    Sales Team Create
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
                    <h4 class="page-title">Sales Team Create</h4>
                </div>
            </div>
            <form id="saleTeam" autocomplete="off" method="post"
                  action="{{isset($teamData)?route('sales-team.update',$teamData->id):route('sales-team.store')}}">
                <input type="hidden" id="id" name="id" value="{{isset($teamData)?$teamData->id:""}}">
                @csrf
                @if(isset($teamData))
                    {{ method_field('PUT') }}
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <input type="hidden" name="id" id="id"
                                                   value="{{isset($teamData)?$teamData->id:""}}">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="name">Full Name</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="Enter Full Name" name="name"
                                                           id="name" required
                                                           value="{{isset($teamData)?$teamData->name:""}}">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="Enter email" name="email" id="email"
                                                           required
                                                           value="{{isset($teamData)?$teamData->email:""}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="telephone">Telephone</label>
                                                    <input type="number" class="form-control"
                                                           placeholder="Enter Telephone" name="telephone"
                                                           id="telephone" required
                                                           value="{{isset($teamData)?$teamData->telephone:""}}">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="name">Joined Date</label>
                                                    <input type="date" class="form-control"
                                                           placeholder="Enter Joined Date" name="doj" id="doj"
                                                           required
                                                           value="{{isset($teamData)?$teamData->joined_date:""}}">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="name">Current Routes</label>
                                                    <select class="form-control" id="current_route" name="current_route"
                                                            required>
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
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="name">Comments</label>
                                                    <textarea class="form-control" rows="5" name="comment"
                                                              id="comment">{{isset($teamData)?$teamData->comment:""}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <a href="{{ url('sales-team') }}"
                                                   class="btn btn-secondary waves-effect waves-light m-1">
                                                    <i class="fe-x mr-1"></i> Cancel
                                                </a>
                                                <button type="submit" id="create_supplier"
                                                        class="btn btn-primary waves-effect waves-light m-1 float-right">
                                                    <i class="fe-check-circle mr-1"></i>@isset($teamData)
                                                        Update
                                                    @else
                                                        Create
                                                    @endif
                                                </button>
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
@endsection
@section('jscript')
    <script src="{{asset('libs/jquery-validate/jquery.validate.min.js')}}"></script>
    <script src="{{asset('libs/jquery-validate/additional-methods.min.js')}}"></script>
    <script>
        const formValidation = $("#saleTeam").validate({
            rules: {
                email: {
                    remote: function () {
                        return {
                            url: '{{route('isUserEmailUnique')}}',
                            type: "post",
                            data: {
                                id: function () {
                                    return $('#id').val();
                                },
                                _token: function () {
                                    return $('input[name=_token]').val();
                                }

                            }
                        };
                    }
                },
            },
            messages: {
                email: {remote: "This email has taken already"}
            },
            errorPlacement: function (error, element) {
                error.appendTo(element.parent().parent());
            },
            highlight: function (element) {
                $(element).removeClass("valid");
                $(element).addClass("error");
            },
            unhighlight: function (element) {
                $(element).removeClass("error");
                $(element).addClass("valid");
            },
            errorElement: 'span',
            errorClass: 'help-block error-help-block'
        });

        $(function () {
            let dtToday = new Date();
            let month = dtToday.getMonth() + 1;
            let day = dtToday.getDate();
            let year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();
            let maxDate = year + '-' + month + '-' + day;
            $('#doj').attr('max', maxDate);
        });

    </script>
@endsection
