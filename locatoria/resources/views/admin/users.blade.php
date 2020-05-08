@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">

                        @forelse($users as $user)

                            <div class="card-body">

                                <a href="/user/{{$user->id}}" >
                                    <img src="/images/logo.png"> {{-- $user->image --}}
                                </a>
                                <span>name : {{$user->name}}</span>
                                <span>city : {{$user->city}}</span>


                            </div>

                        @empty

                            <div class="card-body">
                                there are no users authenticated!
                            </div>

                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
