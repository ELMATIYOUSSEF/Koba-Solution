<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-TU5o5Uj0X0vZmhU6Z4nu6B4j4L26l2Q8dbwWceQHm3q3ebgEY9Zm8fRgefiqlJzIWpmyBhxgGWlOWdzhA5U6Sg==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
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
  
    <main class="bg-light">
        {{-- swiper --}}
        <div class="swiper mySwiper" >
            <div class="swiper-wrapper"id="swiper-color">
              <div class="swiper-slide" id="mySwiper">
                <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center " id="swiper-color">
                    <div class="col-md-5 p-lg-5 mx-auto my-5 text-center" >
                      <img class="mx-auto" src="assets/img/pluie.png" style="width:5rem" alt="">
                      <h1 class="display-4 fw-normal">Koba!</h1>
                      <p class="lead fw-normal">We believe that everyone should have access to clean and safe drinking water, no matter where they live or what their circumstances may be. That's why we've developed a simple and easy-to-use digital solution to help connect people with the water they need</p>
                      <a class="btn btn-outline-secondary" href="#">Coming soon</a>
                    </div>
                    <div class="product-device shadow-sm d-none d-md-block"></div>
                    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
                  </div>
              </div>
              <div class="swiper-slide" id="swiper-color">
                <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center " id="swiper-color">
                    <div class="col-md-5 p-lg-5 mx-auto my-5 text-center" >
                      <h1 class="display-4 fw-normal">Welcome to Our Solution to the Water Problem!                        !</h1>
                      <p class="lead fw-normal">Our website features an interactive map of water sources that are available in your area, along with filters that allow you to find the water that meets your specific needs. We also have a verification and certification process in place to ensure that the water is of the highest quality.</p>
                      <a class="btn btn-outline-secondary" href="#">Sign In</a>
                    </div>
                    <div class="product-device shadow-sm d-none d-md-block"></div>
                    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
                  </div>
              </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>
          {{--  --}}
         
          
<div class="header">

  <!--Content before waves-->
  <div class="inner-header flex">
  <!--Just the logo.. Don't mind this-->
  <svg version="1.1" class="logo" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
  xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" xml:space="preserve">
  <path fill="#FFFFFF" stroke="#000000" stroke-width="10" stroke-miterlimit="10" d="M57,283" />
  
  </svg>
  <h1>"Take Control of Your Water Supply: Find Safe Drinking Water with Ease"</h1>
  </div>
  
  <!--Waves Container-->
  <div>
  <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
  viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
  <defs>
  <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
  </defs>
  <g class="parallax">
  <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
  <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
  <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
  <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
  </g>
  </svg>
  </div>
  <!--Waves end-->
  
  </div>

          {{--  --}}
          <section class="py-4">

            <div class="container">
              <div class="row">
                <div class="col-12">
                  <div class="card mb-3 bg-soft-danger rounded-3">
                    <div class="row g-0 align-items-center">
                      <div class="col-md-5 col-lg-6 text-md-center"><img class="img-fluid" src="assets/img/about.png" alt="" /></div>
                      <div class="col-md-7 col-lg-6 px-md-2 px-xl-6 text-center text-md-start">
                        <div class="card-body px-4 py-5 p-lg-3 p-md-4">
                          <h1 class="mb-4 fw-bold">Find Safe Drinking Water Now <br class="d-md-none d-xxl-block" /> Check the Map or Truck Location</h1>
                          <p class="card-text">we believe that the best long-term solution is to provide access to safe drinking water through our website's interactive map. By utilizing the available water sources in your area, you can reduce the need for truck delivery and ensure that you have a sustainable supply of water</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end of .container-->
          </section>
        

       
        {{-- section Produit  --}}
        <section>
            <div class="col-xxl-8 px-4 py-5">
                <div class="row flex-lg-row align-items-center g-5 py-5">
                    <div class="col-10 col-sm-8 col-lg-6  test" id="imgTruck">
                      <div class="loader rotate"></div>
                      <div class="imgTruck text-center">
                        <img class="rounded"  src="assets/img/truck.jpg" class="d-block mx-lg-auto img-fluid rounded" alt="Water Bottles" style="width:35rem"  loading="lazy"></div>
                    </div>
                    <div class="col-lg-6">
                        <h1 class="display-5 fw-bold lh-1 mb-3">Stay Hydrated with Our Premium Water Selection</h1>
                        <p class="lead">Browse our wide variety of premium quality water and find the perfect fit for your needs. From alkaline water to mineral water, we've got you covered. Order now and enjoy the convenience of having your favorite water brand delivered straight to your doorstep.</p>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                            <a href="/checkoutPage" class="btn btn-primary btn-lg px-4 me-md-2">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

          {{--  --}}

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
  var swiper = new Swiper(".mySwiper", {
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>

  </body>
</html>
