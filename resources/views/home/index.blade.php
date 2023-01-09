@extends('fe.app')

@section('style-fe')

@endsection


@section('content-fe')
@include('sweetalert::alert')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Keluhan</h2>
          </div>
  
          <div class="row">
            <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch">
              <form action="{{route('aduan-store')}}" method="post"  class="php-email-form1">
                @csrf
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" name="nama_panjang" class="form-control" id="name" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="name">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="name">Jenis Aduan</label>
                  <select name="jenis" id="" class="form-control">
                    <option value="Akademik">Akademik</option>
                    <option value="Keuangan">Keuangan</option>
                    <option value="Keamanan">Keamanan</option>
                  </select>
                  {{-- <input type="text" class="form-control" name="subject" id="subject" required> --}}
                </div>
                <div class="form-group">
                  <label for="name">Isi Aduan</label>
                  <textarea class="form-control" name="isi_aduan" rows="10" required></textarea>
                </div>
              
                <div class="text-center"><button type="submit" class="check-button" onclick="check({{Auth::check()}})">Send</button></div>
              </form>   
            </div>
  
          </div>
  
        </div>
      </section><!-- End Contact Section -->
  
@endsection

@section('script-fe')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    function check(id){
        console.log(id == null);
        if (id == null) {
            window.location = '/login';
        } else {
            $('.php-email-form1').submit();
        }
    }
</script>
@endsection