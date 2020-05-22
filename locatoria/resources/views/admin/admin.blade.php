@extends('layouts.app')


@section('css')
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">

                        <a href ="{{url('/users')}}"><button type="button" class="btn btn-dark btn-primary btn-lg"><i class="fas fa-users" aria-hidden="true"></i> Users List</button></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
