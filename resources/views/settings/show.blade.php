@include('../dashboard.header')

<style>

.card {
    box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
}
.img-md {
    width: 4rem;
    height: 4rem;
}
.btn-link {
    color: white;
    box-shadow: none;
    border-radius: 0;
}
</style>
<div class="content container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12 mt-5">
                {{-- <h3 class="page-title mt-3">Welcome   {{ Auth::user()->name }} </h3> --}}
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Settings </a></li>
                      <li class="breadcrumb-item active" aria-current="page">Camions Settings :</li>
                    </ol>
                  </nav>
            </div>
        </div>
    </div>
    

<div class="container  w-100">
    <div class="row w-100">
        <div class=" col-12 col-sm-6 col-md-12  mb-3  w-100">
            <div class="card">
                <div class="card-body">

                    <!-- Profile picture and short information -->
                    <div class="d-flex align-items-center position-relative pb-3">
                        <div class="flex-shrink-0">
                            <img class="img-md rounded-circle" src="https://cdn-icons-png.flaticon.com/512/146/146819.png" alt="Profile Picture" loading="lazy">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <a href="#" class="h5 stretched-link btn-link">Koba Trucks</a>
                            <p class="text-muted m-3"> Trucks Manager</p>
                        </div>
                    </div>
                    <p>"The Ultimate Guide to Setting Up Your Truck for Maximum Performance" </p>
                    <!-- END : Profile picture and short information -->

                    <!-- Options buttons -->
                    <div class="mt-3 pt-2 text-center border-top">
                        <div class="d-flex justify-content-end gap-3">
                            <button href="#" class="btn btn-sm btn-info btn-outline-white btn-lg mx-1" data-toggle="modal" data-target="#editRoleModal" >
                                <i class="fa fa-plus-circle"></i> <span class="mx-1"> Add </span>  </button>
                        </div>
                    </div>
                    <!-- END : Options buttons -->

                </div>
            </div>
        </div>
       
    </div>
</div>

<div class="row">
    <div class="col-md-12 d-flex">
        <div class="card card-table flex-fill">
            <div class="card-header">
                @includeWhen($errors->any(),'../_errors')
                @if (session('success'))
                <div id="flash-success" class="flash-success">
                    {{ session('success') }}
                </div>
                    <script>
                       removeAlert(); 
                    </script>
            @endif
            
                <h4 class="card-title float-left mt-2">All camions Types </h4>
            </div>
            @php
             $count =0 ;   
           @endphp

  
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Camion Capacity </th>
                                        <th class="text-center">Camion Type</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if($camions->isEmpty())
                                        <div class="col-md-12">
                                            <div class="alert alert-info text-center" role="alert">
                                                There are no camions available.
                                            </div>
                                        </div>
                                    @else
                                       
                                        @foreach($camions as $camion)
                                            @php
                                            $count++ ;   
                                             @endphp
                                            <tr>
                                                <td class="text-center">{{$count}}</td>
                                                <td class="text-center">{{$camion->Camion_capacity}}</td>   
                                                <td class="text-center">{{$camion->Camion_type}}</td>                                      
                                                   <td class="text-center">
                                                    <a href="javascript:void(0)" onclick="if(confirm('Are You sure to delete this Typecamions?')){document.getElementById('camion{{$camion->id}}').submit();} else {return false}" class="">
                                                        <lord-icon
                                                            src="https://cdn.lordicon.com/kfzfxczd.json"
                                                            trigger="hover"
                                                            colors="primary:#911710"
                                                            style="width:40px;height:40px">
                                                        </lord-icon>
                                                    </a>                                                    
                                                    
                                                </td>
                                                <form method="POST" action="{{route('destroycamiontypes',[$camion->id])}}" id="camion{{$camion->id}}">
                                                    @csrf 
                                                    @method('DELETE')
                                                </form>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                                
                            </table>
                            <div class="d-flex justify-content-center">
                                {{-- {!! $camions->links() !!} --}}
                            </div>
                           
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>

        
        <div class="modal fade" id="editRoleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content w-100">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">TYPE OF CAMION</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body ">
                  <form method="POST" action="{{route('Storecamiontypes') }}">
                    {{ csrf_field() }}
                    @method('POST')
            

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Camion Type :</label>
                        <input type="text" name="Camion_type" class="form-control @error('Camion_type') error-border @enderror" id="recipient-name">
                        @error('Camion_type')
                            <div class="error">
                              {{ $message }}
                            </div>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Camion Capacity :</label>
                        <input type="text" name="Camion_capacity" class="form-control @error('Camion_capacity') error-border @enderror" id="recipient-name">
                        @error('Camion_capacity')
                            <div class="error">
                              {{ $message }}
                            </div>
                          @enderror
                      </div>
                     
                   <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" id="saveBtn" class="btn btn-primary">Save</button>
                </div>
                  </form>
                </div>
               
              </div>
            </div>
          </div>
            
     
 @include('../dashboard.footer')