@extends('layouts/master')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">

    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">

        <a href="{{route('cabang.create')}}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>
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
                        <th>Cabang</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($cabang as $item)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->nama_cabang}}</td>
                    <td>

                        <div class="btn-group">
                        <a href="{{route('cabang.edit',$item->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                        </div>

                        <div class="btn-group">
                        <form action="{{route('cabang.destroy',$item->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                        </div>


                    </td>
                    </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
