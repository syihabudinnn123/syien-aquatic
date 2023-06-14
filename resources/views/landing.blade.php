<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Syien Aquatic</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

        
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset("css/style.css")}}" rel="stylesheet" />
        
    </head>
    <body style="background-image: url('{{asset('css/bg.jpg')}}');">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Syien Aquatic</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link active" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($categories as $category)
                                    <li><a class="dropdown-item" href="{{ route('landing', ['category' => $category->name]) }}">{{ $category->name }}</a></li>
                                @endforeach
                                <li><a class="dropdown-item" href="{{ route('landing') }}">All</a></li>

                            </ul>
                        
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-light active bg-secondary text-white" type="submit">
                            <i class="bi-cart-fill me-1 text-white"></i>
                            Cart
                            <span class="badge bg-black text-white ms-1 rounded-pill">0</span>
                        </button>
                        @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-light text-white ms-1 active bg-secondary">
                            <i class="bi-person-fill me-1 text-white"></i>
                            Dashboard
                        </a>
                    @endauth

                    @guest
                        <a href="{{ route('login') }}" class="btn text-white btn-outline-light ms-1 bg-secondary active">
                            <i class="bi-person-fill me-1 text-white"></i>
                            Login
                        </a>
                    @endguest
                    </form>
                </div>
            </div>
        </nav>
        <!-- Carousels -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($sliders as $slider)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->iteration - 1 }}" class="{{ $loop->first ? 'active' : '' }}"
                    aria-current="{{ $loop->first ? 'true' : '' }}" aria-label="Slide 1"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($sliders as $slider)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="3000">
                    <img src="{{ asset('storage/slider/' . $slider->image) }}" class="d-block w-100" alt="{{ $slider->image }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $slider->title }}</h5>
                        <p>{{ $slider->caption }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Section-->
      <section class="py-5">
        <div class="container px-4 px-lg-5" style="margin-top: -80px;">
            <form action="{{ route('landing') }}" method="GET">
                    @csrf
                    <div class="row g-3 my-5" style="margin-top: -40px;">
                        <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="Min" name="min" value="{{ old('min') }}">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="Max" name="max" value={{ old('max') }}>
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary">Terapkan</button>
                        </div>
                    </div>
                </form>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                @forelse ($products as $product)
                    <div class="col mb-5">
                        <div class="card h-100">
                            @if ($product['sale_price'] != 0)
                                <!-- Sale badge-->
                                <div class="badge bg-success text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            @endif

                            <!-- Product image-->
                            <img class="card-img-top" src="{{ asset('storage/product/' . $product->image) }}" alt="{{ $product->name }}" style="overflow: hidden;" />

                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <a href="{{ route('product.show', ['id' => $product->id]) }}" style="text-decoration: none" class="text-dark">
                                    <small class="text-strong">{{ $product->category->name }}</small>
                                        <h5 class="fw-bolder">{{ $product->name }}</h5>
                                    </a>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        @for ($i = 0; $i < $product->rating; $i++)
                                            <div class="bi-star-fill"></div>
                                        @endfor
                                    </div>
                                    <!-- Product price-->
                                    @if ($product['sale_price'] != 0)
                                        <span class="text-muted text-decoration-line-through">Rp.{{ number_format($product->price, 0) }}</span>
                                        Rp.{{ number_format($product->sale_price, 0) }}
                                    @else
                                        Rp.{{ number_format($product->price, 0) }}
                                    @endif
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-secondary w-100 text-center" role="alert">
                        <h4>Produk belum tersedia</h4>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
        <!-- Section-->
        
        <!-- Footer-->
      
  <!-- Footer -->
  <footer
          class="text-center text-lg-start text-white"
          style="background-color: #929fba"
          >
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Links -->
      <section class="">
        <!--Grid row-->
        <div class="row">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">
              Syien Aquatic
            </h6>
            <p>
              Syien Aquatic merupakan toko online berbasis web yang menyediakan berbagai jenis ikan, peralatan aquascape, bonsai dan aksesoris aquascape lainnya. Silahkan ceckout produk kami dan dapatkan diskonnya sekarang juga.
            </p>
          </div>
          <!-- Grid column -->

          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
            @foreach ( $products->take(5) as $prod)    
            <p>
              <a class="text-white" href="{{ route('landing', ['products' => $prod->name])}}">{{ $prod->name}}</a>
            </p>
            @endforeach
          </div>
          <!-- Grid column -->

          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <hr class="w-100 clearfix d-md-none" />

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
            <p><i class="fas fa-home mr-3"></i> Kudus, Jawa Tengah, Indonesia</p>
            <p><i class="fas fa-envelope mr-3"></i> syihabudinnn@gmail.com</p>
            <p><i class="fas fa-phone mr-3"></i> +62 89504522619</p>
            <p><i class="fas fa-phone mr-3"></i> +62 89504522619</p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>

            <!-- Facebook -->
            <a
               class="btn btn-primary btn-floating m-1"
               style="background-color: #3b5998"
               href="https://www.facebook.com/syihabudin.qudusiy"
               role="button"
               ><i class="fab fa-facebook-f"></i
              ></a>

            <!-- Twitter -->
            <a
               class="btn btn-primary btn-floating m-1"
               style="background-color: #55acee"
               href="https://twitter.com/syihabudinnn_"
               role="button"
               ><i class="fab fa-twitter"></i
              ></a>

            <!-- Google -->
            <a
               class="btn btn-primary btn-floating m-1"
               style="background-color: #dd4b39"
               href="https://www.facebook.com/syihabudin.qudusiy"
               role="button"
               ><i class="fab fa-google"></i
              ></a>

            <!-- Instagram -->
            <a
               class="btn btn-primary btn-floating m-1"
               style="background-color: #ac2bac"
               href="https://www.instagram.com/syihabudin.nafi/"
               role="button"
               ><i class="fab fa-instagram"></i
              ></a>

            <!-- Linkedin -->
            <a
               class="btn btn-primary btn-floating m-1"
               style="background-color: #0082ca"
               href="https://www.linkedin.com/in/syihabudin-nafi-805800193/"
               role="button"
               ><i class="fab fa-linkedin-in"></i
              ></a>
            <!-- Github -->
            <a
               class="btn btn-primary btn-floating m-1"
               style="background-color: #333333"
               href="https://github.com/syihabudinnn123"
               role="button"
               ><i class="fab fa-github"></i
              ></a>
          </div>
        </div>
        <!--Grid row-->
      </section>
      <!-- Section: Links -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div
         class="text-center p-3"
         style="background-color: rgba(0, 0, 0, 0.2)"
         >
      © 2020 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/"
         >Syien Aquatic</a
        >
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</div>
<!-- End of .container -->
         <!-- Bootstrap core JS-->
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
