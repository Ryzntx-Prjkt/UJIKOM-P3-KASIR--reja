<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item d-none d-sm-inline-block">
            <a type="button" class="nav-link logout"><i class="fa fa-sign-out-alt"></i> Keluar</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>

    </ul>
</nav>

{{-- <nav class="navbar navbar-expand navbar-light ">
    <div class="container-fluid">
        <a href="#" class="burger-btn d-block">
            <i class="bi bi-justify fs-3"></i>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            </ul>
            <div class="dropdown">
                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="user-menu d-flex">
                        <div class="user-name text-end me-3">
                            <h6 class="mb-0 text-gray-600">{{Auth::user()->name}}</h6>
<p class="mb-0 text-sm text-gray-600">{{Auth::user()->role}}</p>
</div>
<div class="user-img d-flex align-items-center">
    <div class="avatar avatar-md">
        <img src="{{asset('assets/images/faces/1.jpg')}}">
    </div>
</div>
</div>
</a>
<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem; margin: 5%;">
    <li>
        <h6 class="dropdown-header">Hello, {{Auth::user()->name}}</h6>
    </li>
    <li>
        <hr class="dropdown-divider">
    </li>
    <li><a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); confirm('Yakin ingin keluar dan hapus sesi ini?');
                        document.getElementById('logout-form').submit();"><i
                class="icon-mid bi bi-box-arrow-left me-2"></i>
            Keluar</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
</ul>
</div>
</div>
</div>
</nav> --}}
