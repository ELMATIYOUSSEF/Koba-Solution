@include('../dashboard.header')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12 mt-5">
                {{-- <h3 class="page-title mt-3">Welcome   {{ Auth::user()->name }} </h3> --}}
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Camions</a></li>
                      <li class="breadcrumb-item active" aria-current="page">MY Camions :</li>
                    </ol>
                  </nav>
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
                
                    <h4 class="card-title float-left mt-2">My camions </h4>
                    <button type="button" class="btn btn-primary  float-right veiwbutton" onclick="Remplire({{$camions->id}})" >Remplissez le camion</button>
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
                                            <th>Driver ID</th>
                                            <th class="text-center"> Camion Location</th>
                                            <th class="text-center">Capacity disponible (tonne)</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td class="text-center">{{$count}}</td>
                                            <td >
                                                {{ $camions->idDriver }}
                                            </td>
                                            <td class="text-center">{{$camions->Camion_location }}</td>
                                            <td id="Capacitydisponible" class="text-center">{{$camions->Capacity_disponible}}</td>
                                                <td class="text-center" >
                                                    <div class="custom-control custom-switch SWITCH " onclick="SWITCH({{$camions->id}})" >
                                                        <input type="checkbox" class="custom-control-input camions-switch"  id="customSwitches{{$camions->id}}" 
                                                            @if ($camions->Camion_status == 'available') 
                                                                checked 
                                                            @endif >
                                                        <label class="custom-control-label" for="customSwitches{{$camions->id}}"></label>
                                                    </div>
                                                </td>                                                                                                   
                                                
                                        </tr>
                                        
                                           
                                        
                                            
                                    </tbody>
                                    
                                </table>
                               
                            </div>
                           
                        </div>
                    </div>
                </div>
               
                
            </div>
     

 @include('../dashboard.footer')