@extends('layouts/master')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">

    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Table User</li>
            </ol>
        {{-- <a href="{{route('user.create')}}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a> --}}
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
        
        <div class="dropdown">
            <button class="btn btn-Secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-filter"></i> Filter
            </button>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{route('chiefstore.index')}}">All</a>
              <a class="dropdown-item" href="{{route('chiefstore.open')}}">Open</a>
              <a class="dropdown-item" href="{{route('chiefstore.approveshow')}}">Approve</a>
              <a class="dropdown-item" href="{{route('chiefstore.rejectedshow')}}">Reject</a>
              <a class="dropdown-item" href="{{route('chiefstore.close')}}">Close</a>
            </div>
        </div>
        <div class="table-responsive m-t-40">
            <table id="chiefstore" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Action</th>
                        <th>NO REQ</th>
                        <th>Status</th>
                        <th>Pelapor</th>
                        <th>No SPK</th>
                        <th>Cabang</th>
                        <th>Penyebab</th>
                        <th>Permintaan</th>
                        <th>Akibat</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($request as $item)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        @if($item->status == 'open')
                        <div class="btn-group">
                        <a href="{{route('chiefstore.approve',$item->id)}}" class="btn btn-success"><i class="fa fa-check"></i></a>
                        </div>

                        <div class="btn-group">
                            <a id=reject href="{{route('user.rejected',$item->id)}}" class="btn btn-danger"><i class="fa fa-times"></i></a>
                        </div>

                        @endif
                    </td>
                    <td>{{$item->no_req}}</td>
                    <td>{{$item->status ." (". $item->updated_at.")"}}</td>
                    <td>{{$item->pelapor}}</td>
                    <td>{{$item->spk}}</td>
                    <td>{{$item->cabang->nama_cabang}}</td>
                    <td>{{$item->penyebab == null ? $item->dll_penyebab : $item->rel_penyebab->penyebab}}</td>
                    <td>{{$item->permintaan}}</td>
                    <td>{{$item->akibat == null ? $item->dll_akibat : $item->rel_akibat->akibat}}</td>
   
                  
                    </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@push('myjs')
<script>
$(document).on('click','a#reject',function(e){
        e.preventDefault();
        var id = $(this).attr('href');
        $('form#form-solved').attr('action',id);
        $('#myModal').modal('show');
        $('.modal-title').text('Isikan Alasan');
        $('.form-group').find('label').html('Alasan');
    });
</script>
@endpush
@endsection
