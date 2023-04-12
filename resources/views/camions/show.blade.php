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
    @php
    $available = 0;
    $unavailable = 0;
@endphp

@foreach ($camions as $camion)
    @if ($camion->Camion_status == 'available')
        @php
            $available++;
        @endphp
        @else
        @php
            $unavailable++;
        @endphp
    @endif
@endforeach
    <div class="d-flex flex flex-wrap">
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card board1 fill">
            <div class="card-body">
                <div class="dash-widget-header">
                    <div>
                        <h3 class="card_widget_header" id="numavailable">{{$available}}</h3>
                        <h6 class="text-muted">Available Camion</h6> </div>
                    <div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#6eed6e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#6eed6e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg></svg>	
                    </span> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card board1 fill">
            <div class="card-body">
                <div class="dash-widget-header">
                    <div>
                        <h3 class="card_widget_header" id="numunavailable">{{$unavailable}}</h3>
                        <h6 class="text-muted">unavailable Camion</h6> </div>
                    <div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e16f6f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e16f6f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg></svg>	
                    </span> </div>
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
                                            <th class="text-center"> Camion Type</th>
                                            <th class="text-center">Camion Capacity (tonne)</th>
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
                                                    <td >
                                                        {{ $camion->users->name }}
                                                    </td>
                                                    <td class="text-center">{{$camion->camionType->Camion_type }}</td>
                                                    <td class="text-center">{{$camion->camionType->Camion_capacity}}</td>
                                                    <td class="text-center">{{$camion->Camion_location}}</td>
                                                        <td class="text-center" >
                                                            <div class="custom-control custom-switch  ">
                                                                <input type="checkbox" class="custom-control-input camion-switch" id="customSwitches{{$camion->id}}" 
                                                                    @if ($camion->Camion_status == 'available') 
                                                                        checked 
                                                                    @endif>
                                                                <label class="custom-control-label" for="customSwitches{{$camion->id}}"></label>
                                                            </div>
                                                        </td>                                                                                                   
                                                        <td class="text-center">
                                                        
                                                        <a href="javascript:void(0)" onclick="if(confirm('Are You sure to delete this camion?')){document.getElementById('camion{{$camion->id}}').submit();} else {return false}" class="">
                                                            <lord-icon
                                                                src="https://cdn.lordicon.com/kfzfxczd.json"
                                                                trigger="hover"
                                                                colors="primary:#911710"
                                                                style="width:40px;height:40px">
                                                            </lord-icon>
                                                        </a>

                                                        <a data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo" class="btn-open-modal" onclick="openModal({{ $camion->id }})">
                                                            <lord-icon src="https://cdn.lordicon.com/hbigeisx.json" trigger="hover" colors="primary:#c79816" style="width:40px;height:40px"></lord-icon>
                                                        </a>                                                        
                                                        
                                                    </td>
                                                    <form method="POST" action="{{route('camions.destroy',[$camion->id])}}" id="camion{{$camion->id}}">
                                                        @csrf 
                                                        @method('DELETE')
                                                    </form>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                    
                                </table>
                                <div class="d-flex justify-content-center">
                                    {!! $camions->links() !!}
                                </div>
                               
                            </div>
                           
                        </div>
                    </div>
                </div>
               
                <div>
                    <div>
                        
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitches" checked disabled>
                        <label class="custom-control-label" for="customSwitches"></label>
                    </div>
                    <h6>available</h6>
                    </div>
                    <div>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitches"  disabled>
                            <label class="custom-control-label" for="customSwitches"></label>
                        </div>
                    <h6>unavailable</h6>
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
                <select class="form-control @error('idDriver') error-border @enderror" name="idDriver" id="exampleFormControlSelect1">
                    <option selected disabled>Choose...</option>
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                @error('idDriver')
                <div class="error">
                  {{ $message }}
                </div>
              @enderror
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Camion Type :</label>
                <select class="form-control @error('camion_type_id') error-border @enderror" name="camion_type_id" id="exampleFormControlSelect1">
                    <option selected disabled>Choose...</option>
                  <@foreach($camionTypes as $camionType)
                  <option value="{{$camionType->id }}">{{$camionType->Camion_type }}</option>
                  @endforeach
                </select>
                @error('camion_type_id')
                <div class="error">
                  {{ $message }}
                </div>
              @enderror
              </div>              
             

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Location :</label>
            <input type="text" name="Camion_location" class="form-control @error('Camion_location') error-border @enderror" id="recipient-name">
            @error('Camion_location')
                <div class="error">
                  {{ $message }}
                </div>
              @enderror
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
          <form method="POST" id="form" action="{{ isset($camion) ? route('camions.update', [$camion]) : route('camions.store') }}">
                {{ csrf_field() }}
                @method('PUT')
                <input type="hidden" name="idcamion">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Driver select :</label>
                  <select class="form-control @error('idDriver') error-border @enderror" name="idDriver" id="exampleFormControlSelect1">
                      <option selected disabled>Choose...</option>
                      @foreach($users as $user)
                      <option value="{{$user->id}}">{{$user->name}}</option>
                      @endforeach
                  </select>
                  @error('idDriver')
                  <div class="error">
                    {{ $message }}
                  </div>
                @enderror
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Camion Type :</label>
                  <select class="form-control @error('camion_type_id') error-border @enderror" name="camion_type_id" id="exampleFormControlSelect1">
                      <option selected disabled>Choose...</option>
                    <@foreach($camionTypes as $camionType)
                    <option value="{{$camionType->id }}">{{$camionType->Camion_type }}</option>
                    @endforeach
                  </select>
                  @error('camion_type_id')
                  <div class="error">
                    {{ $message }}
                  </div>
                @enderror
                </div>              
                
               
  
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Location :</label>
              <input type="text" name="Camion_location" class="form-control @error('Camion_location') error-border @enderror" id="recipient-name">
              @error('Camion_location')
                <div class="error">
                  {{ $message }}
                </div>
              @enderror
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