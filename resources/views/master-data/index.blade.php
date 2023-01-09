@extends('layouts.app')

@section('style')
   <style>
       .master-data {
           cursor: pointer;
       }

       .master-data:hover {
            box-shadow: 0px 0px 33px -14px rgba(0,0,0,0.75);
            -webkit-box-shadow: 0px 0px 33px -14px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 0px 33px -14px rgba(0,0,0,0.75);
            border-right: 4px solid rgb(0, 98, 128);";
       }
       .info-box {
            box-shadow: 0 0 1px rgba(0, 0, 0, 0.125), 0 1px 3px rgba(0, 0, 0, 0.2);
            border-radius: 0.50rem;
            background-color: #fff;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 1rem;
            min-height: 80px;
            position: relative;
            width: 100%;
        }

        .info-box .info-box-icon {
            border-radius: 0.50rem 0 0 0.50rem;
            -ms-flex-align: center;
            align-items: center;
            display: -ms-flexbox;
            display: flex;
            font-size: 1.875rem;
            -ms-flex-pack: center;
            justify-content: center;
            text-align: center;
            width: 70px;
        }

        .info-box .info-box-icon > img {
            max-width: 100%;
        }

        .info-box .info-box-content {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            -ms-flex-pack: center;
            justify-content: center;
            line-height: 1.8;
            -ms-flex: 1;
            flex: 1;
            padding: 0 15px;
        }
   </style>
@endsection

@section('breadcumb')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data User & Role Settings</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">home</li>
                        <li class="breadcrumb-item">/</li>
                        <li class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Data User & Role</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 col-md-6">
        <div class="row">
            @if(auth()->user()->can('departement-list'))
            <div class="col-md-4 col-sm-6 col-12 p-1" onclick="location.href='{{ route('departements.index') }}';">
                <div class="info-box bg-gradient-info master-data">
                    <span class="info-box-icon" style="background-color:rgb(0, 98, 128); "><i class="fas fa-building text-white"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text font-size-18 text-bold">Role Setting</span>

                        <span class="font-size-12" style="color: rgba(175, 174, 174, 0.788); line-height:normal;">Settings role for user.</span>
                    </div>
                </div>
            </div>
            @endif

            @if(auth()->user()->can('user-list'))
            <div class="col-md-4 col-sm-6 col-12 p-1" onclick="location.href='{{ route('users.index') }}';">
                <div class="info-box bg-gradient-info master-data">
                    <span class="info-box-icon" style="background-color:rgb(0, 98, 128); "><i class="fas fa-user text-white"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text font-size-18 text-bold">Data User</span>

                        <span class="font-size-12" style="color: rgba(175, 174, 174, 0.788); line-height:normal;">List Data user.</span>
                    </div>
                </div>
            </div>
            @endif


        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
