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
        </style>

    </head>

    <body data-topbar="dark ">

    <!-- <body data-layout="horizontal"> -->

        <div class="d-lg-flex half">
          <div class="bg order-1 bg-primary order-md-2" style="background-image: url('{{ asset('img/loginbg.png') }}');"></div>
            <div class="contents">
        
              <div class="container">
                <div class="row align-items-center justify-content-center">
                  <div class="col-md-6">
                    <div class="mb-4 mb-md-5 text-center">
                        <a href="index.html" class="d-block auth-logo">
                          <img src="{{ asset('img/loginbg.png') }}" alt="" height="100">
                        </a>
                        <div class="text-center">
                            <h5 class="mb-0 font-telkom">Selamat Datang</h5>
                            <p class="text-muted mt-2">Silahkan Masuk.</p>
                        </div>
                    <form class="mt-4 pt-2" method="POST" action="{{ route('register-store') }}">
                        @csrf
                        @include('components.form-message')

                        <div class="form-floating form-floating-custom mb-4">
                          <input id="username" type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus placeholder="Enter Name">
                          <label for="input-username">Nama</label>
                          <div class="form-floating-icon">
                            <i data-feather="users"></i>
                          </div>
                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>

                        <div class="form-floating form-floating-custom mb-4">
                          <input id="username" type="text" class="form-control  @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autofocus placeholder="Enter Name">
                          <label for="input-username">Username</label>
                          <div class="form-floating-icon">
                            <i data-feather="users"></i>
                          </div>
                          @error('username')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>

                        <div class="form-floating form-floating-custom mb-4">
                          <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus placeholder="Enter Name">
                          <label for="input-username">Alamat Email</label>
                          <div class="form-floating-icon">
                            <i data-feather="users"></i>
                          </div>
                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                        
                        <div class="form-floating form-floating-custom mb-4">
                          <select class="form-control" name="role" required autofocus>
                            <option disabled selected>Pilih Jabatan</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}" >{{ $role->name }}</option>
                            @endforeach
                          </select>
                          <label for="input-username">Jabatan</label>
                          <div class="form-floating-icon">
                            <i data-feather="users"></i>
                          </div>
                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>

                        <div class="form-floating form-floating-custom mb-4">
                          <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autofocus placeholder="Enter Name">
                          <label for="input-username">Password</label>
                          <div class="form-floating-icon">
                            <i data-feather="users"></i>
                          </div>
                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary w-100 waves-effect waves-light font-telkom" type="submit">Kirim</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        
            
          </div>

    </body>

</html>

