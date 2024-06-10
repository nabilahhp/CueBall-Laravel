<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking - Admin Panel</title>
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
                    <h1 class="h3 mb-2 text-gray-800">Edit Reservation</h1>
                    <p class="mb-4">Convenient platform for you to effortlessly modify and update your store’s billiard table reservations.</p>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex align-items-center justify-content-between">
                        </div>
                        <div class="card-body">
                            <form action="{{ url('updatejamsewa', $jamsewa->id) }}" method="post">
                                @csrf
                                <div class="mb-4">
                                    <label>Date</label>
                                    <input type="text" name="tanggal" class="form-control bg-light border-0 small" value="{{ $jamsewa->tanggal}}">
                                </div>
                                <div class="mb-4">
                                    <label>Time</label>
                                    <input type="text" name="jam" class="form-control bg-light border-0 small" value="{{ $jamsewa->jam}}">
                                </div>
                                <div class="mb-4">
                                    <label>Status</label>
                                    <select name="status" class="form-control bg-light border-0 small" required>
                                        <option value="Pending" {{ $jamsewa->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Confirmed" {{ $jamsewa->status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                                        <option value="Completed" {{ $jamsewa->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="Cancelled" {{ $jamsewa->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        <option value="On Progress" {{ $jamsewa->status == 'On Progress' ? 'selected' : '' }}> On Progress</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <button class="btn btn-primary" type="submit">Update Booking</button>
                                </div>
                            </form>
                        </div>
                    </div>  
                <!-- End of Page Content -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Basecamp Billiard 2024</span>
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
