@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:18px;">
                    <div class="panel-heading" style="font-size:20px;background-color: lightgoldenrodyellow">
                          <h4 style= "color: black">Roles</h4>
                          <a href="{{url('/roles/create')}}" class="btn btn-primary btn-sm" style="font-size:20px">Create New Role</a>
                    </div>
                    <div class="panel-body">
                        @if (count($roles) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered cds-datatable">
                                    <thead> <!-- Table Headings -->
                                    <th>Name</th><th>Display Name</th><th>Description</th>
                                    </thead>
                                    <tbody> <!-- Table Body -->
                                    @foreach ($roles as $role)
                                        <tr>
                                            {{--<td class="table-text"><div><a href="{{ url('/roles/'.$role->id.'/edit') }}">{{ $role->name }}</a></div></td>--}}
                                            <td class="table-text"><div>{{ $role->name }}</div></td>
                                            <td class="table-text"><div><a href="{{ url('/roles/'.$role->id.'/edit') }}">{{ $role->display_name }}</a></div></td>
                                            <td class="table-text"><div>{{ $role->description }}</div></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="panel-body"><h4>No Role Records found</h4></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <style>
        .table td { border: 0px !important; }
        .tooltip-inner { white-space:pre-wrap; max-width: 400px; }
    </style>

    <script>
        $(document).ready(function() {
            $('table.cds-datatable').on( 'draw.dt', function () {
                $('tr').tooltip({html: true, placement: 'auto' });
            } );

            $('tr').tooltip({html: true, placement: 'auto' });
        } );
    </script>
@endsection