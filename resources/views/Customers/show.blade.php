@include('../dashboard.header')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12 mt-5">
                {{-- <h3 class="page-title mt-3">Welcome   {{ Auth::user()->name }} </h3> --}}
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Customer</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Show All Customers :</li>
                    </ol>
                  </nav>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card board1 fill">
            <div class="card-body">
                <div class="dash-widget-header">
                    <div>
                        <h3 class="card_widget_header">{{$Customers->count()}}</h3>
                        <h6 class="text-muted">Customers</h6> </div>
                    <div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="#6eed6e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="8.5" cy="7" r="4"></circle>
                            <line x1="20" y1="8" x2="20" y2="14"></line>
                            <line x1="23" y1="11" x2="17" y2="11"></line>
                            </svg>                    </span> </div>
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
                
                    <h4 class="card-title float-left mt-2">All Customers </h4>
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
                                            <th>user Name</th>
                                            <th> email</th>
                                            <th>Role</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if($Customers->isEmpty())
                                            <div class="col-md-12">
                                                <div class="alert alert-info text-center" role="alert">
                                                    There are no Customers available.
                                                </div>
                                            </div>
                                        @else
                                           
                                            @foreach($Customers as $Customer)
                                                @php
                                                $count++ ;   
                                                 @endphp
                                                <tr>
                                                    <td class="text-center">{{$count}}</td>
                                                    <td class="text-nowrap">
                                                        {{ $Customer->name }}
                                                    </td>
                                                    <td class="text-nowrap">{{$Customer->email}}</td>
                                                    <td>
                                                        @foreach ($Customer->roles as $role)
                                                        {{-- <button type="button" class="btn btn-primary" data-whatever="@getbootstrap">Admin @getbootstrap</button> --}}
                                                           <button type="button" class="btn btn-info change" onclick="changeRole({{$Customer->id}},'{{$role->name}}')" data-toggle="modal" data-target="#editRoleModal">{{ strtoupper($role->name) }}</button> 
                                                            @if (!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    </td>                                                                                   
                                                       <td class="text-center">
                                                        <a href="javascript:void(0)" onclick="if(confirm('Are You sure to delete this Customers?')){document.getElementById('Customer{{$Customer->id}}').submit();} else {return false}" class="">
                                                            <lord-icon
                                                                src="https://cdn.lordicon.com/kfzfxczd.json"
                                                                trigger="hover"
                                                                colors="primary:#911710"
                                                                style="width:40px;height:40px">
                                                            </lord-icon>
                                                        </a>                                                    
                                                        
                                                    </td>
                                                    <form method="POST" action="{{route('Customers.destroy',[$Customer->id])}}" id="Customer{{$Customer->id}}">
                                                        @csrf 
                                                        @method('DELETE')
                                                    </form>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                    
                                </table>
                                <div class="d-flex justify-content-center">
                                    {!! $Customers->links() !!}
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
                      <h5 class="modal-title" id="exampleModalLabel">Change Role</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body text-center">
                      <form method="POST" action="{{route('changeRole') }}">
                        {{ csrf_field() }}
                        @method('POST')
                        <input type="hidden" name="userId" id="userId" value="">
                        <label for="changeRole">Select Role</label> <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"  name="role_ids" id="adminRadio" value="3">
                            <label class="form-check-label" for="inlineRadio1">Admin</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"  name="role_ids" id="clinetRadio" value="1">
                            <label class="form-check-label" for="inlineRadio2">CLinet</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"  name="role_ids" id="driverRadio" value="2">
                            <label class="form-check-label" for="inlineRadio3">Driver</label>
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