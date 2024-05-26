<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" style="width: 40px; height: 40px;">
        </div>
        <div class="sidebar-brand-text mx-3">BILLIARD</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pendapatan') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Pendapatan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pengeluaran') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Pengeluaran</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('datauser') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Data User</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('datacustomer') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Data Customer</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('barang') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Barang</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('orderlist') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Order List</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('kategori') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Kategori</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>