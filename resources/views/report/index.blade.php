@extends('layouts/master')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">

    </div>
    <div class="col-md-7 align-self-center text-right">
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
                <th>Nama Product(Code)</th>
                <th>Tanggal</th>
                <th>Kat Sebelum</th>
                <th>Kat Sesudah</th>
                <th>Pengubah</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $item)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->nama_prod}}({{$item->default_code}})</td> 
                    <td>{{$item->tanggal}}</td>
                    <td>{{$item->kategori_seb}}</td>
                    <td>{{$item->kategori_ssdh}}</td>
                    <td>{{$item->aktor}}</td>
                    
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
        </div>
        <div class="form-actions">
       
                            </div>

    </div>
    
</div>
@push('myjs')
        <script>
        $(document).ready(function() {
            window.btn_cetak_belum = function() {
                var r = confirm("Apakah anda ingin Approve  Data ini!");
                let IDstock = 'approved2'; //alert(IDstock); return false;
                              $.ajax({
        url: "{{route('adjust.approve2')}}",
        type:"POST",
        data:{
            IDstock:IDstock
        },
        beforeSend: function () {
				$("#konten").html('<i class="fa fa-refresh fa-spin"></i>');
			
			},
        success:function(response){
            //$("#konten").html(response);
            $("#konten").html('');
            alert('Berhasil Approve');
          console.log(response);return false;

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
        });
        </script>
    @endpush
@endsection
