@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row" style="background-color: lightgoldenrodyellow">
            <div class="col-md-15 col-md-offset-0" style="background-color: lightgoldenrodyellow">
                <div class="panel panel-default" style="background-color: lightgoldenrodyellow;box-shadow: 2px 2px 2px #999;font-family:cambria;font-size:18px;">
                    <div class="panel-heading" style="background-color: lightgoldenrodyellow">
        {!! Form::open(['url' => 'table']) !!}
                        <h1 style="text-align:center"> Statistics </h1>
        <table class="table tabel-sm table-striped table-hover tabel-responsive" style="background-color: lightgoldenrodyellow">
            <thead style="background-color: lightgoldenrodyellow">
            <tr class="bg-info">
                <th style="background-color: lightgoldenrodyellow"> Most Scored </th>
                <th style="background-color: lightgoldenrodyellow"> Most Assists </th>
                <th style="background-color: lightgoldenrodyellow"> Most Saves </th>
                <th style="background-color: lightgoldenrodyellow"> Most Passes  </th>
                <th style="background-color: lightgoldenrodyellow"> Most Fouls </th>
            </tr>
            </thead>

            <tbody style="background-color: lightgoldenrodyellow">



                <tr style="background-color: lightgoldenrodyellow">
                    <td>{{ $statistic->m_scored }}</td>
                    <td> John Paul </td>
                    <td> Emanderson </td>
                    <td> Arul </td>
                    <td>{{ $statistic->m_fouls }}</td>
                </tr>





            </tbody>
        </table>


    </div>
                </div>
            </div>
        </div>
    </div>







@stop
