@extends('adminlte::page')

@section('title', 'Reports')

@section('content_header')
    <h1 class="text-primary">Reports</h1>
@stop

@section('content')


   <div class="card">
    <div class="card-body">
         <form action="{{ route('reports.generate') }}" method="GET">


        <div class="form-group">
            <label>Start Month</label>
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input type="date" name="start_month" id="" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label>End Month</label>
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input type="date" name="end_month" id="" class="form-control">
            </div>
        </div>
        <div class="">
            <button   class="btn btn-primary" type="submit">Generate</button>
        </div>
    </form>
    </div>

   </div>
@stop
