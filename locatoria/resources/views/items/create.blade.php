@extends('layouts.auth')

@section('content')

<br><br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Item</div>
    
                    <div class="card-body">
                        <form  action="{{ action('ItemsController@store') }}" enctype="multipart/form-data" method="post">
                            @csrf
    
                            <div class="form-group row">
                                <label for="title_item" class="col-md-4 col-form-label text-md-right">Title</label>
    
                                <div class="col-md-6">
                                    <input id="title_item"  class="form-control @error('title_item') is-invalid @enderror" name="title_item" value="{{ old('title_item') }}" autocomplete="title_item">
    
                                    @error('title_item')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
    
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
    
                                <div class="col-md-6">
                                    <input id="description"  class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description">
    
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
    
                                <div class="col-md-6">
                                    <input id="status"  class="form-control @error('status') is-invalid @enderror" name="status" autocomplete="new-status">
    
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">Category</label>
    
                                <div class="col-md-6">
                                      <select class="custom-select" id="category_id" name="category_id" autocomplete="new-category_id">
                                            <option selected>Choose...</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                            @endforeach
                                      </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="offre" class="col-md-4 col-form-label text-md-right">Offre</label>
    
                                <div class="col-md-6">
                                    <input id="offre"  class="form-control @error('offre') is-invalid @enderror" name="offre" autocomplete="new-offre">
    
                                    @error('offre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="thumbnail_path" class="col-md-4 col-form-label text-md-right">Image</label>
                                
                                <div class="col-md-6">
                                    <input type="file" class="form-control-file" id="thumbnail_path" name="thumbnail_path">

                                    @if($errors->has('thumbnail_path'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('thumbnail_path')}}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>                     
        </div>
    </div>

@endsection