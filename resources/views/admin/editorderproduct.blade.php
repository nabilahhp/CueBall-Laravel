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
                    <h1 class="h3 mb-2 text-gray-800">Edit Order Product</h1>
                    <p class="mb-4">Space to easily update and modify store product orders.</p>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex align-items-center justify-content-between">
                        </div>
                        <div class="card-body">
                            <form action="{{url('updateorderproduct',$data->idpesan)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label>Name</label>
                                    <input type="text" name="nama" class="form-control bg-light border-0 small" value="{{$data->nama}}">
                                </div>
                                <div class="mb-4">
                                    <label>Handphone</label>
                                    <input type="text" name="hp" class="form-control bg-light border-0 small" value="{{$data->hp}}">
                                </div>
                                <div class="mb-4">
                                    <label>Table</label>
                                    <input type="text" name="meja" class="form-control bg-light border-0 small" value="{{$data->meja}}">
                                </div>
                                <div class="mb-4">
                                    <label>Total Products</label>
                                    <input type="text" name="total_products" class="form-control bg-light border-0 small" value="{{$data->total_products}}">
                                </div>
                                <div class="mb-4">
                                    <label>Total Price</label>
                                    <input type="text" name="total_price" class="form-control bg-light border-0 small" value="{{$data->total_price}}">
                                </div>
                                <div class="mb-4">
                                <label>Status</label>
                                <select name="status" class="form-control bg-light border-0 small" required>
                                    <option value="Pending" {{ $data->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Confirmed" {{ $data->status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                                        <option value="Completed" {{ $data->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="Cancelled" {{ $data->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        <option value="On Progress" {{ $data->status == 'On Progress' ? 'selected' : '' }}> On Progress</option>
                                    </select>
                                </select>
                            </div>
                                <div class="mb-4">
                                    <button class="btn btn-primary" type="submit">Update Order Product</button>
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
    
    <!-- Modal -->
    <div class="modal fade" id="paymentProofModal" tabindex="-1" role="dialog" aria-labelledby="paymentProofModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentProofModalLabel">Payment Proof</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img class="img-fluid" src="/invoice/{{$data->payment_proof}}">
                </div>
            </div>
        </div>
    </div>
</body>

</html>
