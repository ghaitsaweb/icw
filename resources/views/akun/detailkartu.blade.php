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
        <!-- <a href="{{ url('akun/pdfc/') }}" class="btn btn-info d-none d-lg-block m-l-15"><i
                        class="fa fa-plus-circle"></i>{!! QrCode::size(100)->generate('sahretech.com'); !!} Detail</a> -->

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
            </div>
            <div class="table-responsive m-t-40">
                <table id="detailkartu" class="display nowrap table1 table-hover table-striped table-bordered" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                         
                            <th>Nomor kartu</th>
                            <th>Nama | (code) | Lot</th>
                            <th>Qtyawal</th>
                            <th>sisa</th>
                            <th>Kategori</th>
                            <th>Lokasi</th>

                        </tr>
                    </thead>
                    {{-- {{ dd($kartu) }} --}}
                    <tbody>
                      
                            <tr>
                            
                                <td>{{ $data->iddetail }}</td>
                                <td>{{ $data->nama_barang }} | ({{ $data->default_code }}) | ({{ $data->productionlot }})</td>
                                <td>{{ $data->qty }}</td>
                                <td>{{ $data->qty_g }}</td>
                                <td>{{ $data->kategori_barang }}
                                </td>
                                <td>  {{ $data->nama_lokasi }}            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleLok">
              Lokasi
                    </button>
                                </td>
                            </tr>
                     
                    </tbody>
                </table>
            </div>

              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Qty Out
                    </button>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#qtyin">
              Qty In
                    </button>
                    <button type="button" class="btn btn-warning" onclick="detail({{$ids}});" data-id="{{$ids}}">
                    Detail
                   </button>

  
        </div>
    </div>




   

<!-- Modal -->
<div class="modal fade" id="exampleLok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lokasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="input-group mb-3">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleSuggest">
            Suggest
                    </button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleManual">
             Manual
                    </button>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleSuggest" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow:hidden;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lokasi Suggest</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
      <div class="input-group">
      <select name="select2insidemodal" id="select2insidemodal" class="form-control" data-control="select2" required>
      <option value="" disabled selected>--PIlih Rak--</option>
      @foreach ($suggest as $k => $item)
                     <option value="{{$item->id}}">{{$item->nama}}({{$item->pr}} %)</option>
                     @endforeach
             </select>
</div><button type="button" class="btn btn-primary" onclick="post({{$ids}},{{$data->qty_g}});" data-id="{{$ids}}">Simpan</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleManual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lokasi Manual</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="input-group mb-3">
      <select name="s22" id="s22" class="form-control" data-control="select2" required>
 
                 
      <option value="" disabled selected>--PIlih Rak--</option>
      @foreach ($manual as $k => $item)
                     <option value="{{$item->id}}">{{$item->nama}}({{$item->pr}} %)</option>
                     @endforeach
             </select>
</div><button type="button" class="btn btn-primary" onclick="postmanual({{$ids}},{{$data->qty_g}});" data-id="{{$ids}}">Simpan</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>





<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Qty</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="input-group mb-3">
  <input type="text" class="form-control" id="qty_out" name="qty_out" placeholder="ISIKAN ANGKA SAJA" aria-label="Qty" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">Qty Out</span>
  </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
        <button type="button" class="btn btn-primary" onclick="simpan({{$ids}});" data-id="{{$ids}}">
                   Simpan
                   </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="qtyin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Qty</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="input-group mb-3">
  <input type="text" id="qty_in" name="qty_in" class="form-control" placeholder="Qty_In" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">Qty In</span>
  </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="qtyin({{$ids}});" data-id="{{$ids}}">
                   Simpan
                   </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="kartu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Kartu Stock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="No Kartu Stock" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">Nomor</span>
  </div>
</div>
<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="tanggal_masuk" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">Tanggal Masuk</span>
  </div>
</div>
<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Jumlah Masuk" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">Masuk</span> 
  </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div id="konten"></div>

    
    @push('myjs')
        <script>
                $(document).ready(function () {
                  $("#select2insidemodal").select2({
                    width: '480' 
  });
                  $("#s22").select2({
                    width: '480' 
  });
});
function simpan(id) 
{ 
  let qtyout = $("input[name=qty_out]").val(); //alert(qtyout); return false;
    
  $.ajax({
        url:"{{route('akun.qtyout')}}",
        type:"POST",
        data:{
          id:id,
          qtyout:qtyout
        },
        beforeSend: function () {
				// $("#konten").html('<i class="fa fa-refresh fa-spin"></i>');
			
			},
        success:function(response){
          alert(response);
          location.reload();return false;
           $("#konten").html('');
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
function detail(id) 
{ 
  //  alert(id); return false;
    
  $.ajax({
        url:"{{route('akun.details')}}",
        type:"POST",
        data:{
          id:id
        },
        beforeSend: function () {
				 $("#konten").html('<i class="fa fa-refresh fa-spin"></i>');
			
			},
        success:function(response){
         // alert(response);return false;
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
function post(id,qty) 
{   
    var e = document.getElementById("select2insidemodal");
    var value = e.value;//alert(qty);return false;
    // var text = e.options[e.selectedIndex].text;
    
  $.ajax({
        url:"{{route('akun.posts')}}",
        type:"POST",
        data:{
          id:id,value:value,qty:qty
        },
        beforeSend: function () {
				//  $("#konten").html('<i class="fa fa-refresh fa-spin"></i>');
			
			},
        success:function(response){
          alert(response);location.reload();return false;
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
function postmanual(id,qty) 
{   
    var e = document.getElementById("s22");
    var value = e.value;//alert(value);return false;
    // var text = e.options[e.selectedIndex].text;
    
  $.ajax({
        url:"{{route('akun.posts')}}",
        type:"POST",
        data:{
          id:id,value:value,qty:qty
        },
        beforeSend: function () {
				//  $("#konten").html('<i class="fa fa-refresh fa-spin"></i>');
			
			},
        success:function(response){
          alert(response);location.reload();return false;
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
function qtyin(id) 
{ 
  let qtyin = $("input[name=qty_in]").val(); //alert(qtyin); return false;
    
  $.ajax({
        url:"{{route('akun.qtyin')}}",
        type:"POST",
        data:{
          id:id,
          qtyin:qtyin
        },
        beforeSend: function () {
				// $("#konten").html('<i class="fa fa-refresh fa-spin"></i>');
			
			},
        success:function(response){
          alert(response);location.reload();return false;
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
