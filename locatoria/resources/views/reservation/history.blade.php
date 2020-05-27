@extends('layouts.app')
<!-- link css -->
<link href="{{ asset('css/reservation.css') }}" rel="stylesheet">
<link href="{{ asset('css/account.css') }}" rel="stylesheet">
<!--  -->
@section('content')
    @include('inc.sidebar')


    <!-- sidebar-wrapper  -->
    <main class="page-content">
        <div class="container-fluid">
            <img src="{{asset('images/history.jpg')}}" style="width: 100px; height:100px">
            <h2>History</h2>
            <hr>
            <div class="row">




@include('inc.jsSidebar')

@endsection
                