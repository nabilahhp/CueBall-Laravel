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
                    <p class="mb-4">Updating and modifying the details of your store’s food and drink.</p>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex align-items-center justify-content-between">
                        </div>
                        <div class="card-body">
                            <form action="{{url('updateproduct',$data->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label>Product Title</label>
                                    <input type="text" name="title" class="form-control bg-light border-0 small" value="{{$data->title}}">
                                </div>
                                <div class="mb-4">
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control bg-light border-0 small" value="{{$data->description}}">
                                </div>
                                <div class="mb-4">
                                    <label>Price</label>
                                    <input type="text" name="price" class="form-control bg-light border-0 small" value="{{$data->price}}">
                                </div>
                                <div class="mb-4">
                                    <label>Quantity</label>
                                    <input type="number" name="quantity" class="form-control bg-light border-0 small" value="{{$data->quantity}}">
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
                                    <label>Current Image</label>
                                    <img width="150" src="/products/{{$data->image}}">
                                </div>
                                <div class="mb-4">
                                    <label>New Image</label>
                                    <input type="file" name="image" class="form-control bg-light border-0 small" accept="image/*" placeholder="Upload new image">
                                </div>
                                <div class="mb-4">
                                    <button class="btn btn-primary" type="submit">Update Product</button>
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
</body>

</html>
