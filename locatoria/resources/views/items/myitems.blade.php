@extends('layouts.app')
<!-- link css -->
<link href="{{ asset('css/myitems.css') }}" rel="stylesheet">
<link href="{{ asset('css/account.css') }}" rel="stylesheet">

<!--  -->
@section('content')
    
    <br><br><br>
    <div class="nav">
      <div class="mini-block">
        <img src="{{asset('storage/'.$user->picture)}}" style="width:150px; height:150px; border-radius:50%; margin-left:100px;">
           <div class="s-nav">
              <a href="{{ url('/user/'.$user->id) }}"><button type="button" class="butt btn btn-secondary"><i class="fas fa-home" style="margin-right: 7px;"></i>My Profile</button></a>
              <a href="#"><button type="button" class="butt btn btn-secondary"><i class="fas fa-envelope-open-text" style="margin-right: 7px;"></i>My messages</button></a>
              <a href="#"><button type="button"  class="butt btn btn-secondary"><i class="fas fa-heart" style="margin-right: 7px;"></i>My favorites</button></a>
              <a href="{{ url('/Reservation') }}"><button type="button"  class="butt btn btn-secondary"><i class="fas fa-check-square" style="margin-right: 7px;"></i>My reservations</button></a>
              <a href="{{ url('Item/create/') }}"><button type="button"  class="butt btn btn-secondary"><i class="fas fa-plus-circle" style="margin-right: 7px;"></i>Add item</button></a>            
            </div>
      </div>
    </div>

    <div class="album ">
    
      
            @if($user->items->count() > 0)
            @foreach($user->items as $item)
            <div class="card" style="width: 18rem;">
              <img src="{{asset('/storage/' .$item->thumbnail_path )}}" class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" role="img"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em"></text>
          
            <div class="card-body">
              <h5 class="card-title">{{$item->title}}</h5>
              <p class="card-text">{{$item->description}}</p>
              <a href="{{ url('/Item/'.$item->id) }}" class="btn btn-primary">view details</a>
              <div class="btns">
                <div class="col1">
                    <label for="adresse"><br></label>
                    </i><a href="{{ url('Item/'.$item->id. '/edit') }}"><button type="button" class="btn btn-outline-success my-2 my-sm-0"><i class="fas fa-edit" style="margin-right: 7px;"></i>Edit </button></a>
                </div> 
                
                <div class="col2">
                  <button type="button" class="btn btn-danger pull-right " onclick="deleteItem({{ $item->id }})">Delete</button>
                  <form method="post" action="{{ url('Item/' .$item->id. '/delete') }}" id="delete-form" style="display: none">
                      @csrf
                          @method('PUT')
                  </form>
                </div>
              </div>
            </div>
          </div>
          
          @endforeach
          @else
            <div class="msg">
              <p class="msg">No items found</p>
              <small>Sorry try latter !!</small> 
            </div>
          @endif
       
  </div>
  <br><br><br><br><br>

  
    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <!-- TinyMCE -->
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

    <script>
      $(function () {
          //TinyMCE
          tinymce.init({
              selector: "textarea#tinymce",
              theme: "modern",
              height: 300,
              plugins: [
                  'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                  'searchreplace wordcount visualblocks visualchars code fullscreen',
                  'insertdatetime media nonbreaking save table contextmenu directionality',
                  'emoticons template paste textcolor colorpicker textpattern imagetools'
              ],
              toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
              toolbar2: 'print preview media | forecolor backcolor emoticons',
              image_advtab: true
          });
          tinymce.suffix = ".min";
          tinyMCE.baseURL = '{{ asset('assets/backend/plugins/tinymce') }}';
      });
  
      function deleteItem(id) {
              swal({
                  title: 'Are you sure?',
                  text: "You want to delete this item ",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#d33',
                  cancelButtonColor: '#3085d6',
                  confirmButtonText: 'Yes, delete it!',
                  cancelButtonText: 'No, cancel!',
                  confirmButtonClass: 'btn btn-danger',
                  cancelButtonClass: 'btn btn-success',
                  buttonsStyling: false,
                  reverseButtons: true
              }).then((result) => {
                  if (result.value) {
                      event.preventDefault();
                      document.getElementById('delete-form').submit();
                  } else if (
                      // Read more about handling dismissals
                      result.dismiss === swal.DismissReason.cancel
                  ) {
                      swal(
                          'Cancelled',
                          'The item is not deleted :)',
                          'info'
                      )
                  }
              })
          }
  
  </script>

@endsection