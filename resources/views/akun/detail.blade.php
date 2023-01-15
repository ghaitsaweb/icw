@extends('layouts/js')
@section('content')
<div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Data Product</h4>
                </div>
                <div class="card-body">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="tEArgavJrXmsW3Xc8PDq6zztQxLIwetNzE7LpbL6">                        <div class="form-body">
                            <input type="hidden" name="userstatus" value="aktif">

                            <div class="table-responsive m-t-40">
                <table id="chiefstore" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                        
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Uom</th>
                            <th>Productionlot</th>
                            <th>Masuk</th>
                            <th>Kategori barang</th>
 
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody><input type="hidden" id="id_master" name="id_master" value="{{$bpj}}" readonly>
                    @foreach ($data as $k => $item)
                            <tr>
                                <td>{{ $loop->iteration }} </td>

                                <td>{{ $item->name_template }}({{ $item->default_code }})
                                </td> 
                                
                                <td>{{ $item->uomname }}
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->product_uom_qty }}</td>
                                <td>
                              {{ $item->kategori }} </td> 
                                <td>@if($item->x_kartu==1)   
                   <a class="btn btn-success" href="{{action('AkunController@barcode', $item->id_card)}}" role="button"><i
                        class="fa fa-qrcode"></i> Cetak</a>
 
                                @else
                                                                            <button type="button" class="btn btn-primary" onclick="buat({{$bpj}},{{$item->product_id}},{{$item->id}},{{$item->default_code}},{{$item->name}},'{{$item->name_template}}',{{$item->product_uom_qty}},'{{$item->kategori}}','{{$item->uomname}}');" data-id="{{$bpj}}">
                    Buat Kartu stock
                   </button>@endif
                   </td>
                   <!-- <button class="btn btn-primary save-data-kartu">Lihat Adjustment</button> -->
</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
                            
                        </div>



                        <div class="form-actions">
                            <!-- <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button> -->
                        </div>
                    </form>
                </div>
            </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lokasi Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Rak : </label>
  </div>
  <select class="custom-select" id="inputGroupSelect01">
    <option selected>Choose...</option>
    <option value="1">1K11</option>
    <option value="2">1K12</option>
    <option value="3">1K13</option>
    <option value="1">1K21</option>
    <option value="2">1K22</option>
    <option value="3">1K23</option>
    <option value="1">1K31</option>
    <option value="2">1K32</option>
    <option value="3">1K33</option>

    <option value="1">2K11</option>
    <option value="2">2K12</option>
    <option value="3">2K13</option>
    <option value="1">2K21</option>
    <option value="2">2K22</option>
    <option value="3">2K23</option>
    <option value="1">2K31</option>
    <option value="2">2K32</option>
    <option value="3">2K33</option>
    <option value="1">3K11</option>
    <option value="2">3K12</option>
    <option value="3">3K13</option>
    <option value="1">3K21</option>
    <option value="2">3K22</option>
    <option value="3">3K23</option>
    <option value="1">3K31</option>
    <option value="2">3K32</option>
    <option value="3">3K33</option>
  </select>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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

@push('myjs')
        <script>
                    function buat(IDstock,product_id,id,default_code,productionlot,nama,uom,kat,uomname) 
{
    //lert(uom);return false;


    var r = confirm("Apakah anda ingin Membuat kartu stock!");
    $.ajax({
        url:"{{route('akun.buat')}}",
        type:"POST",
        data:{
          IDstock:IDstock,
          product_id:product_id,
          id:id,
          default_code:default_code,
          productionlot:productionlot,nama:nama,
          uom:uom,
          kat:kat,uomname:uomname
          
        },
        beforeSend: function () {
				$("#konten").html('<i class="fa fa-refresh fa-spin"></i>');
			
			},
        success:function(response){  //alert(response); return false;
          $("#konten").html('');
          if(response === true){
          alert(response); 
            }
            else{
          alert('berhasil buat kartu stock');
            }
           
            $.ajax({
        url: "{{route('akun.showtujuan')}}",
        type:"POST",
        data:{
          IDstock:IDstock
        },
        beforeSend: function () {
				$("#konten").html('<i class="fa fa-refresh fa-spin"></i>');
			
			},
        success:function(response){//console.log(response);return false;
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
    // alert(id);return false;


    // var r = confirm("Apakah anda ingin Membuat kartu stock!");
    $.ajax({
        url:"{{route('akun.barcode')}}",
        type:"POST",
        data:{
          id:id
          
        },
    //     xhrFields: {
    //     responseType: 'blob'  // without this, you will get blank pdf!
    // },
        beforeSend: function () {
			
			},
        success:function(response){  alert(response); //return false;
           
       
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
            
        </script>
    @endpush
@endsection

    

            