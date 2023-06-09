@include('../dashboard.header')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12 mt-5">
                {{-- <h3 class="page-title mt-3">Welcome   {{ Auth::user()->name }} </h3> --}}
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">FeedBack</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Show All FeedBacks :</li>
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
                        <h3 class="card_widget_header">{{$feedbacks->count()}}</h3>
                        <h6 class="text-muted">feedbacks</h6> </div>
                    <div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#6eed6e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>    
                    </span> </div>
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
                
                    <h4 class="card-title float-left mt-2">All FeedBacks </h4>
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
                                            <th> DateTimeFeedback</th>
                                            <th>TypeFeedback</th>
                                            <th class="text-center">FeedbackMessage</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if($feedbacks->isEmpty())
                                            <div class="col-md-12">
                                                <div class="alert alert-info text-center" role="alert">
                                                    There are no feedbacks available.
                                                </div>
                                            </div>
                                        @else
                                           
                                            @foreach($feedbacks as $feedback)
                                                @php
                                                $count++ ;   
                                                 @endphp
                                                <tr>
                                                    <td class="text-center">{{$count}}</td>
                                                    <td class="text-nowrap">
                                                        {{ $feedback->user_name }}
                                                    </td>
                                                    <td class="text-nowrap">{{$feedback->DateTimeFeedback}}</td>
                                                    <td class="text-nowrap">{{$feedback->TypeFeedback}}</td>
                                                    <td>{{$feedback->FeedbackMessage}}</td>                                                                                         <td>
                                                        
                                                        <a href="javascript:void(0)" onclick="if(confirm('Are You sure to delete this feedbacks?')){document.getElementById('feedback{{$feedback->id}}').submit();} else {return false}" class="">
                                                            <lord-icon
                                                                src="https://cdn.lordicon.com/kfzfxczd.json"
                                                                trigger="hover"
                                                                colors="primary:#911710"
                                                                style="width:40px;height:40px">
                                                            </lord-icon>
                                                        </a>                                                    
                                                        
                                                    </td>
                                                    <form method="POST" action="{{route('feedbacks.destroy',[$feedback->id])}}" id="feedback{{$feedback->id}}">
                                                        @csrf 
                                                        @method('DELETE')
                                                    </form>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                    
                                </table>
                                <div class="d-flex justify-content-center">
                                    {!! $feedbacks->links() !!}
                                </div>
                               
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
     
 @include('../dashboard.footer')