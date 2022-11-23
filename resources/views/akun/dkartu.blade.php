@extends('layouts/jstanpa')
@section('content')
<div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Transaksi</h4>
                </div>
                <div class="card-body">
                    <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="table-responsive m-t-40">
                <table id="chiefstore" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
                    width="100%">
                    <!-- <thead>   <tr> <th colspan="2"><p align="center">Saldo Awal</p></th> <th colspan="3"><p align="center">8</p></th></tr> -->
                        <tr>
                        
                            <th>No</th>
                            <th>Pembuat (Tanggal)</th>
                            <th>Masuk</th>
                            <th>Keluar</th>
                           <th>Aksi</th>
                        </tr>
                      
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                               <td>{{ $loop->iteration }} </td>
                                <td>{{ $item->created }} ({{ $item->tanggal_masuk }})</td>
                                <td>{{ $item->masuk }}</td>
                                <td>{{ $item->keluar }}</td>
                            
                                <td>
                                <button type="button" class="btn btn-danger" onclick="hapus({{$item->created}});" data-id="{{$item->created}}">
                    Hapus
                   </button></td>
                                </tr>
                            </tr>
                        @endforeach
                        <!-- <td colspan="2"><p align="center">Saldo Akhir</p></td> <td colspan="3"><p align="center">8</p></td></tr> -->
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
            @push('myjs')
        <script>
                    function buat(IDstock,product_id,id,default_code,productionlot,nama,uom,kat) 
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
          kat:kat
          
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
            
        </script>
    @endpush
@endsection

    

            