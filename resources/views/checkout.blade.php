<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout Page </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-TU5o5Uj0X0vZmhU6Z4nu6B4j4L26l2Q8dbwWceQHm3q3ebgEY9Zm8fRgefiqlJzIWpmyBhxgGWlOWdzhA5U6Sg==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
  </head>
  <body>
      
    <nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fourth navbar example">
      <div class="container-fluid">
        <a class="navbar-brand" href="/"><img style="width :5rem" src="assets/img/logo.png" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse d-lg-flex justify-content-lg-between align-items-center " id="navbarsExample04">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a  href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
            </li>
            <li class="nav-item">
              <a  href="/checkoutPage" class="nav-link {{ request()->is('checkout') ? 'active' : '' }}">Checkout</a>
            </li>
            <li class="nav-item">
              <a href="/contact" class="nav-link  {{ request()->is('contact') ? 'active' : '' }}">Contact</a>
            </li>
            <li class="nav-item">
              <a href="/feedbacks"  class="nav-link  {{ request()->is('feedbacks') ? 'active' : '' }}">FeedBacks</a>
            </li>
            
          </ul>
      <ul class="nav">
          @guest
          <li><a type="button" href="{{ route('login') }}" class="btn btn-outline-primary text-white">Login</a></li>
          <li><a type="button" href="{{ route('register') }}" class="btn btn-warning">Sign-up</a></li>
          @endguest
          @auth
          @role('admin')
              <li><a type="button" href="{{ route('dashboard') }}" class="nav-item">Dashboard</a></li>
          @endrole
          @role('driver')
              <li><a type="button" href="/Mycamion" class="nav-item">Dashboard</a></li>
          @endrole
          <li><a type="button" href="{{ route('profile.show') }}" class="nav-item">My Profile</a></li>
          <li>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger" type="submit">Logout</button>
        </form></li>
          @endauth            
      </ul>
        </div>
      </div>
    </nav>
  

<div class="mainscreen p-5">
      <div class="card p-3">
        <div class="leftside">
          <img
            src="assets/img/water.png"
            class="product"
            alt="Shoes"
          />
        </div>
        <div class="rightside">
         
          @includeWhen($errors->any(),'../_errors')
          @if (session('success'))
          <div id="flash-success" class="flash-success">
              {{ session('success') }}
          </div>
              <script>
                removeAlert(); 
              </script>
           @endif
          @if (session('error'))
          <div class="flash-error">
              {{ session('error') }}
          </div>
              {{-- <script>
                removeAlert(); 
              </script> --}}
           @endif
          <form action="{{route('orders.store')}}" method="POST">
            @csrf 
            <h1>CheckOut</h1>
            <h2>Payment Information</h2>
            @php
            $ldate = date('Y-m-d H:i:s');
            @endphp
           
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Date Time :</label>
                <input type="text" name="DateTimeOrder" class="form-control" value="{{$ldate}}" disabled id="exampleFormControlInput1" >
              </div>
              <input type="hidden" name="idcamion" id="idcamioninput">
              <input type="hidden" name="NameDriver" id="nameinput">
              @if(isset($camions))
              <div class="form-group">
                <label for="exampleFormControlSelect1">Driver Name :</label>
                <select class="form-control @error('idcamionType') error-border @enderror" name="idcamionType" id="exampleFormControlSelect1" >
                  <option selected disabled>Choose...</option>
                  @foreach($camions as $camion)
                  <option value={{$camion->IdcamionType}} data-name="{{$camion->name}}" data-tamonit="{{$camion->cmId}}" data-capacity="{{$camion->Capacity_disponible}}">{{$camion->name}}</option>
                  @endforeach
                </select>
                @error('idcamionType')
                <div class="error">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <p id="capacity-info">Camion Capacity: </p>
            @endif

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Quantity Water (L) :</label>
                <input type="number" min="100" class="form-control" name="quantityWater" id="exampleFormControlInput1" placeholder="Quantity">
              </div>
             
            

              <label for="location" class="form-label">Your Location :</label> 
              <div class="input-group mb-3">
                
                <input type="text" class="form-control" id="location" name="location" placeholder="Your Location " aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-primary"  type="button" id="button-addon2">add address </button>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="pending" checked disabled name="StatusOrder" id="inlineRadio2" >
                <label class="form-check-label" for="inlineRadio2">Satatus Order (Pending)</label>
              </div>
            <p></p>
            <button type="submit" class="button">ORDER NOW</button>
          </form>
        </div>
      </div>
    </div>
    <div class="footer ">
                <div class="row">
                   <div class="col-md-4">
                       <div class="full">
                          <div class="logo_footer text-center" style="font-family: 'Southernsky', sans-serif">
                            <a style="color:rgb(255, 255, 255); font-size:2rem"  href="#">Koba</a>
                          </div>
                          <div class="information_f text-left pl-4">
                            <p>Find safe drinking water easily and quickly with our digital solution. Use our interactive map to locate available water sources in your area or check the current location and estimated arrival time of the water truck. Don't wait for water - take control of your water supply with just a few clicks!</p>
                          </div>
                       </div>
                   </div>
                   <div class="col-md-8">
                      <div class="row">
                      <div class="col-md-7">
                         <div class="row">
                            <div class="col-md-6">
                         <div class="widget_menu">
                            <h3>Menu</h3>
                            <ul class="nav flex-column">
                                <li class="nav-item"><a class="nav-link widget_menu_link " href="#">Home</a></li>
                                <li class="nav-item"><a class="nav-link widget_menu_link " href="#">About</a></li>
                                <li class="nav-item"><a class="nav-link widget_menu_link " href="#">Services</a></li>
                                <li class="nav-item"><a class="nav-link widget_menu_link " href="#">Contact</a></li>
                            </ul>
                         </div>
                      </div>
                      <div class="col-md-6">
                         <div class="widget_menu">
                            <h3>Account</h3>
                            <ul class="nav flex-column">
                               <li class="nav-item"><a class="nav-link widget_menu_link " href="#">Account</a></li>
                               <li class="nav-item"><a class="nav-link widget_menu_link " href="#">Login</a></li>
                               <li class="nav-item"><a class="nav-link widget_menu_link " href="#">Register</a></li>
                            </ul>
                         </div>
                      </div>
                         </div>
                      </div>     
                      <div class="col-md-5">
                         <div class="widget_menu">
                            <h3>Social media links</h3>
                            <div class="footer_social d-flex flex-column mb-3 ">
                              <p class="text-white">Don't forget to check our social media.</p>
                              <span>
                              <a href=""><i class="bi bi-instagram"></i></a>  
                                <a href=""><i class="bi bi-whatsapp"></i></a>
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                                <a href=""><i class="bi bi-google"></i></a>
                              </span>
                            </div>
                            <div>
                               <h5 class="text-white" style="font-size: 20px">www.koba.com</h5>
                            </div>
                         </div>
                      </div>
                      </div>
                   </div>
                </div>
             </div>
              
    
        </main>
    
    
        {{-- footer --}}
        <footer class="bg-white shadow">
            <div class="container py-3">
              <p class="text-center text-secondary">Copyright &copy; 2023 koba !</p>
            </div>
        </footer>
     
          
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-HaL+6boT1dN80Kj+2nxDEpvTcH6uYSJ6n1Yn6iE9cljKkjqwV8n9zzgNlsZPdj7E" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    
    <!-- Initialize Swiper -->
    <script>
       const selectElement = document.getElementById('exampleFormControlSelect1');
        const capacityInfoElement = document.getElementById('capacity-info');
        const idcamioninput = document.getElementById('idcamioninput');
        const nameinput = document.getElementById('nameinput');
        selectElement.addEventListener('change', function(event) {
          const selectedOption = event.target.selectedOptions[0];
          const selectedCamionCapacity = selectedOption.dataset.capacity;
          const selectedCamionid = selectedOption.dataset.tamonit;
          const selectedCamionname = selectedOption.dataset.name;
          capacityInfoElement.textContent = `Camion Capacity: ${selectedCamionCapacity}`;
          idcamioninput.value =selectedCamionid ;
          nameinput.value =selectedCamionname ;
        });
      var swiper = new Swiper(".mySwiper", {
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>
    <script src="assets/js/main.js"></script>
      </body>
</html>