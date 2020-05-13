@extends('layouts.app')

@section('content')


<table class="img-container">
    <tr>
        <td class="image">
            <img src="{{asset('images/logo.png')}}">
        </td>
        <td class="image">
            <h1 class="display-3">Categories</h1>      
        </td>
    </tr>
</table>


<div class="album">   
    @if(count($categories) > 0)
        @foreach ($categories as $category)
        <div class="cat">
            <a href="http://localhost/WEB/locatoria/public/Category/{{$category->id}}">
                <div class="img">
                    <img src="{{asset('images/'.$category->picture)}}">
                </div>
            </a>
            <div class="name">
                {{$category->name}}
            </div>
            <br>
            <small class="desc">
                 {{$category->description}}
            </small>
        </div>
            
        @endforeach
    @else
        <p>No categories found</p> 
    @endif
</div>  

@endsection