@extends('fe.app')

@section('content-fe')
@include('sweetalert::alert')
@include('components.form-message')

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Login</h2>
          </div>
  
          <div class="row">
            <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch">
              <form action="{{route('register-store')}}" method="post"  class="php-email-form1">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                      <label for="name">Name</label>
                      <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="name">Username</label>
                      <input type="text" name="username" class="form-control" id="name" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="email">Email</label>
                      <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                    <input type="hidden" value="User" name="role">
                    <input type="hidden" value="from" name="fe">
                    <div class="form-group col-md-6">
                      <label for="name">Password</label>
                      <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                </div>
                <div class="text-right"><button type="submit">Submit</button></div>
              </form>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Contact Section -->
  
@endsection
