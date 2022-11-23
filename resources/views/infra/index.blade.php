@extends('layouts/master')
@section('content')
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                    
                    </ol>

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
    <div class="card">
        <div class="card-body">

            <div class="table-responsive m-t-40">
                <table id="user" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Action</th>
                            <th>NO REQ</th>
                            <th>Status</th>
                            <th>Pelapor</th>
                            <th>No SPK</th>
                            <th>Cabang</th>
                            <th>Penyebab</th>
                            <th>Permintaan</th>
                            <th>Akibat</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($request as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>            
                            <td>
                                @if($item->status == 'waiting infra')
                                <div class="btn-group">
                                    <a href="{{route('infra.prosesinfra',$item->id)}}" class="btn btn-success">Proses</a>
                                </div>

                                <div class="btn-group">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-share-square"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a href="{{route('infra.forwardrnd',$item->id)}}" class="dropdown-item">Rnd</a>
                                            <a href="{{route('infra.forwardfinance',$item->id)}}" class="dropdown-item">finance</a>
                                            <a href="{{route('infra.forwardsupplychain',$item->id)}}" class="dropdown-item">Supplychain</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-group">
                            <button type="button" onclick="run('{{route('infra.rejected',$item->id)}}')" class="btn btn-danger show-modal"><i class="fa fa-times"></i></button>
                                </div>
                                <!--proses infra-->
                                @elseif($item->prosesinfra == Auth::user()->name && $item->status == 'proses infra')
                                <div class="btn-group">
                            <button type="button" onclick="run('{{route('infra.solved',$item->id)}}')" class="btn btn-success show-modal"><i class="fa fa-check"></i></button>
                                </div>
                                    <div class="btn-group">
                                        <a href="{{route('infra.unprosesinfra',$item->id)}}" class="btn btn-success">BatalProses</a>
                                    </div>
                                    <div class="btn-group">
                            <button type="button" onclick="run('{{route('infra.rejected',$item->id)}}')" class="btn btn-danger show-modal"><i class="fa fa-times"></i></button>
                                </div>
                                @elseif($item->status == 'waiting developer')        
                                    <div class="btn-group">
                                        <a href="{{route('rnd.prosesrnd',$item->id)}}" class="btn btn-success">Proses</a>
                                    </div>
                                <div class="btn-group">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-share-square"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a href="{{route('rnd.forwardfinance',$item->id)}}" class="dropdown-item">finance</a>
                                            <a href="{{route('rnd.forwardsupplychain',$item->id)}}" class="dropdown-item">Supplychain</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-group">
                            <button type="button" onclick="run('{{route('rnd.rejected',$item->id)}}')" class="btn btn-danger show-modal"><i class="fa fa-times"></i></button>
                                </div>

                                @elseif($item->prosesrnd == Auth::user()->name && $item->status == 'proses rnd')
                                <div class="btn-group">
                            <button type="button" onclick="run('{{route('rnd.solved',$item->id)}}')" class="btn btn-success show-modal"><i class="fa fa-check"></i></button>
                                </div>
                                
                                <div class="btn-group">
                                    <a href="{{route('rnd.unprosesrnd',$item->id)}}" class="btn btn-success">BatalProses</a>
                                </div>
                                <div class="btn-group">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-share-square"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a href="{{route('rnd.forwardfinance',$item->id)}}" class="dropdown-item">finance</a>
                                            <a href="{{route('rnd.forwardsupplychain',$item->id)}}" class="dropdown-item">Supplychain</a>
                                        </div>
                                    </div>
                                </div>

                                @elseif($item->status == 'waiting finance')
                                <div class="btn-group">
                            <button type="button" onclick="run('{{route('finance.solved',$item->id)}}')" class="btn btn-success show-modal"><i class="fa fa-check"></i></button>
                                </div>
                                    <div class="btn-group">
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-share-square"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a href="{{route('finance.forwardrnd',$item->id)}}" class="dropdown-item">Rnd</a>
                                                <a href="{{route('finance.forwardsupplychain',$item->id)}}" class="dropdown-item">Supplychain</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="btn-group">
                                        <a href="{{route('rnd.rejected',$item->id)}}" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                    </div> -->
                                    @elseif($item->prosesfinance == Auth::user()->name && $item->status == 'proses finance')
                                    <div class="btn-group">
                            <button type="button" onclick="run('{{route('finance.rejected',$item->id)}}')" class="btn btn-success show-modal"><i class="fa fa-check"></i></button>
                                </div>
                                    <div class="btn-group">
                                        <a href="{{route('finance.unprosesfinance',$item->id)}}" class="btn btn-success">BatalProses</a>
                                    </div>
                                    <div class="btn-group">
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-share-square"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a href="{{route('finance.forwardrnd',$item->id)}}" class="dropdown-item">Rnd</a>
                                                <a href="{{route('finance.forwardsupplychain',$item->id)}}" class="dropdown-item">Supplychain</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{route('rnd.rejected',$item->id)}}" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                    </div>
                                    @elseif($item->status == 'waiting supplychain')
                                    <div class="btn-group">
                                        <a href="{{route('supplychain.prosessupply',$item->id)}}" class="btn btn-success">Proses</a>
                                    </div>
                                    <div class="btn-group">
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-share-square"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a href="{{route('supplychain.forwardfinance',$item->id)}}" class="dropdown-item">finance</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="btn-group">
                            <button type="button" onclick="run('{{route('supplychain.rejected',$item->id)}}')" class="btn btn-danger show-modal"><i class="fa fa-times"></i></button>
                                </div>
                                    @elseif($item->prosessupply == Auth::user()->name && $item->status == 'proses supplychain')
                                    <div class="btn-group"> 
                            <button type="button" onclick="run('{{route('supplychain.solved',$item->id)}}')" class="btn btn-danger show-modal"><i class="fa fa-check"></i></button>
                                </div>
                                    <div class="btn-group">
                                        <a href="{{route('supplychain.unprosessupply',$item->id)}}" class="btn btn-success">BatalProses</a>
                                    </div>
                                    <div class="btn-group">
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-share-square"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a href="{{route('supplychain.forwardfinance',$item->id)}}" class="dropdown-item">finance</a>
                                            </div>
                                        </div>
                                    </div>

                                @endif
                            </td>
                            <td>{{$item->no_req}}</td>
                            <td>{{$item->status ." (". $item->updated_at.")"}}</td>
                            <td>{{$item->pelapor}}</td>
                            <td>{{$item->spk}}</td>
                            <td>{{$item->cabang->nama_cabang}}</td>
                            <td>{{$item->penyebab == null ? $item->dll_penyebab : $item->rel_penyebab->penyebab}}</td>
                            <td>{{$item->permintaan}}</td>
                            <td>{{$item->akibat == null ? $item->dll_akibat : $item->rel_akibat->akibat}}</td>                           
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@push('myjs')
<script>
 function run(link){
        $('form#form-solved').attr('action',link);
        $('#myModal').modal('show');
        if(link.indexOf('reject') > -1){
            console.log('true');
            $('.modal-title').text('Isikan Alasan');
            $('.form-group').find('label').html('Alasan');
        }else{
            console.log('false');
            $('.modal-title').text('Isikan Metode');
            $('.form-group').find('label').html('Metode');
        }
    }
$(document).ready(function(){
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
    var count = 0;
    loadcount();


    setInterval(function(){
        $.ajax({
            url : 'getcount',
            success:function(data){
                if(count != data){
                    $jumlah = parseInt(data) - parseInt(count);
                    $('.notify').append('<span class="heartbit"></span> <span class="point"></span>');
                    $('h5#jumlahreq').text($jumlah + ' Request Baru');
                    $('.message-center').show();
                }else{
                    count = data;
                }

            }
        })
    },3000);

    function loadcount(){
        $.ajax({
            url : 'getcount',
            success:function(data){
               count = data;
            }
        })
    }
})
</script>
@endpush
@endsection
