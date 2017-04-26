@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-20 col-md-offset-0">
                <div class="panel panel-default" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
                    <div class="panel-heading" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:17px">
                        <h4 style= "color: black"> Fouls List </h4>

                    </div>

                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr class="bg-info">
                            <th>Player </th>
                            <th>Match </th>
                            <th>Yellow</th>
                            <th>Red</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($fouls as $foul)

                           <?php $player = $foul->player;?>




                                <td>{{ $player->p_fname }} {{ $player->p_lname }}</td>
                                <td>{{ $foul->match_id }} </td>
                                <td>{{ $foul->y_card }}</td>
                                <td>{{ $foul->r_card }}</td>
                            </tr>
                        @endforeach



                        </tbody>

                    </table>



                </div>
            </div>
        </div>
    </div>
@endsection


