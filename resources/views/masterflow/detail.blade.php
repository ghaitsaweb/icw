@extends('layouts/js')
@section('content')
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
    <input type="hidden" id="id_master" name="id_master" value="{{$master->id}}">
            <tr>
                <th>No</th>
                <th>Nama Product</th>
                <th>Uom</th>
                <th>Qty :: factor</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($data as $item)
                    <tr> 
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->nama_template}}({{$item->default_code}})</td> 
                    <td>{{$item->uom_name}}</td>
                    <td>{{$item->qty}} :: {{$item->x_smf_factor}}</td>
                    <td>{{$item->stt}}</td>
                    <td>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modaledit">
                    Edit
                    </button>
                                        <button type="button" class="btn btn-primary hapus-data-app" onclick="btn_cetak_isi({{$item->idbulan}});">
                    Hapus
                   </button></td>
                    
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
        </div>
        <div class="form-actions">
        <button class="btn btn-success save-data-app">Approve</button>
                            </div>

    </div>
    
</div>
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
  <div class="modal-body">
      <div class="input-group mb-3">
  <input type="text"  id="qty" name="qty" class="form-control" placeholder="qty" aria-label="Recipient's username" aria-describedby="basic-addon2" >
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">qty</span>
  </div>
  <div class="input-group mb-3">
  <input type="text" id="factor" name="factor" class="form-control" placeholder="Factor" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">Factor</span>
  </div>
</div>
<div class="input-group mb-3">
  <input type="text" id="Kategori" name="Kategori" class="form-control" placeholder="kategori" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">Kategori</span>
  </div>
</div>
</div>
@push('myjs')
        <script>
        $(document).ready(function() {
            $(".save-data-app").click(function(event){
      event.preventDefault();
      var r = confirm("Apakah anda ingin Aprrove!");
      //let name = 'open';//alert(name); return false;
      let id_master = $("input[name=id_master]").val(); //alert(id_master); return false;

      $.ajax({
        url:"{{route('adjust.approve')}}",
        type:"POST",
        data:{
          id_master:id_master
        },
        beforeSend: function () {
				$("#konten").html('<i class="fa fa-refresh fa-spin"></i>');
			
			},
        success:function(response){
           // $("#konten").html(response);
           $("#konten").html('');
           if(response==1){
          alert('berhasil approve');
           }
         else{
          alert('gagal');
           }
        //   if(response) {
        //     $('.success').text(response.success);
        //     $("#ajaxform")[0].reset();
        //   }
        },
        error: function(error) {
         console.log(error);
          $('#nameError').text(response.responseJSON.errors.name);
          $('#emailError').text(response.responseJSON.errors.email);
          $('#mobileError').text(response.responseJSON.errors.mobile);
          $('#messageError').text(response.responseJSON.errors.message);
        }
       });
  });
  $(".hapus-data-app").click(function(event){
      event.preventDefault();
      var r = confirm("Apakah anda ingin Hapus data ini!");
      //let name = 'open';//alert(name); 
      return false;
      let id_master = $("input[name=id_master]").val(); //alert(id_master); return false;

      $.ajax({
        url:"{{route('adjust.approve')}}",
        type:"POST",
        data:{
          id_master:id_master
        },
        beforeSend: function () {
				$("#konten").html('<i class="fa fa-refresh fa-spin"></i>');
			
			},
        success:function(response){
           // $("#konten").html(response);
           $("#konten").html('');
           if(response==1){
          alert('berhasil approve');
           }
         else{
          alert('gagal');
           }
        //   if(response) {
        //     $('.success').text(response.success);
        //     $("#ajaxform")[0].reset();
        //   }
        },
        error: function(error) {
         console.log(error);
          $('#nameError').text(response.responseJSON.errors.name);
          $('#emailError').text(response.responseJSON.errors.email);
          $('#mobileError').text(response.responseJSON.errors.mobile);
          $('#messageError').text(response.responseJSON.errors.message);
        }
       });
  });

  
            window.btn_cetak_belum = function() {
                var r = confirm("Apakah anda ingin Approve  Data ini!");
                let IDstock = 'approve'; alert(IDstock); return false;
                              $.ajax({
        url: "{{route('adjust.approve')}}",
        type:"POST",
        data:{
            IDstock:IDstock
        },
        beforeSend: function () {
				$("#konten").html('<i class="fa fa-refresh fa-spin"></i>');
			
			},
        success:function(response){
            //$("#konten").html(response);
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
