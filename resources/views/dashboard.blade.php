@extends('layouts.master')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Dashboard</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Kartu Stok</li>
                </ol>
            </div>
        </div>
    </div>

    @if (Auth::user()->hak_akses == 'Helpdesk')
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round align-self-center round-success"><i class="ti-wallet"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0">{{ $countall }}</h3>
                                <h5 class="text-muted m-b-0">RequestNote</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round align-self-center round-info"><i class="ti-user"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0">{{ $countsolved }}</h3>
                                <h5 class="text-muted m-b-0">Total Solved</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round align-self-center round-danger"><i class="ti-calendar"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0">{{ $countclosed }}</h3>
                                <h5 class="text-muted m-b-0">Total Close</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            {{-- <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round align-self-center round-success"><i class="ti-settings"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h3 class="m-b-0">$34650</h3>
                        <h5 class="text-muted m-b-0">Total</h5></div>
                </div>
            </div>
        </div>
    </div> --}}
            <!-- Column -->
        </div>
        <!-- Row -->





        <div class="card">
            <div class="card-body">
                <strong>Jumlah Percabang</strong>
                <canvas height="100vh" id="myChart"></canvas>
            </div>
        </div>
    @elseif(Auth::user()->hak_akses == 'Chiefstore')
        <div class="card">
            <div class="card-body">
                <strong>Jumlah Percabang</strong>
                <canvas id="barChart"></canvas>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">

                    <div class="card-body">
                        <strong>Diagram Penyebab</strong>
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <strong>Diagram Akibat </strong>
                        <canvas id="pieChart2"></canvas>
                    </div>
                </div>
            </div>
        </div>
    @endif



    @if (session('pesan'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session('pesan') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
@endsection
