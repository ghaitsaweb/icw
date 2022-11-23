@extends('layouts/master')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Input User</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">User Baru</li>
            </ol>
        <a href="{{route('cabang.index')}}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
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
                <h4 class="m-b-0 text-white">Cabang Baru</h4>
            </div>
            <div class="card-body">
            <form action="{{route('cabang.update',$cabang->id)}}" method="POST">
                @csrf
                @method('patch')
                    <div class="form-body">

                                <div class="form-group">
                                    <label for="">Cabang</label>
                                <input type="text" name="nama_cabang" value="{{$cabang->nama_cabang}}" placeholder="Masukan Nama" class="form-control">
                                </div>


                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
