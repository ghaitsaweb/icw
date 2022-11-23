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
    </div>
<div class="row">
@foreach ($data as $item)
 <div class="col"><div class="card card-custom gutter-b card-stretch">
														<div class="card-header border-0">
															<h3 class="card-title"></h3>
															<div class="card-toolbar">
																<div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left" data-original-title="Quick actions">
																	<a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																		<i class="ki ki-bold-more-hor"></i>
																	</a>
																	<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
																		<!--begin::Navigation-->
																		<ul class="navi navi-hover py-5">
																			<li class="navi-item">
																				<a href="#" class="navi-link">
																					<span class="navi-icon">
																						<i class="flaticon2-drop"></i>
																					</span>
																					<span class="navi-text">New Group</span>
																				</a>
																			</li>
																			<li class="navi-item">
																				<a href="#" class="navi-link">
																					<span class="navi-icon">
																						<i class="flaticon2-list-3"></i>
																					</span>
																					<span class="navi-text">Contacts</span>
																				</a>
																			</li>
																			<li class="navi-item">
																				<a href="#" class="navi-link">
																					<span class="navi-icon">
																						<i class="flaticon2-rocket-1"></i>
																					</span>
																					<span class="navi-text">Groups</span>
																					<span class="navi-link-badge">
																						<span class="label label-light-primary label-inline font-weight-bold">new</span>
																					</span>
																				</a>
																			</li>
																			<li class="navi-item">
																				<a href="#" class="navi-link">
																					<span class="navi-icon">
																						<i class="flaticon2-bell-2"></i>
																					</span>
																					<span class="navi-text">Calls</span>
																				</a>
																			</li>
																			<li class="navi-item">
																				<a href="#" class="navi-link">
																					<span class="navi-icon">
																						<i class="flaticon2-gear"></i>
																					</span>
																					<span class="navi-text">Settings</span>
																				</a>
																			</li>
																			<li class="navi-separator my-3"></li>
																			<li class="navi-item">
																				<a href="#" class="navi-link">
																					<span class="navi-icon">
																						<i class="flaticon2-magnifier-tool"></i>
																					</span>
																					<span class="navi-text">Help</span>
																				</a>
																			</li>
																			<li class="navi-item">
																				<a href="#" class="navi-link">
																					<span class="navi-icon">
																						<i class="flaticon2-bell-2"></i>
																					</span>
																					<span class="navi-text">Privacy</span>
																					<span class="navi-link-badge">
																						<span class="label label-light-danger label-rounded font-weight-bold">5</span>
																					</span>
																				</a>
																			</li>
																		</ul>
																		<!--end::Navigation-->
																	</div>
																</div>
															</div>
														</div>
														<div class="card-body">
															<div class="d-flex flex-column align-items-center">
																<!--begin: Icon-->
																<img alt="" class="max-h-65px" src="assets/media/svg/files/pdf.svg">
																<!--end: Icon-->
																<!--begin: Tite-->
																<a href="{{ url('dashboard/detail2/'.$item->id) }}" class="text-dark-75 font-weight-bold mt-15 font-size-lg">Rak {{$item->det_int_name}}</a>
																<!--end: Tite-->
															</div>
														</div>
													</div></div>
  


@endforeach
</div>


    @push('myjs')
        <script>
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
