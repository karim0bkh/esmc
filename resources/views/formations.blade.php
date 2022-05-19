@extends('layouts.app')

<style>


    * {
        font-family: "Poppins", sans-serif;
    }
    .fw-medium {
        font-weight: 500;
    }
    .fw-semibold {
        font-weight: 600;
    }
    .fw-bold {
        font-weight: 700;
    }
    .text-black-primary {
        color: #333;
    }
    .text-black-secondary {
        color: #666;
    }
    .scale-up {
        transform: scale(1.2);
    }
    .linear-gradient-body {
        background: grey;
    }
    /* .linear-gradient-body {
      background: linear-gradient(
        287.83deg,
        #8d99ae 32.33%,
        rgba(237, 242, 244, 0) 91.61%
      );
    } */
    .locate-floor {
        right: 0;
        transform: translate(40%, 0%);
    }
    .with-fit-content {
        width: fit-content;
    }
    hr {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
    }


    @media only screen and (max-width: 600px) {
        .scale-down {
            width: 170%;
        }
    }

    @media only screen and (max-width: 768px) {
        .width-100-important {
            width: 100% !important;
        }
        .scale-up {
            transform: scale(1);
        }
    }

    @media only screen and (min-width: 992px) {
        .scale-down {
            width: 200%;
        }
    }

    /* Color Pallete */
    .gunmetal {
        background-color: #000000;
    }
    .cool-grey {
        background-color: #8d99ae;
    }
    .anti-flash-white {
        background-color: #f4efed;
    }
    .medium-candy-apple-red {
        background-color: #d90429;
    }

    .text-gunmetal {
        color: #2b2d42;
    }



</style>


@section('content')
<html>
                <head>
                    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
                </head>
                <body style="background-color: #EDEDED">

                <div class="container">
                    <h1>Nos Formations : </h1>
                    <form method="GET">
                        <div class="row">
                            <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input
                                type="text"
                                name="search"
                                value="{{ request()->get('search') }}"
                                class="form-control"
                                placeholder="Search..."
                                aria-label="Search"
                                aria-describedby="button-addon2">
                            <button class="btn btn-success" type="submit" id="button-addon2">Search</button>
                        </div>
                            </div>
                        </div>
                    </form>


        <?php
//Columns must be a factor of 12 (1,2,3,4,6,12)
$numOfCols = 3;
$rowCount = 0;
$bootstrapColWidth = 12 / $numOfCols;
foreach ($formation as $formations){
  if($rowCount % $numOfCols == 0) { ?> <div class="row"> <?php }
    $rowCount++; ?>

        <div class=" col-md-<?php echo $bootstrapColWidth; ?>">

                            <div  class="card m-3" style="width: 18rem;">
                            <img class="card-img-top" src="imgs/{{$formations->img_name}}" alt="image formation" height="250">
                            <div class="card-body">
                                <h5 class="card-title">{{$formations->name}}</h5>
                                <p class="card-text">{{$formations->desc}}</p>
                            </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Prof : {{$formations->prof}}</li>
                                    <li class="list-group-item">Date : {{$formations->datee}}</li>
                                    <li class="list-group-item">Prix : {{$formations->price}}</li>
                                </ul>
                            <div class="card-body">
                                <a href="{{ route('formations_show', encrypt($formations->id)) }}" class="btn btn-dark">Voir formation</a>
                            </div>
                        </div>
        </div>

<?php
    if($rowCount % $numOfCols == 0) { ?> </div> <?php } } ?>

                <!--
        You can use Tailwind CSS Pagination as like here:
        {!! $formation->withQueryString()->links() !!}
                    -->

                    {!! $formation->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>



                </body>


@endsection
                @section('footer')
                <!-- Footer -->
                <footer class="text-center text-lg-start bg-light text-muted">
                    <!-- Section: Social media -->
                    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                        <!-- Left -->
                        <div class="me-5 d-none d-lg-block">
                            <span>Get connected with us on social networks:</span>
                        </div>
                        <!-- Left -->

                        <!-- Right -->
                        <div>
                            <a href="" class="me-4 text-reset">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="" class="me-4 text-reset">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="" class="me-4 text-reset">
                                <i class="fab fa-google"></i>
                            </a>
                            <a href="" class="me-4 text-reset">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="" class="me-4 text-reset">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a href="" class="me-4 text-reset">
                                <i class="fab fa-github"></i>
                            </a>
                        </div>
                        <!-- Right -->
                    </section>
                    <!-- Section: Social media -->

                    <!-- Section: Links  -->
                    <section class="">
                        <div class="container text-center text-md-start mt-5">
                            <!-- Grid row -->
                            <div class="row mt-3">
                                <!-- Grid column -->
                                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                                    <!-- Content -->
                                    <h6 class="text-uppercase fw-bold mb-4">
                                        <i class="fas fa-gem me-3"></i>ESMC
                                    </h6>
                                    <p>
                                        description de ESMC <br>
                                        description de ESMC <br>
                                        description de ESMC <br>
                                        description de ESMC <br>
                                        description de ESMC
                                    </p>
                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                                    <!-- Links -->
                                    <h6 class="text-uppercase fw-bold mb-4">
                                        Courses
                                    </h6>
                                    <p>
                                        <a href="#!" class="text-reset">Course 1</a>
                                    </p>
                                    <p>
                                        <a href="#!" class="text-reset">Course 2</a>
                                    </p>
                                    <p>
                                        <a href="#!" class="text-reset">Course 3</a>
                                    </p>
                                    <p>
                                        <a href="#!" class="text-reset">Course 4</a>
                                    </p>
                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                                    <!-- Links -->
                                    <h6 class="text-uppercase fw-bold mb-4">
                                        Useful links
                                    </h6>
                                    <p>
                                        <a href="#!" class="text-reset">Pricing</a>
                                    </p>
                                    <p>
                                        <a href="#!" class="text-reset">Settings</a>
                                    </p>
                                    <p>
                                        <a href="#!" class="text-reset">Orders</a>
                                    </p>
                                    <p>
                                        <a href="#!" class="text-reset">Help</a>
                                    </p>
                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                                    <!-- Links -->
                                    <h6 class="text-uppercase fw-bold mb-4">
                                        Contact
                                    </h6>
                                    <p><i class="fas fa-home me-3"></i> Paris, PA 52365, FR</p>
                                    <p>
                                        <i class="fas fa-envelope me-3"></i>
                                        info@esmc.com
                                    </p>
                                    <p><i class="fas fa-phone me-3"></i> + 33 999 999 99</p>
                                    <p><i class="fas fa-print me-3"></i> + 33 999 999 99</p>
                                </div>
                                <!-- Grid column -->
                            </div>
                            <!-- Grid row -->
                        </div>
                    </section>
                    <!-- Section: Links  -->

                    <!-- Copyright -->
                    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                        © 2021 Copyright:
                        <a class="text-reset fw-bold" href="">ESMC</a>
                    </div>
                    <!-- Copyright -->
                </footer>
                <!-- Footer -->

</html>
@endsection
