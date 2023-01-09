<!doctype html>
<html lang="en">

    <head>
    
        @include('layouts.partials.head')
        <style>
            .bg-right{
                background-image: url('img/assets/login/login.jpg');
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
                background-color: #cccccc;
            }
            .bg-dark{
                position:absolute;
                height:100%;
                width:100%;
                right:0;
                bottom:0;
                left:0;
                top:0;
                opacity:.4;
                background-color:rgb(14, 1, 1)
            }
            @font-face {
                font-family: 'Tangerine';
                font-style: normal;
                font-weight: normal;
                src: local('Tangerine'), url('font/Cocon-Regular-Font.otf') format('truetype');
            }
            .font-telkom{
                font-family: 'Tangerine' !important;
            }

p {
  color: #b3b3b3;
  font-weight: 300; }

h1, h2, h3, h4, h5, h6,
.h1, .h2, .h3, .h4, .h5, .h6 {
  font-family: "Roboto", sans-serif; }

a {
  -webkit-transition: .3s all ease;
  -o-transition: .3s all ease;
  transition: .3s all ease; }
  a:hover {
    text-decoration: none !important; }

.content {
  padding: 7rem 0; }

h2 {
  font-size: 20px; }

.half, .half .container > .row {
  height: 100vh;
  min-height: 700px; }

@media (max-width: 991.98px) {
  .half .bg {
    height: 200px; 
    } 

    .bg{
        display:none;
    }
}

.half .contents {
  background: #f6f7fc; }

.half .contents, .half .bg {
  width: 50%; }
  @media (max-width: 1199.98px) {
    .half .contents, .half .bg {
      width: 100%; 
    } 
      .bg{
        display:none;
    }
    }
  .half .contents .form-control, .half .bg .form-control {
    border: none;
    -webkit-box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
    border-radius: 4px;
    height: 54px;
    background: #fff; }
    .half .contents .form-control:active, .half .contents .form-control:focus, .half .bg .form-control:active, .half .bg .form-control:focus {
      outline: none;
      -webkit-box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
      box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1); }

.half .bg {
  background-size: cover;
  background-position: center; }

.half a {
  color: #888;
  text-decoration: underline; }

.half .btn {
  height: 54px;
  padding-left: 30px;
  padding-right: 30px; }

.half .forgot-pass {
  position: relative;
  top: 2px;
  font-size: 14px; }

.control {
  display: block;
  position: relative;
  padding-left: 30px;
  margin-bottom: 15px;
  cursor: pointer;
  font-size: 14px; }
  .control .caption {
    position: relative;
    top: .2rem;
    color: #888; }

.control input {
  position: absolute;
  z-index: -1;
  opacity: 0; }

.control__indicator {
  position: absolute;
  top: 2px;
  left: 0;
  height: 20px;
  width: 20px;
  background: #e6e6e6;
  border-radius: 4px; }

.control--radio .control__indicator {
  border-radius: 50%; }

.control:hover input ~ .control__indicator,
.control input:focus ~ .control__indicator {
  background: #ccc; }

.control input:checked ~ .control__indicator {
  background: #fb771a; }

.control:hover input:not([disabled]):checked ~ .control__indicator,
.control input:checked:focus ~ .control__indicator {
  background: #fb8633; }

.control input:disabled ~ .control__indicator {
  background: #e6e6e6;
  opacity: 0.9;
  pointer-events: none; }

.control__indicator:after {
  font-family: 'icomoon';
  content: '\e5ca';
  position: absolute;
  display: none;
  font-size: 16px;
  -webkit-transition: .3s all ease;
  -o-transition: .3s all ease;
  transition: .3s all ease; }

.control input:checked ~ .control__indicator:after {
  display: block;
  color: #fff; }

.control--checkbox .control__indicator:after {
  top: 50%;
  left: 50%;
  margin-top: -1px;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%); }

.control--checkbox input:disabled ~ .control__indicator:after {
  border-color: #7b7b7b; }

.control--checkbox input:disabled:checked ~ .control__indicator {
  background-color: #7e0cf5;
  opacity: .2; }

.bg-perpus{
  background:aqua;
}
        </style>

    </head>

    <body data-topbar="dark">

    <!-- <body data-layout="horizontal"> -->

        <div class="d-lg-flex half">
            <div class="bg order-1 bg-perpus order-md-2" style="background-image: url(''); "></div>
            <div class="contents">
        
              <div class="container">
                <div class="row align-items-center justify-content-center">
                  <div class="col-md-6">
                    <div class="mb-4 mb-md-5 text-center">
                        <a href="index.html" class="d-block auth-logo">
                            <img src="{{ asset('img/76-764671_software-tools-icon-png-transparent-png-removebg-preview.png') }}" alt="" height="100">
                        </a>
                        <div class="text-center">
                            <h5 class="mb-0 font-telkom">Selamat Datang</h5>
                            <p class="text-muted mt-2">Silahkan Masuk.</p>
                        </div>
                    <form class="mt-2 pt-2" method="POST" action="{{ route('loginPost2') }}">
                        @csrf
                        @include('sweetalert::alert')

                        <div class="form-floating form-floating-custom mb-4">
                            <input id="username" type="text" class="form-control  @error('nip') is-invalid @enderror" name="nip" value="{{ old('nip') }}" required autofocus placeholder="Enter Nip Or Nim">
                            <label for="input-username">Username</label>
                            <div class="form-floating-icon">
                            <i data-feather="users"></i>
                            </div>
                        </div>

                        <div class="form-floating form-floating-custom mb-4 auth-pass-inputgroup">
                            <input id="password-input" type="password" class="form-control pe-5 @error('password') is-invalid @enderror" name="password" required placeholder="Enter Password">
                            
                            <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
                                <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                            </button>
                            <label for="input-password">Password</label>
                            <div class="form-floating-icon">
                                <i data-feather="lock"></i>
                            </div>
                        </div>

                       
                        <div class="mb-3">
                            <button class="btn bg-perpus w-100 waves-effect waves-light font-telkom" type="submit">Masuk</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        
            
          </div>

    </body>

</html>

