<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@xz/fonts@1/serve/hk-grotesk.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="http://127.0.0.1:3001/css/home.css" />
    <title>Home</title>
</head>

<body>
    <header>
        <!--Navbar-->
        <nav class="navbar navbar-light navbar-1 white">

            <!-- Navbar brand -->
            <a class="navbar-brand" href="#">Navbar</a>

            <!-- Collapse button -->
            <button class="navbar-toggler" type="button"data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent15" aria-controls="navbarToggleExternalContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span></button>

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent15">

                <!-- Links -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Service</a>
                    </li>
                </ul>
                <!-- Links -->

            </div>
            <!-- Collapsible content -->

        </nav>
        <!--/.Navbar-->



        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @for ($i = 0; $i < 3; $i++)
                    <li data-target="#myCarousel" data-slide-to="{{ $i }}"
                        class={{ $i == 0 ? 'active' : '' }}></li>
                    <button type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}"
                        aria-current="true"></button>
                @endfor
            </div>
            <div class="carousel-inner">
                @for ($i = 0; $i < 3; $i++)
                    <div class="carousel-item {{ $i == 0 ? 'active' : '' }} fill">
                        <div class="container">
                            <div class="carousel-caption text-start">
                                <h1 class="text-left">28 MILLION COMMUNITY</h1>
                                <p><a class="btn btn-lg btn-light" href="#">Get Started</a></p>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            <button class="carousel-control-prev btn btn-link" type="button"
                data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next btn btn-link" type="button"
                data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </header>

    <div class="row">
        <div class="col  ">
            <div>
                <p class="padding">
                    Lorem ipsum dolor sit amet.consectetur adipiscing elit.Aliquam eget sapien sapien. Curabitur in
                    metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum velit. Nam
                    purus nibh, lacinia non faucibus et, pharetra in dolor. Sed iaculis posuere diam ut cursus.
                    Morbi
                    commodo sodales nisi id sodales. Proin consectetur, nisi id commodo imperdiet, metus nunc
                    consequat
                    lectus, id bibendum diam velit et dui. Proin massa magna, vulputate nec bibendum nec, posuere
                    nec
                    lacus. Aliquam mi erat, aliquam vel luctus eu, pharetra quis elit. Nulla euismod ultrices massa,
                    et
                    feugiat ipsum consequat eu.
            </div>

        </div>
    </div>

    <div class="row gx-5">
        <div class="col">
            <div class="p-3">
                <h5>
                    Products
                </h5>
                <h6 class="text-danger">
                    Lorem ipsum dolor sit amet
                </h6>
            </div>
        </div>
        <div class="col">
            <div class="p-3 text-end">
                <button class="btn btn-light border border-danger text-danger " type="button">See more</button>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-sm-4 pb-2">
                <div class="card bg-danger text-white">
                    <img src="{{ $product['image'] }}" class="card-img" alt="...">
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                        <h5 class="card-text">{{ $product['title'] }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <h1 class="text-center text-dark fw-bold fst-italic">WHAT MAKE US DIFFERENT</h1>

    <div id="carouselAboutUS" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @for ($i = 0; $i < 3; $i++)
                <li data-target="#myCarousel" data-slide-to="{{ $i }}" class={{ $i == 0 ? 'active' : '' }}>
                </li>
                <button type="button" data-bs-target="#carouselAboutUS" data-bs-slide-to="{{ $i }}"
                    class="{{ $i == 0 ? 'active' : '' }}" aria-current="true"></button>
            @endfor
        </div>
        <div class="carousel-inner">
            @for ($i = 0; $i < 3; $i++)
                <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                    <div class="row align-items-center">
                        <div class="col  fill-2">
                            <div class="overlay">
                                <h2 class="text-left text-light">28 MILLION COMMUNITY</h2>
                            </div>

                        </div>
                        <div class="col">
                            <p class=""> Lorem ipsum dolor sit amet.consectetur adipiscing elit.Aliquam eget
                                sapien sapien. Curabitur in
                                metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum
                                velit. Nam
                                purus nibh, lacinia non faucibus et, pharetra in dolor. Sed iaculis posuere diam ut
                                cursus.
                                Morbi</p>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <button class="carousel-control-prev btn btn-link" type="button" data-bs-target="#carouselAboutUS"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next btn btn-link" type="button" data-bs-target="#carouselAboutUS"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <div class="row gx-5">
        <div class="col">
            <div class="p-3">
                <h5>
                    Services
                </h5>
                <h6 class="text-danger">
                    Lorem ipsum dolor sit amet
                </h6>
            </div>
        </div>
        <div class="col">
            <div class="p-3 text-end">
                <button class="btn btn-light border border-danger text-danger " type="button">See more</button>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach ($services as $service)
            <div class="col-sm-4 pb-2">
                <div class="card bg-danger text-black">
                    <img src="{{ $service['image'] }}" class="card-img" alt="...">
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                        <h5 class="card-text ">{{ $service['title'] }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>





    <div class="d-flex justify-content-center italic">
        <h3>LET'S CREATE CREATIVE PROJECT</h3>
    </div>
    <div class="d-grid gap-2 col-6 mx-auto text-center">
        <button class="btn btn-light border border-danger text-danger " type="button">GET STRATED</button>
    </div>




    <!-- Footer -->
    <footer class="text-center text-lg-start bg-white text-muted">

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3 text-secondary"></i>Company name
                        </h6>
                        <p>
                            Lorem ipsum dolor sit amet.consectetur adipiscing elit.Aliquam .
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Products
                        </h6>
                        @foreach (array_slice($products, 0, 3) as $product)
                            <p>
                                <a class="text-reset">{{ $product['title'] }}</a>
                            </p>
                        @endforeach
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Service
                        </h6>
                        @foreach (array_slice($services, 0, 3) as $service)
                            <p>
                                <a class="text-reset">{{ $service['title'] }}</a>
                            </p>
                        @endforeach
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3 text-secondary"></i> Jakarta, Indonesia</p>
                        <p>
                            <i class="fas fa-envelope me-3 text-secondary"></i>
                            blabla@gmail.com
                        </p>
                        <p><i class="fas fa-phone me-3 text-secondary"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print me-3 text-secondary"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

    </footer>
</body>

</html>
