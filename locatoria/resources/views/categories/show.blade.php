@extends('layouts.app')
<!-- link css -->
<link href="{{ asset('css/category.css') }}" rel="stylesheet">
<!--  -->
@section('content')

    <table class="img-container">
        <tr>
        <td class="image">
            <img src="{{asset('images/logo.png')}}">
        </td>
        <td class="image" style="font-size: 3em;">
            {{$category->name}}
        </td>
        </tr>
    </table>
    <div class="search">
        <form  action="{{URL::to('/search')}}" method="POST" class="form-inline mt-2 mt-md-0">
            @csrf
            <input class="form-control mr-sm-2" type="text" name= 'city' placeholder="District,City,Region ...." aria-label="Search">
            <input class="form-control mr-sm-2" type="text" name= 'object' placeholder="Object" aria-label="Search">
            <input class="form-control mr-sm-2" type="text" name= 'budget_max' placeholder="Budget max" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <br>
    </div>


    <div class="album">
        @if(count($items) > 0)
            
            @foreach ($items as $item)
                
                <div class="item">
                    <a href="{{url('/Item/'.$item->id)}}">
                        <div class="img">
                            <img src="{{asset('storage/'.$item->thumbnail_path)}}">
                        </div>
                    </a>
                    <div class="name">
                        {{$item->title}}
                    </div>
                    <div class="desc btn-group">
                        <p><a class="btn btn-sm btn-outline-secondary" href="{{asset('/Item/'.$item->id)}}" role="button">View details &raquo;</a></p> 
                        @if($item->status == '0')
                            <a href="{{url('Premium')}}">
                                <i class="fas fa-star" style="width: 25px; height: 25px; margin-left: 8px; color:yellow"></i>
                            </a>
                        @endif                     
                    </div>
                </div>
            @endforeach
            <div class="barre">
                    {{ $items->links() }}
            </div>
        @else
        <div class="msg">
            <p class="msg">No items found</p>
            <small>Sorry try latter !!</small> 
        </div>
        @endif
    </div>
@endsection