@extends('layouts/master')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Racking System</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                </ol>
                <a href="{{ route('akun.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i
                        class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
            </div>
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
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Adjustment</h4>
                </div>
                <div class="card-body">
                <form id="ajaxform">
                       @csrf
                        <div class="form-body">
                            <input type="hidden" name="userstatus" value="aktif">

                            <div class="form-group">
                            <td>   @if (Auth::user()->hak_akses == 'Create') 
                            <button class="btn btn-success save-data">Tarik Product Baru</button>@endif
                           
                             <button class="btn btn-primary lihat-data">Lihat Adjustment</button>
                             </td>
  
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div id="konten"></div>
        </div>
    </div>
    @push('myjs')
        <script>
            $(document).ready(function() {
                $(".save-data").click(function(event){
      event.preventDefault();
      var r = confirm("Apakah anda ingin membuat master barang!");
      if(r == true){
       
        let name = 'open';

        $.ajax({
        url:"{{route('adjust.insertbanyak')}}",
        type:"POST",
        data:{
          name:name
        },
        beforeSend: function () {
				$("#konten").html('<i class="fa fa-refresh fa-spin"></i>');
			
			},
        success:function(response){//console.log(response); return false;
            //$("#konten").html(response);
        //   if(response) {
        //     $('.success').text(response.success);
        //     $("#ajaxform")[0].reset();
        //   }

        $.ajax({
        url:"{{route('adjust.showadj')}}",
        type:"POST",
        data:{
          name:name
        },
        beforeSend: function () {
				$("#konten").html('<i class="fa fa-refresh fa-spin"></i>');
			
			},
        success:function(response){
            $("#konten").html(response);
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
        return false ;
      }  
    

      
  });
  $(".lihat-data").click(function(event){
      event.preventDefault();
    //   var r = confirm("Apakah anda ingin melihat data!");
    //   if(r == true){
       
        let name = 'open';

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
            $("#konten").html(response);
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
    //   }
    //   else{
    //     return false ;
    //   }  
    

      
  });
  $(".save-data-app").click(function(event){
      event.preventDefault();
      var r = confirm("Apakah anda ingin membuat master barang!");
      let name = 'open';alert(name); return false;
      

      $.ajax({
        url:"{{route('adjust.insertbanyak')}}",
        type:"POST",
        data:{
          name:name
        },
        beforeSend: function () {
				$("#konten").html('<i class="fa fa-refresh fa-spin"></i>');
			
			},
        success:function(response){
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
  });







                window.create = function() {
                var r = confirm("Apakah anda ingin AMmebuat barang!");
                let IDstock = 'approve'; //alert(IDstock); return false;
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
           // $("#konten").html(response);
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
                $(document).on("change", "#IDstock", function() {
                    let IDstock = $(this).val();
                   // let name = $("input[name=name]").val();
                    // alert(TujuanSurveyID);
                    // return false;
                    $.ajax({
        url: "{{route('akun.showtujuan')}}",
        type:"POST",
        data:{
            IDstock:IDstock
        },
        beforeSend: function () {
				$("#konten").html('<i class="fa fa-refresh fa-spin"></i>');
			
			},
        success:function(response){
            $("#konten").html(response);
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
                });
                $('#penyebab').change(function() {
                    var id = $('#penyebab').val();
                    if (id == '') {
                        $('#dllpenyebab').show();
                    } else {
                        $('#dllpenyebab').hide();
                    }
                });
                $('#akibat').change(function() {
                    var id = $('#akibat').val();
                    if (id == '') {
                        $('#dllakibat').show();
                    } else {
                        $('#dllakibat').hide();
                    }
                });
            });
        </script>
    @endpush
@endsection
