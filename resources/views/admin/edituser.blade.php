<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - Admin Panel</title>
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
                    <h1 class="h3 mb-2 text-gray-800">Edit User</h1>
                    <p class="mb-4">The perfect place for you to update and modify user profiles, roles, and permissions seamlessly.</p>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex align-items-center justify-content-between">
                        </div>
                        <div class="card-body">
                            <form action="{{url('updateuser',$data->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label>Table Name</label>
                                    <input type="text" name="name" class="form-control bg-light border-0 small" placeholder="Add user name" value="{{$data->name}}" required>
                                </div>
                                <div class="mb-4">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control bg-light border-0 small" placeholder="Add your email" value="{{$data->email}}" required>
                                </div>
                                <div class="mb-4">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control bg-light border-0 small" placeholder="Add your phone" value="{{$data->phone}}" required>
                                </div>
                                <div class="mb-4">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control bg-light border-0 small" placeholder="Add your address" value="{{$data->address}}" required>
                                </div>
                            <div class="mb-4">
                                <label>Type</label>
                                <select name="usertype" class="form-control bg-light border-0 small" required>
                                    <option value="Admin" {{ $data->usertype == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="User" {{ $data->usertype == 'user' ? 'selected' : '' }}>User</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <button class="btn btn-primary" type="submit">Update User</button>
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
