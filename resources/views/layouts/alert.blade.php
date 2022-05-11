@if(Session::has('succes'))
    <div class="alert alert-success alert-dismissible show fade" style="background-color: rgb(0, 182, 0)">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{session('succes')}}  
      </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible show fade" style="background-color: rgb(255, 0, 0)">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{session('error')}}  
      </div>
@endif