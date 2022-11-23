@extends('layouts/master')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">List Request</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">List Request</li>
            </ol>
        <a href="{{route('user.create')}}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>
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
<div class="card">
    <div class="card-body">

        <div class="table-responsive m-t-40">
            <table id="user" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Product</th>
                        <th>Qty</th>
                        <th>Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>1</td>
                    <td>WFS 100</td>
                    <td>WFS 100</td>
                    <td>fAST MOOVING</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
