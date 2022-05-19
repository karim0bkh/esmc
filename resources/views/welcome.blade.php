@extends('layouts.app')


@section('content')
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









<body style="background-color: #EDEDED">
<!-- NAVBAR SECTION -->

<!-- HERO SECTION -->
<div class="container-fluid position-relative overflow-hidden mb-4 mb-sm-0" style="min-height: 95vh;">

    <div class="container mt-xl-5 mt-lg-5">
        <div class="row pt-xl-0 pt-lg-2 d-sm-flex flex-column-reverse flex-lg-row text-center text-md-start">
            <div class="col-xl-6 col-lg-7 pt-xl-2 mt-xl-5 mt-lg-5">
                <h3 class="h3 fw-semibold opacity-75">
                    <!--       TYPED JS       -->
                    <span id="typed">Welcome to ESMC</span>
                </h3>

                <h1 class="h1 fw-bold">Find your dream <span class="d-block d-sm-inline bg-dark px-2 text-white rounded">Course</span> easily</h1>
                <p class="fs-6 fw-medium w-75 width-100-important opacity-75">ESMC provides facilities for
                    freelancers to find their
                    jobs. Join
                    now to
                    become a
                    freelancer or find a freelancer to work on your project.</p>
                <a href="formations" class="btn btn-dark text-white fs-5">Nos formations</a>
            </div>
            <div class="col-xl-6 col-lg-5 mt-lg-5 position-relative">
                <img src="imgs/bg4.png"  alt="study" class="img-fluid scale-up">
            </div>
        </div>
    </div>
</div>

<hr>
<br>
<br>
<br>

<div id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img class="" alt="about" width="500" height="200" src="imgs/{{$element[0]->img_name}}">
            </div>

            <div class="col-md-6">
                <h3></h3>
                <h3></h3>
                <h3></h3>
                <h2>{{$element[0]->title}}</h2>
<p>
    {{$element[0]->desc}}

</p>
                <button class="btn btn-dark">Learn more</button>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<hr>
<br>
<br>

<figure class="text-center">
    <blockquote class="blockquote">
        <p>ESMC professors testimonials</p>
    </blockquote>
    <figcaption class="blockquote-footer">
        our goal is to be <cite title="Source Title">THE BEST</cite>
    </figcaption>
</figure>

<div class="d-flex justify-content-evenly mt-5 mb-lg-5 pb-lg-5 ">
    <div class="row">
        <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
                <img src="imgs/{{$element[1]->img_name}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$element[0]->title}} </h5>
                    <p class="card-text">{{$element[0]->desc}}</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
                <img src="imgs/{{$element[2]->img_name}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$element[0]->title}} </h5>
                    <p class="card-text">{{$element[0]->desc}}</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
                <img src="imgs/{{$element[3]->img_name}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$element[0]->title}}</h5>
                    <p class="card-text">{{$element[0]->desc}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Option 1: Bootstrap Bundle with Popper -->

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  -->









</body>




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
        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">ESMC</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
@endsection
