@include('../dashboard.header')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12 mt-5">
                {{-- <h3 class="page-title mt-3">Welcome   {{ Auth::user()->name }} </h3> --}}
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">order</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Show All orders :</li>
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
                        <h3 class="card_widget_header">{{$orders->count()}}</h3>
                        <h6 class="text-muted">orders</h6> </div>
                    <div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#6eed6e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><circle cx="8" cy="21" r="2"></circle><circle cx="20" cy="21" r="2"></circle><path d="M5.67 6H23l-1.68 8.39a2 2 0 0 1-2 1.61H8.75a2 2 0 0 1-2-1.74L5.23 2.74A2 2 0 0 0 3.25 1H1"></path></svg>                   </span> </div>
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
                
                    <h4 class="card-title float-left mt-2">All orders </h4>
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
                                            <th>Customer Name</th>
                                            <th> Date Order</th>
                                            <th>Quantity</th>
                                            <th>Location</th>
                                            <th>StatusOrder</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if($orders->isEmpty())
                                            <div class="col-md-12">
                                                <div class="alert alert-info text-center" role="alert">
                                                    There are no orders available.
                                                </div>
                                            </div>
                                        @else
                                           
                                            @foreach($orders as $order)
                                                @php
                                                $count++ ;   
                                                 @endphp
                                                <tr>
                                                    <td class="text-center">{{$count}}</td>
                                                    <td class="text-nowrap">
                                                        {{ $order->user->name }}
                                                    </td>
                                                    <td class="text-nowrap">{{$order->DateTimeOrder}}</td>
                                                    <td class="text-nowrap">{{$order->quantityWater}}</td>
                                                    <td class="text-nowrap">{{$order->location}}</td>
                                                    <td>
                                                           <button type="button" class="btn btn-info change" onclick="changeStatusOrder({{$order->id}},'{{$order->StatusOrder}}')" data-toggle="modal" data-target="#editRoleModal">{{ strtoupper($order->StatusOrder) }}</button> 
                                                    </td>                                                                                   
                                                       <td class="text-center">
                                                        <a href="javascript:void(0)" onclick="if(confirm('Are You sure to delete this orders?')){document.getElementById('order{{$order->id}}').submit();} else {return false}" class="">
                                                            <lord-icon
                                                                src="https://cdn.lordicon.com/kfzfxczd.json"
                                                                trigger="hover"
                                                                colors="primary:#911710"
                                                                style="width:40px;height:40px">
                                                            </lord-icon>
                                                        </a>                                                    
                                                        
                                                    </td>
                                                    <form method="POST" action="{{route('orders.destroy',[$order->id])}}" id="order{{$order->id}}">
                                                        @csrf 
                                                        @method('DELETE')
                                                    </form>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                    
                                </table>
                                <div class="d-flex justify-content-center">
                                    {!! $orders->links() !!}
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
                      <h5 class="modal-title" id="exampleModalLabel">Change Status Order</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body text-center">
                      <form method="POST" action="{{route('changeSatatusOrder') }}">
                        {{ csrf_field() }}
                        @method('POST')
                        <input type="hidden" name="orderId" id="orderId" value="">
                        <label for="changeRole">Select Status</label> <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"  name="status" id="pendingRadio" value="pending">
                            <label class="form-check-label" for="inlineRadio1">pending</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"  name="status" id="progressRadio" value="in progress">
                            <label class="form-check-label" for="inlineRadio2">in progress</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"  name="status" id="deliveredRadio" value="delivered">
                            <label class="form-check-label" for="inlineRadio3">delivered</label>
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