@extends('layouts/master')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">

    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">

        <a href="{{route('akibat.create')}}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>
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
                        <th>Akibat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($akibat as $item)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->akibat}}</td>
                    <td>

                        <div class="btn-group">
                        <a href="{{route('akibat.edit',$item->id)}}" class="btn btn-success"><i class="fa fa-edit" title="Edit"></i></a>
                        </div>

                        <div class="btn-group">
                        <form action="{{route('akibat.destroy',$item->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash" title="Delete"></i></button>
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
