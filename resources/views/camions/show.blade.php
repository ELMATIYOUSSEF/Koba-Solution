@include('../dashboard.header')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12 mt-5">
                {{-- <h3 class="page-title mt-3">Welcome   {{ Auth::user()->name }} </h3> --}}
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Camions</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Show All Camions :</li>
                    </ol>
                  </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex">
            <div class="card card-table flex-fill">
                <div class="card-header">
                    <h4 class="card-title float-left mt-2">All camions </h4>
                    <button type="button" class="btn btn-primary  float-right veiwbutton" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add camion</button>
                </div>
                @php
                $count =0 ;   
               @endphp
    
      
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Driver Name</th>
                                            <th> Camion Type</th>
                                            <th>Camion Capacity</th>
                                            <th class="text-center">Camion Location</th>
                                            <th class="text-center">Status</th>
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
                                                    <td class="text-nowrap">
                                                        {{ $camion->driver_name }}
                                                    </td>
                                                    <td class="text-nowrap">{{$camion->Camion_type}}</td>
                                                    <td class="text-nowrap">{{$camion->Camion_capacity}}</td>
                                                    <td>{{$camion->Camion_location}}</td>
                                                    <td class="text-center"> <button class="badge badge-pill bg-success inv-badge">{{$camion->Camion_status}}</button> </td>
                                                    <td>
                                                        
                                                        <a href="javascript:void(0)" onclick="if(confirm('Are You sure to delete this camion?')){document.getElementById('camion{{$camion->id}}').submit();} else {return false}" class="">
                                                            <lord-icon
                                                                src="https://cdn.lordicon.com/kfzfxczd.json"
                                                                trigger="hover"
                                                                colors="primary:#911710"
                                                                style="width:40px;height:40px">
                                                            </lord-icon>
                                                        </a>
                                                        {{-- <button type="button" class="btn btn-primary  float-right veiwbutton" data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo">Add camion</button> --}}
                                                        <a href="{{ route('camions.edit',[$camion ,])}}" data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo" class=""><lord-icon
                                                                src="https://cdn.lordicon.com/hbigeisx.json"
                                                                trigger="hover"
                                                                colors="primary:#c79816"
                                                                style="width:40px;height:40px">
                                                            </lord-icon></a>
                                                    </td>
                                                    <form method="POST" action="{{route('camions.destroy',[$camion])}}" id="camion{{$camion->id}}">
                                                        @csrf 
                                                        @method('DELETE')
                                                    </form>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     

            {{-- Model save --}}

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Camion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="form"  action="{{route('camions.store')}}">
            @csrf 

            <div class="form-group">
                <label for="exampleFormControlSelect1">Driver select :</label>
                <select class="form-control" name="idDriver" id="exampleFormControlSelect1">
                    <option selected disabled>Choose...</option>
                  <option value="1">Fifel Mouad</option>
                  <option value="2">Youssef Elmati</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Camion Type :</label>
                <select class="form-control" name="Camion_type" id="exampleFormControlSelect1">
                    <option selected disabled>Choose...</option>
                  <option value="Small">Small Truck</option>
                  <option value="Big">Big Truck</option>
                </select>
              </div>

              <div class="form-group">
               <label for="exampleFormControlSelect1">Camion capacity :</label> 
                <select class="form-control" name="Camion_capacity" id="exampleFormControlSelect1">
                    <option selected disabled>Choose...</option>
                  <option value="1">5</option>
                  <option value="2">10</option>
                </select>
              </div>
              
             

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Location :</label>
            <input type="text" name="Camion_location" class="form-control" id="recipient-name">
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" value="available" name="Camion_status" id="inlineRadio1" value="option1">
            <label class="form-check-label" for="inlineRadio1">available</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" value="unavailable" name="Camion_status" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio2">unavailable</label>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

  {{-- Model Update --}}

  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Camion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" id="form"  action="{{route('camions.store')}}">
              @csrf 
  
              <div class="form-group">
                  <label for="exampleFormControlSelect1">Driver select :</label>
                  <select class="form-control" name="idDriver" id="exampleFormControlSelect1">
                      <option selected disabled>Choose...</option>
                    <option value="1">Fifel Mouad</option>
                    <option value="2">Youssef Elmati</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Camion Type :</label>
                  <select class="form-control" name="Camion_type" id="exampleFormControlSelect1">
                      <option selected disabled>Choose...</option>
                    <option value="Small">Small Truck</option>
                    <option value="Big">Big Truck</option>
                  </select>
                </div>
  
                <div class="form-group">
                 <label for="exampleFormControlSelect1">Camion capacity :</label> 
                  <select class="form-control" name="Camion_capacity" id="exampleFormControlSelect1">
                      <option selected disabled>Choose...</option>
                    <option value="1">5</option>
                    <option value="2">10</option>
                  </select>
                </div>
                
               
  
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Location :</label>
              <input type="text" name="Camion_location" class="form-control" id="recipient-name">
            </div>
  
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" value="available" name="Camion_status" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">available</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" value="unavailable" name="Camion_status" id="inlineRadio2" value="option2">
              <label class="form-check-label" for="inlineRadio2">unavailable</label>
            </div>
  
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>
 @include('../dashboard.footer')