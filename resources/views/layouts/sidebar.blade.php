<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                {{-- @if (Auth::user()->hak_akses == 'Chiefstore' || Auth::user()->hak_akses == 'Helpdesk') --}}
                <li> <a class="waves-effect waves-dark" href="{{ route('dashboard.index') }}"><i
                            class="fas fa-users-cog"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                    class="fas fa-users-cog"></i>Master
                            </a>
                            <div class="dropdown-menu">
                                <ul>
                                <li> <a class="waves-effect waves-dark" href="{{ route('lokasi.index') }}"><i
                            class="fas fa-users-cog"></i><span class="hide-menu">Master Lokasi</span></a>
                </li>
                <!-- <li> <a class="waves-effect waves-dark" href="{{ route('report.index') }}"><i
                            class="fas fa-users-cog"></i><span class="hide-menu">Master</span></a>
                </li> -->

                                </ul>
                            </div>
                        </li>
                <li> <a class="waves-effect waves-dark" href="{{ route('adjust.create') }}"><i
                            class="fas fa-users-cog"></i><span class="hide-menu">Adjustment </span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="{{ route('akun.index') }}"><i
                            class="fas fa-users-cog"></i><span class="hide-menu">Racking</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="{{ route('sj.create') }}"><i
                            class="fas fa-users-cog"></i><span class="hide-menu">Surat Jalan</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="{{ route('report.index') }}"><i
                            class="fas fa-users-cog"></i><span class="hide-menu">Report</span></a>
                </li>

                

                

                {{-- @endif --}}
                {{-- @if (Auth::user()->hak_akses == 'User')
                <li> <a class="waves-effect waves-dark" href="{{route('user.index')}}"><i class="fas fa-file-import"></i><span class="hide-menu">Requestnote</span></a>
                </li>
                @elseif(Auth::user()->hak_akses == 'Users')
                <li> <a class="waves-effect waves-dark" href="{{route('user.index')}}"><i class="fas fa-file-import"></i><span class="hide-menu">Requestnote</span></a>
                </li>
                @elseif(Auth::user()->hak_akses == 'Chiefstore')
                <li> <a class="waves-effect waves-dark" href="{{route('chiefstore.index')}}"><i class="icon-speedometer"></i><span class="hide-menu">Requestnote</span></a>
                </li>
                @elseif(Auth::user()->hak_akses == 'Uploader')
                <li> <a class="waves-effect waves-dark" href="{{route('upload.index')}}"><i class="icon-speedometer"></i><span class="hide-menu">Upload</span></a>
                </li>
                @elseif(Auth::user()->hak_akses == 'Downloader')
                <li> <a class="waves-effect waves-dark" href="{{route('download.index')}}"><i class="icon-speedometer"></i><span class="hide-menu">Download</span></a>
                </li>
                @elseif(Auth::user()->hak_akses == 'Helpdesk')
                <li> <a class="waves-effect waves-dark" href="{{route('akun.create')}}"><i class="fas fa-users-cog"></i><span class="hide-menu">Akun</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="{{route('cabang.index')}}"><i class="fas fa-clinic-medical"></i><span class="hide-menu">Cabang</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="{{route('penyebab.index')}}"><i class="fas fa-exclamation-circle"></i><span class="hide-menu">+ Penyebab</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="{{route('akibat.index')}}"><i class="fas fa-exclamation-triangle"></i><span class="hide-menu">+ Akibat</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="{{route('helpdesk.index')}}"><i class="far fa-file"></i><span class="hide-menu">Requestnote</span></a>
                </li>
                @elseif(Auth::user()->hak_akses == 'Developer' )
                <li> <a class="waves-effect waves-dark" href="{{route('developer.index')}}"><i class="far fa-file"></i><span class="hide-menu">Requestnote</span></a>
                </li>
                @elseif(Auth::user()->hak_akses == 'Infra' )
                <li> <a class="waves-effect waves-dark" href="{{route('infra.index')}}"><i class="far fa-file"></i><span class="hide-menu">Requestnote</span></a>
                </li>
                @elseif(Auth::user()->hak_akses == 'RnD' )
                <li> <a class="waves-effect waves-dark" href="{{route('rnd.index')}}"><i class="far fa-file"></i><span class="hide-menu">Requestnote</span></a>
                </li>
                @elseif(Auth::user()->hak_akses == 'Finance' )
                <li> <a class="waves-effect waves-dark" href="{{route('finance.index')}}"><i class="far fa-file"></i><span class="hide-menu">Requestnote</span></a>
                </li>

                @elseif(Auth::user()->hak_akses == 'Supplychain' )
                <li> <a class="waves-effect waves-dark" href="{{route('supplychain.index')}}"><i class="far fa-file"></i><span class="hide-menu">Requestnote</span></a>
                </li>
                @endif



            </ul> --}}
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
