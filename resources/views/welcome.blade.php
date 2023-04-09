<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Home Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
  </head>
  <body>

  <nav class="navbar navbar-expand-lg p-3 bg-dark text-white w-100">
    <div class="container-fluid d-flex d-flex justify-content-between align-items-center">
        <div>
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <span class="navbar-brand" style="color: black" href="?"><img style="width :5rem" src="assets/img/logo.png" alt="logo"></span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="" role="button" ><i class="fa fa-bars" aria-hidden="true" style="color:#e6e6ff"></i></span>
            </button>
        </div>

        <div class="d-flex " id="navbarSupportedContent">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mx-5 mb-md-0">
                    <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">About</a></li>
                </ul>
               <div class="d-flex flex-row flex-wrap justify-content-center align-items-center">
                <div class="btn-group">
                    <button class="btn btn-light btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Welcome {{Auth::user()->name}}
                    </button>
                    <ul class="dropdown-menu">
                    @guest
                      <li><a type="button" class="dropdown-item">Login</a></li>
                      <li><a type="button" class="dropdown-item">Sign-up</a></li>
                    @endguest
                    @auth
                      <li><a type="button" class="dropdown-item">Dashboard</a></li>
                      <li><a type="button" class="dropdown-item">My Profil</a></li>
                      <li><a type="button" class="dropdown-item">Log out</a></li>
                    @endauth
                    </ul>
                  </div>
                </div>
        </div>
      </div>
  </nav>
  
    <main class="bg-light">
      <div class="container py-5">
        <div class="row">
          <div class="col-lg-8">
            <h2 class="font-weight-bold">Welcome to My Website!</h2>
            <p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elementum mi augue, vitae vestibulum enim tristique eget. Phasellus vitae augue diam. Sed malesuada nibh vitae magna laoreet, ac suscipit tellus fringilla. Vestibulum eget tortor sit amet tellus faucibus dapibus id ac ex.</p>
          </div>
        </div>
      </div>
    </main>
    <footer class="bg-white shadow">
      <div class="container py-3">
        <p class="text-center text-secondary">Copyright &copy; 2023 My Website</p>
      </div>
    </footer>
 
      
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-HaL+6boT1dN80Kj+2nxDEpvTcH6uYSJ6n1Yn6iE9cljKkjqwV8n9zzgNlsZPdj7E" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
