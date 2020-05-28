@extends('layouts.app')
<!-- link css -->
<link href="{{ asset('css/reservation.css') }}" rel="stylesheet">
<link href="{{ asset('css/account.css') }}" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
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

                @foreach($history as $reservation)




                            <div class="res-container">

                                <div class="card flex1" style="width: 25%;">

                                    <a href="{{url('/Item/'.$reservation->item->id)}}">
                                        <img src="{{asset('/storage/' .$reservation->item->thumbnail_path )}}" class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" role="img"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em"></text>
                                    </a>
                                </div>
                                <div class="flex2" style="width: 30%;">
                                    <div style="width:100%; height:10px; text-align:center;">
                                        <span style="font-size: 1.5em"><u>User Info</u><br></span><br>
                                        <small style="font-size: 1em;">{{$reservation->item->user->name}} </small><br><br>
                                        <small style="font-size: 1em;">{{$reservation->item->user->city}} </small>
                                    </div>
                                </div>
                                <div class="flex3" style="width: 50%; padding-left: 10%; padding-top: 50px">

                                    <button type="button"  class="mt-2 btn btn-warning" style="display: inline;margin-left: 2%;width: 30%" data-toggle="modal" data-target="#commentmodal">Comment</button>

                                </div>
                               
                            </div>

                    @endforeach

                        
<!-- The Modal for report -->
<div class="modal" id="commentmodal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Commenting this item</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{url('comment')}}" method="POST">
                    @csrf
        
                    <div class="form-group">
                            <input type="radio" name="rating" class="rating star5" value="5" id="star5"><label for="star5" class="rating star5"></label>
                            <input type="radio" name="rating" class="rating star4" value="4" id="star4"><label for="star4" class="rating star5"></label>
                            <input type="radio" name="rating" class="rating star3" value="3" id="star3"><label for="star3" class="rating star3"></label>
                            <input type="radio" name="rating" class="rating star5" value="2" id="star2"><label for="star2" class="rating star2"></label>
                            <input type="radio" name="rating" class="rating star5" value="1" id="star1"><label for="star1" class="rating star1"></label>
                        <textarea style="height: 100px" type="text" class="form-control" name="comment" id="" placeholder="Enter your comment here"></textarea>
                    </div>
                    <input type="hidden" name="item_id" value="{{$reservation->item->id}}">
    
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">

                <button type="button" class="btn btn-dark" id="closemodal" data-dismiss="modal">close</button>
                <button type="submit" class="btn btn-primary">Comment</button>

            </form>
            </div>

        </div>
    </div>
</div>
<!-- The Modal end -->



@include('inc.jsSidebar')

@endsection
                