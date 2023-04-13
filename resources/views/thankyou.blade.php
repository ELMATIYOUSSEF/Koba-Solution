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
  </head>
  <body>
    
   

<div class="mainscreen">
      <div class="card">
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
           @endif
           <div class=" text-center">
            <h1 class="display-3">Thank You!</h1>
            <p class="lead"><strong>Please check your email</strong> for further instructions on how to complete your account setup.</p>
            <hr>
            <p>
              Having trouble? <a href="#">Contact us</a>
            </p>
            <p class="lead">
              <a class="btn btn-primary btn-sm" href="#" role="button">Continue to homepage</a>
            </p>
          </div>
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
        const capacityinput = document.getElementById('capacityinput');
        const nameinput = document.getElementById('nameinput');
        selectElement.addEventListener('change', function(event) {
          const selectedOption = event.target.selectedOptions[0];
          const selectedCamionCapacity = selectedOption.dataset.capacity;
          const selectedCamionname = selectedOption.dataset.name;
          capacityInfoElement.textContent = `Camion Capacity: ${selectedCamionCapacity}`;
          capacityinput.value =selectedCamionCapacity ;
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