@extends('layouts.app')

@section('style')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

  <style>
    .btn-footer {
        width: 110px;
    }
    .bg-gray1{
        background: aqua!important;
    }
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
                    <li class="breadcrumb-item"><a href="{{ route('master-data.index') }}">Master Data</a></li>
                    <li class="breadcrumb-item">/</li>
                    <li class="breadcrumb-item active"><a href="{{ route('departements.index') }}">Departements</a></li>
                </ol>
            </div>

        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row mt-4 mb-4">
    <div class="col-sm-8">
        <div class="card card-primary">
            <div class="card-header text-center bg-gray1" style="border-radius:10px 10px 0px 0px;">
                <h3 class="card-title text-white">Edit Departement ({{ $departement->name }})</h3>
            </div>

            <form method="POST" action="{{ route('departements.update', $departement->id) }}" novalidate>
                @method('patch')
                @csrf

                <div class="card-body">
                    
                    @include('components.form-message')

                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" placeholder="name" required value="{{ old('name') ?? $departement->name }}">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Permissions</label> <br>
                        <small>Select All</small>
                        <input type="checkbox" id="checkbox">

                        <div class="select2-purple">
                            <select class="select2" name="permissions[]" id="e1" data-placeholder="Select The Permissions" multiple data-dropdown-css-class="select2-purple" style="width: 100%;">
                                @foreach ($permissions as $permission)
                                    <option value="{{$permission->id}}" 
                                        @foreach (old('permissions') ?? $rolePermissions as $id)
                                            @if ($id == $permission->id)
                                                {{ ' selected' }}
                                            @endif
                                        @endforeach>
                                        {{$permission->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        @error('permissions')
                            <span class="text-danger f-12">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="card-footer bg-gray1" style="border-radius:0px 0px 10px 10px;">
                    <button class="btn btn-success" type="submit">Save</button>
                    <a href="{{ route('departements.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection