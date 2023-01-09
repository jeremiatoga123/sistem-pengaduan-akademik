<!DOCTYPE html>
<html lang="en">

<head>
    @include('fe.layouts.head')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('fe.layouts.header')
 
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Ajukan Pengaduan Anda Hanya Di Web Ini.</h1>
          <h2>Isi Formulir dibawah untuk untuk mengajukan keluhan anda.</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">


    @yield('content-fe')


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('fe.layouts.footer')
 
  <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('fe.layouts.foot')

</body>

</html>