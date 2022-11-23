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
                    <h4 class="m-b-0 text-white">Nomor Barang Jadi (STBJ)</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('akun.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <input type="hidden" name="userstatus" value="aktif">

                            <div class="form-group">
                                <select name="IDstock" class="form-control" id="IDstock" required>
                                    <option value="" disabled selected>--PIlih NO BPJ--</option>
                                    @foreach ($BarangJadi as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="text" name="confirm_password" placeholder="Confirm Password" class="form-control">
                                </div> --}}
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
