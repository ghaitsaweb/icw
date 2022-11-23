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
    @php $n=1 @endphp
    <button type="button" class="btn btn-primary btn-update">
                    Simpan Semua
                    </button>
    <input type="hidden" id="id_master" name="id_master" value="{{$master->id}}">
    <input type="hidden" id="total" name="total" value="{{$count}}">
            <tr>
                <th>No</th>
                <th>Nama Product</th>
                <th>Uom Name</th>
                <th>    Kategori Barang    </th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($data as $item)
                    <tr>    
                    <td>{{$loop->iteration}} </td>
                    <td>{{$item->nama_template}}({{$item->default_code}})</td> 
                    <td>{{$item->uom_name}}</td>
                    <td>
                    <select name="kategori-{{$item->idbulan}}" id="kategori-{{$item->idbulan}}" class="form-control" data-control="select2" required>
                 
                                    <option value="" disabled selected>--PIlih Kategori--</option>
                                    {{$item->kategori}}
                                    <option selected value="{{$item->kategori}}" disabled selected>{{$item->kategori}}</option>
                                        <option value="slowmooving">Slow Mooving</option>
                                        <option value="mediummooving">Medium Mooving</option>
                                        <option value="fastmooving">Fast Mooving</option>
                                </select></td>
                  
                    <td>
                    <button type="button" class="btn btn-primary btn-xs push-all tombol-{{$n}}" id="aksi-{{$item->idbulan}}"
                    onclick="upload({{$item->idbulan}})" >
                    Simpan
                    </button>
                                        <!-- <button type="button" class="btn btn-primary" onclick="hapus({{$item->idbulan}});" data-id="{{$item->idbulan}}">
                    Hapus
                   </button> -->
                   </td>
                   @php $n++ @endphp
                    
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
<div class="modal fade" id="modalreason" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="signupModelLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alasan Reject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <textarea id="reason" name="reason" class="form-control" rows="4" cols="50"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button"  id="closemodal" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary reject-data-app2">Save</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="signupModelLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <textarea id="reason" name="reason" class="form-control" rows="4" cols="50"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>




@push('myjs')
        <script>
        function upload(id)
{  
  let e = document.getElementById("kategori-"+id);
  let value = e.value; 
  let text = e.options[e.selectedIndex].text;
  //alert(text); return false;
    // var r = confirm("Apakah anda ingin Hapus!");
    $.ajax({
        url:"{{route('adjust.upload')}}",
        type:"POST",
        data:{
          id:id,value:value,
          text:text
        },
        beforeSend: function () {
				//$("#konten").html('<i class="fa fa-refresh fa-spin"></i>');
			
			},
        success:function(response){  //console.log(response);return false;
          console.log('berhasil Update silahkan klik lihat adjustment diatas'); 
           $("#konten").html('berhasil Update silahkan klik lihat adjustment diatas');
        //  console.log('berhasil Merubah status');
        
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
$(".btn-update").click(function() { //alert('iso'); return false;
             upload_all();
        });
        function upload_all()
{  var total = $('#total').val();//alert(total); return false;
  for (let i = 1; i <= total; i++) { //alert(i);
                    $(".tombol-" + i).click();
                }//return false;
  
}
        $(document).ready(function() {
   $(".save-data-app").click(function(event){
      event.preventDefault();
      var r = confirm("Apakah anda ingin Aprrove!");
      //let name = 'open';//alert(name); return false;
      let id_master = $("input[name=id_master]").val(); //alert(id_master); return false;
      // var getTextArea = document.getElementById("txtArea");
      //  var value = getTextArea.value;

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

  $(".save-data-app2").click(function(event){
      event.preventDefault();
      var r = confirm("Apakah anda ingin Aprrove!");
      //let name = 'open';//alert(name); return false;
      let id_master = $("input[name=id_master]").val(); //alert(id_master); return false;

      $.ajax({
        url:"{{route('adjust.approve2')}}",
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
  $(".reject-data-app2").click(function(event){
      event.preventDefault();
      let id_master = $("input[name=id_master]").val(); 
      var getTextArea = document.getElementById("reason");
      var value = getTextArea.value;
      $('#closemodal').click (); //return false;
      //$('#modalreason').modal('hide');
     // $('#modalreason').modal('toggle');
     //return falase;
          // $('#modalreason').
      $.ajax({
        url:"{{route('adjust.reject')}}",
        type:"POST",
        data:{
          id_master:id_master,
          value:value
        },
        beforeSend: function () {
				$("#konten").html('<i class="fa fa-refresh fa-spin"></i>');
       
			
			},
        success:function(response){//alert(response); return false;
            //$("#konten").html(response);
          // $('#modalreason').modal({backdrop: 'static', keyboard: false}) ; 
           if(response==1){
            $("#konten").html('');
          alert('berhasil reject'); //return false;
          
          $.ajax({
        url:"{{route('adjust.showadj')}}",
        type:"POST",
        data:{
          name:name
        },
        beforeSend: function () {
				$("#konten").html('<i class="fa fa-refresh fa-spin"></i>');
			
			},
        success:function(response){//alert(response); return false;
        //  $('#modalreason').modal('hide');
            $("#konten").html(response);
            $('#closemodal').click ();
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


  window.btn_hapus =function(){
    let idbulan = $("input[name=idbulan]").val();
    //let project_id = $(this).data('id');
        alert(idbulan);
    // alert(id); return false
 //code and stuff
}
// function btn_hapus(id, status) {
//     if(status == undefined) {
//         status = 'my value';
//     }
// }
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
          // $("#konten").html('');
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
