<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Home Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-TU5o5Uj0X0vZmhU6Z4nu6B4j4L26l2Q8dbwWceQHm3q3ebgEY9Zm8fRgefiqlJzIWpmyBhxgGWlOWdzhA5U6Sg==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
  </head>
  <body>
    
    <header class="edu-header disable-transparent bg-dark header-sticky  ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xl-2 col-md-6 col-6">
                    <div class="logo">
                        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                            <span class="navbar-brand" style="color: black" href="?"><img style="width :5rem" src="assets/img/logo.png" alt="logo"></span>
                        </a>
                </div>
            </div>
            <div class="col-lg-8 d-none d-xl-block">
                <nav class=" d-none d-lg-block">
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mx-5 mb-md-0">
                        <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">About</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-6 col-xl-2 col-md-6 col-6">
                <div class="header-right d-flex justify-content-end">
                    <div class="header-quote">
                        <div class="d-flex flex-row flex-wrap justify-content-center align-items-center">
                            <div class="btn-group">
                                <button class="btn btn-primary rounded dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    @auth
                                  Welcome {{Auth::user()->name}}
                                  @endauth
                                  @guest
                                  Get Started
                                  @endguest
                                </button>
                                <ul class="dropdown-menu">
                                @guest
                                  <li><a type="button" href="{{ route('login') }}" class="dropdown-item">Login</a></li>
                                  <li><a type="button" class="dropdown-item">Sign-up</a></li>
                                @endguest
                                @auth
                                @role('admin')
                                    <li><a type="button" href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a></li>
                                @endrole
                                <li><a type="button" href="#" class="dropdown-item">My Profile</a></li>
                                <li><a type="button" href="#" class="dropdown-item">Log out</a></li>
                                @endauth                            
                                </ul>
                              </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
  
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
              <div class="swiper-slide" id="mySwiper">
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

          <div class=" col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
              <div class="col-10 col-sm-8 col-lg-6">
                <img src="assets/img/map-and-navigation.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
              </div>
              <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">Find Safe Drinking Water Now - Check the Map or Truck Location</h1>
                <p class="lead">we believe that the best long-term solution is to provide access to safe drinking water through our website's interactive map. By utilizing the available water sources in your area, you can reduce the need for truck delivery and ensure that you have a sustainable supply of water</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                  <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Find Water Now!</button>
                </div>
              </div>
            </div>
          </div>
          {{--  --}}

          <div class="bg-dark px-4 py-5" id="featured-3">
            <h2 class="pb-2 border-bottom text-white">"Experience the Best of Morocco with Our Premium Services"
            </h2>
            <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
              <div class="feature col">
                <div class="feature-icon">
                    <i class="bi bi-people" style="width:1em "></i>
                </div>
                <h2 class="text-white">Product Quality</h2>
                <p class="text-white">Our goal is to satisfy the customer, and you can check the product before payment.</p>
                <a href="#" class="icon-link  text-white btn btn-primary">
                    Read More
                  <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"/></svg>
                </a>
              </div>
              <div class="feature col">
                <div class="feature-icon">
                    <i class="bi bi-person-check"></i>
                </div>
                <h2 class="text-white">Free Delivery</h2>
                <p class="text-white">Fast and free delivery all over Morocco.</p>
                <a href="#" class="icon-link text-white btn btn-primary">
                    Read More
                  <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"/></svg>
                </a>
              </div>
              <div class="feature col">
                <div class="feature-icon">
                    <i class="bi bi-person-fill"></i>
                </div>
                <h2 class="text-white">Customer Service</h2>
                <p class="text-white">Our goal is always to satisfy the customer. If you encounter any problems, please do not hesitate to contact us.</p>
                <a href="#" class="icon-link text-white btn btn-primary">
                    Read More
                  <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"/></svg>
                </a>
              </div>
            </div>
          </div>

        {{-- section Produit  --}}
        <section>
            <div class="col-xxl-8 px-4 py-5">
                <div class="row flex-lg-row align-items-center g-5 py-5">
                    <div class="col-10 col-sm-8 col-lg-6">
                        <img src="assets/img/truck.jpg" class="d-block mx-lg-auto img-fluid rounded" alt="Water Bottles" width="700" height="500" loading="lazy">
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
