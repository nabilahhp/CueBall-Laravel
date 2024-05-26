<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - Admin Panel</title>
    @include('admin.css')
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        @include('admin.sidebar')
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                @include('admin.topbar')
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Edit Product</h1>
                    <p class="mb-4">Edit product details below.</p>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="{{url('updatebooking',$data->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label>Customer Name</label>
                                    <input type="text" name="customer_name" class="form-control bg-light border-0 small" value="{{$data->customer_name}}">
                                </div>
                                <div class="mb-4">
                                    <label>Table Name</label>
                                    <input type="text" name="table_name" class="form-control bg-light border-0 small" value="{{$data->table_name }}">
                                </div>
                                <div class="mb-4">
                                    <label for="category">Category</label>
                                    <select id="category" name="category" class="form-control bg-light border-0 small" required>
                                        <option value="{{$data->category}}">{{$data->category}}</option>
                                        @foreach($category as $category)
                                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label>Date</label>
                                    <input type="date" name="date" class="form-control bg-light border-0 small" value="{{$data->booking_date}}">
                                </div>
                                <div class="mb-4">
                                    <label>Time</label>
                                    <input type="time" name="time" class="form-control bg-light border-0 small" value="{{$data->booking_time }}}">
                                </div>
                                <div class="mb-4">
                                    <label>Total</label>
                                    <input type="text" name="total" class="form-control bg-light border-0 small" value="{{$data->total_price}}">
                                </div>
                                <div class="mb-4">
                                    <label>Payment Method</label>
                                    <input type="text" name="payment_method" class="form-control bg-light border-0 small" value="{{$data->payment_method}}">
                                </div>
                                <div class="mb-4">
                                    <label>Payment Proof</label>
                                    <img width="150" src="/invoice/{{$data->payment_proof}}">
                                </div>
                                <div class="mb-4">
                                <label>Status</label>
                                <select name="status" class="form-control bg-light border-0 small" required>
                                    <option value="pending" {{ $data->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ $data->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="completed" {{ $data->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $data->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    <option value="payment_confirmation_on_progress" {{ $data->status == 'payment_confirmation_on_progress' ? 'selected' : '' }}>Payment Confirmation on Progress</option>
                                </select>
                            </div>
                                <div class="mb-4">
                                    <button class="btn btn-primary" type="submit">Update Booking</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End of Page Content -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    @include('admin.logout')
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admincss/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admincss/js/sb-admin-2.min.js') }}"></script>
    <!-- Page level plugins -->
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <!-- Page level custom scripts -->
    <script src="{{ asset('admincss/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('admincss/js/demo/chart-pie-demo.js') }}"></script>
</body>

</html>
