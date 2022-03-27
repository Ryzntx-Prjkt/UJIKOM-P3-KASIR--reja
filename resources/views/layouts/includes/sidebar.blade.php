<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{asset('mascot.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Nekora Kafe</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('')}}dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link {{(request()->segment(1) == 'home')? 'active' : ''}}">
                        <i class="nav-icon fas fa-fire"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>
                @if (Auth::user()->role == 'admin')

                <li class="nav-header">Data Master</li>
                <li class="nav-item">
                    <a href="{{route('pegawai.index')}}" class="nav-link {{(request()->segment(2) == 'pegawai')? 'active' : ''}}">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Data Pegawai
                        </p>
                    </a>
                </li>
                <li class="nav-header">Laporan</li>
                <li class="nav-item">
                    <a href="{{url('user-activity')}}" class="nav-link {{(request()->segment(1) == 'user-activity')? 'active' : ''}}">
                        <i class="nav-icon fas fa-history"></i>
                        <p>
                            Riwayat Aktifitas
                        </p>
                    </a>
                </li>

                @elseif (Auth::user()->role == 'manajer')

                <li class="nav-header">Data Master</li>
                <li class="nav-item">
                    <a href="{{route('menu.index')}}" class="nav-link {{(request()->segment(2) == 'menu')? 'active' : ''}}">
                        <i class="nav-icon fas fa-apple-alt"></i>
                        <p>
                            Data Menu
                        </p>
                    </a>
                </li>
                <li class="nav-header">Laporan</li>
                <li class="nav-item">
                    <a href="{{route('laporan-transaksi.index')}}" class="nav-link {{(request()->segment(2) == 'laporan-transaksi')? 'active' : ''}}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Data Transaksi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('laporan-pendapatan.index')}}" class="nav-link {{(request()->segment(2) == 'laporan-pendapatan')? 'active' : ''}}">
                        <i class="nav-icon fas fa-money-bill-wave"></i>
                        <p>
                            Data Pendapatan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('user-activity')}}" class="nav-link {{(request()->segment(1) == 'user-activity')? 'active' : ''}}">
                        <i class="nav-icon fas fa-history"></i>
                        <p>
                            Riwayat Aktifitas
                        </p>
                    </a>
                </li>

                @elseif (Auth::user()->role == 'kasir')

                <li class="nav-header">Transaksi</li>
                <li class="nav-item">
                    <a href="{{route('entri-transaksi.index')}}" class="nav-link {{(request()->segment(2) == 'entri-transaksi')? 'active' : ''}}">
                        <i class="nav-icon fas fa-cash-register"></i>
                        <p>
                            Entri Transaksi
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('riwayat-transaksi.index')}}" class="nav-link {{(request()->segment(2) == 'riwayat-transaksi')? 'active' : ''}}">
                        <i class="nav-icon fas fa-history"></i>
                        <p>
                            Riwayat Transaksi
                        </p>
                    </a>
                </li>

                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->


</aside>
{{-- <div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo"
srcset=""></a>
</div>
<div class="toggler">
    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
</div>
</div>
</div>
<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item {{ (request()->segment(1) == 'home') ? 'active' : '' }} ">
            <a href="{{route('home')}}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Beranda</span>
            </a>
        </li>

        @if (Auth::user()->role == 'admin')
        <li class="sidebar-title">Master Data</li>

        <li class="sidebar-item {{ (request()->segment(2) == 'pegawai') ? 'active' : '' }}">
            <a href="{{route('pegawai.index')}}" class='sidebar-link'>
                <i class="fa fa-user-alt"></i>
                <span>Data Pegawai</span>
            </a>
        </li>

        <li class="sidebar-title">Laporan</li>

        <li class="sidebar-item ">
            <a href="/user-activity" class='sidebar-link'>
                <i class="fa fa-history"></i>
                <span>Riwayat Aktifitas</span>
            </a>
        </li>

        @elseif(Auth::user()->role == 'manajer')
        <li class="sidebar-title">Master Data</li>

        <li class="sidebar-item {{ (request()->segment(2) == 'menu') ? 'active' : '' }}">
            <a href="{{route('menu.index')}}" class='sidebar-link'>
                <i class="fa fa-apple-alt"></i>
                <span>Data Menu</span>
            </a>
        </li>

        <li class="sidebar-title">Laporan</li>

        <li class="sidebar-item {{ (request()->segment(2) == 'laporan-transaksi') ? 'active' : '' }}">
            <a href="{{route('laporan-transaksi.index')}}" class='sidebar-link'>
                <i class="fas fa-book"></i>
                <span>Data Transaksi</span>
            </a>
        </li>

        <li class="sidebar-item ">
            <a href="{{route('laporan-pendapatan.index')}}" class='sidebar-link'>
                <i class="fa fa-money-bill-wave"></i>
                <span>Data Pendapatan</span>
            </a>
        </li>

        <li class="sidebar-item ">
            <a href="/user-activity" class='sidebar-link'>
                <i class="fa fa-history"></i>
                <span>Riwayat Aktifitas</span>
            </a>
        </li>

        @elseif(Auth::user()->role == 'kasir')

        <li class="sidebar-title">Transaksi</li>

        <li class="sidebar-item ">
            <a href="{{route('entri-transaksi.index')}}" class='sidebar-link'>
                <i class="fas fa-cash-register"></i>
                <span>Entri Transaksi</span>
            </a>
        </li>

        <li class="sidebar-item ">
            <a href="{{route('riwayat-transaksi.index')}}" class='sidebar-link'>
                <i class="fas fa-history"></i>
                <span>Riwayat Transaksi</span>
            </a>
        </li>

        @endif

    </ul>
</div>
<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
</div> --}}
