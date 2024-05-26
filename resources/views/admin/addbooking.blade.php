<!DOCTYPE html>
<html lang="en">

<head>
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
                    <h1 class="h3 mb-2 text-gray-800">Add Booking</h1>
                    <p class="mb-4">Fill in the details below to add a new booking.</p>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex align-items-center justify-content-between">
                            <h5 class="m-0 font-weight-bold text-primary">Add Booking</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{url('uploadbooking')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label>Customer Name</label>
                                    <input type="text" name="customer_name" class="form-control bg-light border-0 small" placeholder="Enter customer name">
                                </div>
                                <div class="mb-4">
                                <label>Table</label>
                                <select id="table" name="table_name" class="form-control bg-light border-0 small" required>
                                    <option value="">Select a Table</option>
                                    @foreach ($table as $tables)
                                        <option value="{{ $tables->name }}" data-price="{{ $tables->price}}">{{ $tables->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                                <div class="mb-4">
                                    <label>Category</label>
                                    <select id="category" name="category" class="form-control bg-light border-0 small" required>
                                        <option value="">Select a Category</option>
                                        @foreach ($category as $category)
                                            <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label>Date</label>
                                    <input type="date" id="bookingDate" name="booking_date" class="form-control bg-light border-0 small" required>
                                </div>
                                <div class="mb-4">
                                    <label>Start Time</label>
                                    <input type="time" id="totalPrice" name="start_time" class="form-control bg-light border-0 small" required>
                                </div>
                                <div class="mb-4">
                                    <label>End Time</label>
                                    <input type="time" id="endTime" name="end_time" class="form-control bg-light border-0 small" required>
                                </div>
                                <div class="mb-4">
                                    <label>Total Price</label>
                                    <input type="text" id="startTime" name="price" class="form-control bg-light border-0 small" placeholder="Enter total price" required>
                                </div>
                                <div class="mb-4">
                                    <label>Payment Method</label>
                                    <input type="text" name="payment_method" class="form-control bg-light border-0 small" placeholder="Enter payment method" required>
                                </div>
                                <div class="mb-4">
                                    <label>Payment Proof</label>
                                    <input type="file" name="payment_proof" class="form-control bg-light border-0 small">
                                </div>
                                <div class="mb-4">
                                    <label>Status</label>
                                    <select name="status" class="form-control bg-light border-0 small" required>
                                        <option value="pending">Pending</option>
                                        <option value="confirmed">Confirmed</option>
                                        <option value="completed">Completed</option>
                                        <option value="cancelled">Cancelled</option>
                                        <option value="payment_confirmation_in_progress">Payment Confirmation in Progress</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <button class="btn btn-primary" type="submit">Add Booking</button>
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

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>



</body>

</html>
