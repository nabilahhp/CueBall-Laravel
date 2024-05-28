<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Order Product</title>
    <!-- Include CSS -->
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
                    <h1 class="h3 mb-2 text-gray-800">Add Order Product</h1>
                    <p class="mb-4">User-friendly platform designed for quick and accurate entry of new product orders in your store.</p>
                    
                    <!-- Form -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex align-items-center justify-content-between">
                        </div>
                        <div class="card-body">
                            <form action="{{ url('uploadorderproduct') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label for="customer_name">Customer Name</label>
                                    <input type="text" id="customer_name" name="customer_name" class="form-control bg-light border-0 small" placeholder="Add customer name" required>
                                </div>
                                <div class="mb-4">
                                    <label for="product_name">Product Name</label>
                                    <select id="product_name" name="product_name" class="form-control bg-light border-0 small" required>
                                        <option value="">Select a Product</option>
                                        @foreach ($product as $products)
                                        <option value="{{ $products->title }}">{{ $products->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="category">Category</label>
                                    <select id="category" name="category" class="form-control bg-light border-0 small" required>
                                        <option value="">Select a Category</option>
                                        @foreach ($category as $category)
                                        <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" id="quantity" name="quantity" class="form-control bg-light border-0 small" placeholder="Add quantity" required>
                                </div>
                                <div class="mb-4">
                                    <label for="price">Total</label>
                                    <input type="text" id="price" name="price" class="form-control bg-light border-0 small" placeholder="Add total price" required>
                                </div>
                                <div class="mb-4">
                                    <label for="price">Payment Method</label>
                                    <input type="text" id="payment_method" name="payment_method" class="form-control bg-light border-0 small" placeholder="Add payment menthod" required>
                                </div>
                                <div class="mb-4">
                                    <label>Payment Proof</label>
                                    <input type="file" name="payment_proof" class="form-control bg-light border-0 small">
                                </div>
                                <div class="mb-4">
                                    <label>Status</label>
                                    <select name="status" class="form-control bg-light border-0 small" required>
                                        <option value="Pending">Pending</option>
                                        <option value="Confirmed">Confirmed</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Cancelled" >Cancelled</option>
                                        <option value="On Progress"> On Progress</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <button class="btn btn-primary" type="submit">Add Order Product</button>
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
                        <span>Copyright &copy; Basecamp Billiard {{ date('Y') }}</span>
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

    <!-- Include Scripts -->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('admincss/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</body>

</html>
