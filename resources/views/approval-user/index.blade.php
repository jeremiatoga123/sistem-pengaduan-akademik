@extends('layouts.app')

@section('style')
<style>
    .pointer {
        cursor: pointer;
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
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">/</li>
                    <li class="breadcrumb-item active"><a href="{{ route('history-log.index') }}">{{ ($breadcumb ?? '') }}</a></li>
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
                    <div class="col-6">
                        <span class="tx-bold text-lg text-white" style="font-size:1.2rem;">
                        <i class="mdi mdi-history text-lg"></i>&nbsp;
                        Approval Register User
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
                <table id="HistoryTable" class="table table-hover table-responsive-xl table-bordered dt-responsive ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Departement</th>
                            @if(auth()->user()->can('history-log-delete'))
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $l)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $l->username }}</td>
                            <td>{{ $l->getRoleNames()[0] }}</td>
                            @if(auth()->user()->can('history-log-delete'))
                            <td>
                                @can('history-log-delete')
                                <form action="{{ route('approve-register',$l ->id) }}" method="post">
                                    @csrf
                                    <button class="btn btn-success f-12" type="submit">
                                        Approv
                                    </button>
                                    </a>
                                </form>
                                @endcan
                            </td>
                            @endif
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