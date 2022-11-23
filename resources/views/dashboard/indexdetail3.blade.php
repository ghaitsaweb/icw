@extends('layouts/master')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">

        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
            </div>
        </div>
        <div class="col-md-7 align-self-center text-right">

        </div>
    </div>
    @if (session('pesan'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session('pesan') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-body">

            <div class="dropdown">
                {{-- <button class="btn btn-Secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-filter"></i> Filter
                </button> --}}

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('chiefstore.index') }}">All</a>
                    <a class="dropdown-item" href="{{ route('chiefstore.open') }}">Open</a>
                    <a class="dropdown-item" href="{{ route('chiefstore.approveshow') }}">Approve</a>
                    <a class="dropdown-item" href="{{ route('chiefstore.rejectedshow') }}">Reject</a>
                    <a class="dropdown-item" href="{{ route('chiefstore.close') }}">Close</a>
                </div>
            </div>
            <div class="table-responsive m-t-40">
                <table id="akun" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor kartu</th>
                            <th>Nama || Code || uom || Lot</th>
                            <th>Qty</th>
                            <th>Kategori</th>

                        </tr>
                    </thead>
                    {{-- {{ dd($kartu) }} --}}
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nama_barang }} || {{ $item->default_code }}</td>
                                <td>{{ $item->qty_gerak }}</td>
                                <td>{{ $item->kategori_barang }}
                                </td>
                               
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @push('myjs')
        <script>
function detail(id) 
{
    
    $.ajax({
        url : '/akun/detail/' + id ,
        // url:"{{route('akun.detail')}}",
        // type:"POST",
        // data:{
        //   id:id 
        // },
        // beforeSend: function () {
		// 		$("#konten").html('<i class="fa fa-refresh fa-spin"></i>');
			
		// 	},
        success:function(response){  //alert(response); return false;
          $("#konten").html(response);

        },
        error: function(error) {
         console.log(error);
          $('#nameError').text(response.responseJSON.errors.name);
          $('#emailError').text(response.responseJSON.errors.email);
          $('#mobileError').text(response.responseJSON.errors.mobile);
          $('#messageError').text(response.responseJSON.errors.message);
        }
       });
} 
  


            $(document).on('click', 'a#reject', function(e) {
                e.preventDefault();
                var id = $(this).attr('href');
                $('form#form-solved').attr('action', id);
                $('#myModal').modal('show');
                $('.modal-title').text('Isikan Alasan');
                $('.form-group').find('label').html('Alasan');
            });
        </script>
    @endpush
@endsection
