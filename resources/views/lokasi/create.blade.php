@extends('layouts/master')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <!-- <h4 class="text-themecolor">Input User</h4> -->
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">

            </ol>
        <a href="{{route('lokasi.index')}}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Gudang Baru</h4>
            </div>
            <div class="card-body">
           
            <form>
                @csrf
                @method('patch')
                    <div class="form-body">

                                <div class="form-group">
                                    <label for="">Kode</label>
                                <input type="text" name="kode" id="kode" placeholder="Masukan Kode" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Gudang</label>
                                    <input type="text" name="nama" id="nama" placeholder="Masukan Nama" class="form-control">
                                </div>
                                                          </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-success" onclick="run();"> <i class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('myjs')
<script>
 function run(){ 
    let kode = $("input[name=kode]").val();   
    let nama = $("input[name=nama]").val();


    $.ajax({
        url: "{{route('lokasi.loksave')}}",
        type:"POST",
        data:{
            kode:kode,
            nama:nama
        },
        beforeSend: function () {
				$("#konten").html('<i class="fa fa-refresh fa-spin"></i>');
			
			},
        success:function(response){//console.log(response);return false;
            console.log(response);
        //     if(response=='GAGAL'){
        //    alert('gagal Insert');return false;
        //     }
        //    else if(response=='NIKSUDAHTERDAFTAR'){
        //    alert('NiK SUDAH ADA silahkan ke Pelayanan mtm');return false;
        //     }

        //    // console.log(response);return false;
        //     //$("#konten").html(response);
        //     // location.replace('/pasien');
        //     else{
            alert('berhasil Menambah Gudang Baru');
            window.location.replace(response);
        //     }
          //console.log(response);return false;

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
$(document).ready(function(){
    // $('.datepicker').datepicker();
   
    // $(document).on('click','a#reject',function(e){
    //     e.preventDefault();
    //     var id = $(this).attr('href');
    //     $('form#form-solved').attr('action',id);
    //     $('#myModal').modal('show');
    //     $('.modal-title').text('Isikan Alasan');
    //     $('.form-group').find('label').html('Alasan');
    // })
    // $('#solved').click(function(e){
    //     e.preventDefault();
    //     var id = $(this).attr('href');
    //     $('form#form-solved').attr('action',id);
    //     $('#myModal').modal('show');
    // })
    // var count = 0;
    // loadcount();


    // setInterval(function(){
    //     $.ajax({
    //         url : 'getcount',
    //         success:function(data){
    //             if(count != data){
    //                 $jumlah = parseInt(data) - parseInt(count);
    //                 $('.notify').append('<span class="heartbit"></span> <span class="point"></span>');
    //                 $('h5#jumlahreq').text($jumlah + ' Request Baru');
    //                 $('.message-center').show();
    //             }else{
    //                 count = data;
    //             }

    //         }
    //     })
    // },3000);

    // function loadcount(){
    //     $.ajax({
    //         url : 'getcount',
    //         success:function(data){
    //            count = data;
    //         }
    //     })
    // }
})
</script>
@endpush
@endsection
