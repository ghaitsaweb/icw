@extends('layouts/master')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Form Request</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
        <a href="{{route('user.index')}}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
    </div>
</div>
@if(session('pesan'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{session('pesan')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Form Request</h4>
            </div>
            <div class="card-body">
            <form action="{ {route('changePassword') }}" method="POST">
                @csrf
                    <div class="form-body">
                    <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                           

                             @csrf   
                                  

                    </div>
                    <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                                    Change Password
                                </button>  </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
