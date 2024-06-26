<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{ asset('admincss/img/logo.png') }}" alt="Brand Icon" style="width: 40px; height: 40px;">
        </div>
        <div class="sidebar-brand-text mx-3" style="font-size: 15px;">BASECAMP</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('admin/dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data
    </div>

    <!-- Nav Item - Category -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('category')}}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Category</span>
        </a>
    </li>

    <!-- Nav Item - Products -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
            aria-expanded="true" aria-controls="collapseProducts">
            <i class="fas fa-fw fa-briefcase"></i>
            <span>Products</span>
        </a>
        <div id="collapseProducts" class="collapse" aria-labelledby="headingProducts"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Products Category:</h6>
                <a class="collapse-item" href="{{url('table')}}">Billiard Table</a>
                <a class="collapse-item" href="{{url('product')}}">Food & Drink</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Order
    </div>

    <!-- Nav Item - Utilities -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrder"
            aria-expanded="true" aria-controls="collapseOrder">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Orders</span>
        </a>
        <div id="collapseOrder" class="collapse" aria-labelledby="headingOrder"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Order Details:</h6>
                <a class="collapse-item" href="{{url('booking')}}">Billiard Table</a>
                <a class="collapse-item" href="{{url('orderproduct')}}">Food & Drink</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Payment Information
    </div>

    <!-- Nav Item - Utilities -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePayment"
            aria-expanded="true" aria-controls="collapsePayment">
            <i class="fas fa-fw fa-credit-card"></i>
            <span>Payment</span>
        </a>
        <div id="collapsePayment" class="collapse" aria-labelledby="headingPayment"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Payment Details:</h6>
                <a class="collapse-item" href="{{url('bayar')}}">Table Payment</a>
                <a class="collapse-item" href="{{url('bayarmkn')}}">Product Payment</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
       Financial Operations
    </div>

    <!-- Nav Item - Finance -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFinance"
        aria-expanded="true" aria-controls="collapseFinance">
        <i class="fas fa-fw fa-money-bill"></i>
        <span>Finance</span>
    </a>
    <div id="collapseFinance" class="collapse" aria-labelledby="headingFinance"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Financial Details:</h6>
            <a class="collapse-item" href="{{url('income')}}">Income</a>
            <a class="collapse-item" href="{{url('expenses')}}">Expenses</a>
        </div>
    </div>
</li>



    

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    <div class="sidebar-heading">
        Users
    </div>

    <!-- Nav Item - User -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('user')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Admin</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{url('customer')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>Customer</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
