@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('breadcumb')
  <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">{{ ($breadcumb ?? '') }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">/</li>
                    <li class="breadcrumb-item"><a href="{{ route('master-data.index') }}">Master Data</a></li>
                    <li class="breadcrumb-item">/</li>
                    <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">{{ ($breadcumb ?? '') }}</a></li>
                </ol>
            </div>

        </div>
    </div>
  </div>
@endsection

@section('content')
<div class="row mt-4">
  <div class="col-12">
    <div class="card">
      <div class="card-header bg-gray1" style="border-radius:10px 10px 0px 0px;">
        <div class="row">
          <div class="col-6 mt-1">
            <span class="tx-bold text-lg text-white" style="font-size:1.2rem;">
              <i class="far fa-user text-lg"></i> 
              Daftar Keluhan List
            </span>
          </div>

        </div>

        <div class="row">
          <div class="col-6">
            @include('sweetalert::alert')
          </div>
        </div>
      </div>

      <div class="card-body">
        <table id="userTable" class="table table-hover table-bordered dt-responsive">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Panjang</th>
              {{-- <th>Email</th> --}}
              <th>Jenis</th>
              <th>Isi Aduan</th>
              <th>Tanggal</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
                @foreach ($aduan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$item->nama_panjang}}</td>
                    {{-- <td>{{$item->email}}</td> --}}
                    <td>{{$item->jenis}}</td>
                    <td>{{$item->isi_aduan}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>
                        @if ($item->status == 'Belum Diterima')
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$item->id}}">Balas</button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Balas</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                <form action="{{ route('balas') }}" method="post">
                                    @csrf
                                        <input type="hidden" name="id_aduan" value="{{$item->id}}">
                                        <textarea name="balas" id="" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Send</button>
                                    </div>
                                </form>
                                </div>
                                </div>
                            </div>
                        @else
                             <i class="fa fa-check text-primary"></i>
                        @endif
                    </td>
                </tr>
                @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')

@endsection