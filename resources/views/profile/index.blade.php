@extends('layouts.app')

@section('style')
<style>
.profile-user{
    width: 200px;
    height: 200px;
}
.card{
  border-radius:20px; 
}
.card-img:hover {
    transform: scale(1.07) !important;
    transition: 0.5s;
    box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 5px 8px rgba(0, 0, 0, .06);
}
.role{
  display:none;
}
.judul{
  font-size: 25px;
}
.label{
  font-size: 15px;
}
.card-img{
  border-top:5px solid hsla(198, 100%, 25%, 1);
}

.card-profile{
  border-top: 5px solid hsla(198, 100%, 25%, 1);
}

/* Bordered Tabs */
.nav-tabs-bordered {
  border-bottom: 2px solid #ebeef4;
}
.nav-tabs-bordered .nav-link {
  margin-bottom: -2px;
  border: none;
  color: #2c384e;
}
.nav-tabs-bordered .nav-link:hover, .nav-tabs-bordered .nav-link:focus {
  color: #4154f1;
}
.nav-tabs-bordered .nav-link.active {
  background-color: #fff;
  color: #4154f1;
  border-bottom: 2px solid #4154f1;
}


/* lighbox image */
#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 70px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
/* end lightbox image */
</style>
@endsection

@section('breadcumb')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">{{ ($breadcumb ?? '') }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">home</li>
                    <li class="breadcrumb-item">/</li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">/</li>
                    <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">{{ ($breadcumb ?? '') }}</a></li>
                </ol>
            </div>

        </div>
    </div>
</div>
@endsection

@section('content')

    <div class="row">
      <div class="col-xl-4">
        <div class="card card-img">
          <div class="card-bod profile-card d-flex flex-column align-items-center">
            <img class="rounded-circle profile-user mt-3" alt="{{ Str::limit(Auth::user()->name, '100', '') }}" id="myImg" src="{{ asset('img/users/'.(Auth::user()->avatar ?? 'user.png')) }}">
            <h2 class="mt-3">{{ Str::limit(Auth::user()->name, '100', '') }}</h2>
            
          </div>
        </div>
      </div>

      <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
      </div>

      <div class="col-xl-8">

        <div class="card card-profile">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">
              <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#profile-detail" type="button" role="tab" aria-controls="home" aria-selected="true">Detail</button>
              </li>
              <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-edit" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile Edit</button>
              </li>
              <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#profile-change-password" type="button" role="tab" aria-controls="contact" aria-selected="false">Change Password</button>
              </li>
              <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#qr" type="button" role="tab" aria-controls="contact" aria-selected="false">QR Code</button>
              </li>
            </ul>

            <div class="tab-content pt-2">
              <div class="tab-pane fade show active profile-overview" id="profile-detail">
                @include('sweetalert::alert')

                <h3 class="judul mt-3 mb-3">Profile Details</h3>
                @foreach ($users as $user)
                <div class="row">
                  <div class="col-lg-3 col-md-4 label mb-2">Name</div>
                  <div class="col-lg-9 col-md-8 mb-2">{{ $user->name }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label mb-2">Username</div>
                  <div class="col-lg-9 col-md-8 mb-2">{{ $user->username }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label mb-2">Email Address</div>
                  <div class="col-lg-9 col-md-8 mb-2">{{ $user->email }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label mb-2">Roles</div>
                  <div class="col-lg-9 col-md-8 mb-2">{{ $user->getRoleNames()[0] }}</div>
                </div>

                @endforeach
              </div>

              <div class="tab-pane fade profile-edit" id="profile-edit">
                <!-- Profile Edit Form -->
                <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                  @method('patch')
                  @csrf
  
                  <div class="card-body">
  
                      <div class="form-group mb-3">
                          <label for="name">Name</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                              name="name" value="{{ old('name') ?? $user->name }}" placeholder="Enter name">
                          @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
  
                      <div class="form-group mb-3">
                          <label for="username">Username</label>
                          <input type="text" class="form-control @error('username') is-invalid @enderror"
                              id="username" name="username" value="{{ old('username') ?? $user->username }}"
                              placeholder="Enter username">
                          @error('username')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
  
                      <div class="form-group mb-3">
                          <label for="email">Email address</label>
                          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                              name="email" value="{{ old('email') ?? $user->email }}" placeholder="Enter email">
                          @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
  
                      <div class="form-group mb-3">
                          <label class="role">Roles</label>
                          <select hidden class="form-control" name="role">
                              <option disabled selected>Select One Role Only</option>
                              @foreach ($roles as $role)
                              <option value="{{ $role }}"
                                  {{ (old('role') ?? $user->getRoleNames()[0] == $role) ? 'selected' : ''  }}>
                                  {{ $role }}</option>
                              @endforeach
                          </select>
                          @error('role')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
  
                      <div class="form-group mb-3">
                          <label for="avatar">Avatar :</label>
                          <img src="{{ asset('img/users/'.($user->avatar ?? 'user.png')) }}" width="110px"
                              class="image img" />
  
                          <div class="input-group mt-3">
                              <input type="file" class="form-control" id="avatar" name="avatar">
                          </div>
                      </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer bg-gray1" style="border-radius:0px 0px 10px 10px;">
                      <button type="submit" class="btn btn-success btn-footer">Save</button>
                  </div>
              </form><!-- End Profile Edit Form -->
            </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form action="{{ route('profile.change-password') }}" method="POST">
                  @method('patch')
                  @csrf
                  <div class="card-body">
  
                      <div class="form-group mb-3">
                          <label for="password">Old Password</label>
                          <input type="password" class="form-control @error('password') is-invalid @enderror"
                              id="password" name="password" value="{{ old('password') }}" placeholder="Password">
                          @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
  
                      <div class="form-group">
                          <label for="new_password">New Password</label>
                          <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                              id="new_password" name="new_password" value="{{ old('new_password') }}"
                              placeholder="New Password">
                          @error('new_password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer bg-gray1" style="border-radius:0px 0px 10px 10px;">
                      <button type="submit" class="btn btn-success">Change</button>
                  </div>
                </form><!-- End Change Password Form -->
              </div>

              <div class="tab-pane fade pt-3" id="qr">
                <div class="card-body">
                  <div class="row text-center">
                    {!! QrCode::size(250)->generate($user->id ); !!}
                  </div>
                </div>
              </div>
          </div>
      </div>
    </div>

    
  </div>
 



@endsection

@section('script')
<script>
  // Get the modal
  var modal = document.getElementById("myModal");
  
  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var img = document.getElementById("myImg");
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption");
  img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  }
  
  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];
  
  // When the user clicks on <span> (x), close the modal
  span.onclick = function() { 
    modal.style.display = "none";
  }

  </script>
  
@endsection