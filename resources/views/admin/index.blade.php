<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')

    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.3em 1em;
            margin-left: 2px;
            display: inline-block;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            color: #fff;
            background-color: #000;
            border-color: #000;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            color: #fff !important;
            border: 1px #000;color: #fff;
            background-color: #000;
            border-color: #000;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #ffffff !important;
            background: #000;
            border: 1px solid #000;
        }

        
    </style>
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"> Admin Dashboard</h1>
                    </div>
                    
                    <!-- Content Row -->
                    @include('admin.content')

                    <h1 class="h3 mb-2 text-gray-800">Recent Order List</h1>
                    <p class="mb-4">provides a detailed and searchable list of the most recent orders placed within the system.</p>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex align-items-center justify-content-between">
                            <h5 class="m-0 font-weight-bold text-primary">Order List</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="Table" class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Ordered Items</th>
                                            <th>Category</th>
                                            <th>Total</th>
                                            <th>Created</th>
                                            <th>Updated</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Ordered Items</th>
                                            <th>Category</th>
                                            <th>Total</th>
                                            <th>Created</th>
                                            <th>Updated</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($orderlist as $order)
                                        <tr>
                                            <td>{{ $order->customer_name }}</td>
                                            <td>{{ $order->ordered_items }}</td>
                                            <td>{{ $order->category }}</td>
                                            <td>{{ $order->price }}</td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>{{ $order->updated_at }}</td>
                                            <td>{{ $order->status }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript">
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
                title: "Are you sure you want to delete this?",
                text: "This action cannot be undone.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = urlToRedirect;
                }
            });
        }

        $(document).ready(function() {
            function bindModalEvents() {
            $('#editProductModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var id = button.data('id'); // Extract product ID from data-id attribute
                var title = button.data('title'); // Extract product title from data-title attribute
                var description = button.data('description'); // Extract product description
                var price = button.data('price'); // Extract product price
                var quantity = button.data('quantity'); // Extract product quantity
                var category = button.data('category'); // Extract product category

                var modal = $(this);
                modal.find('.modal-body #editProductId').val(id); // Set the value of the hidden product ID input field in the modal
                modal.find('.modal-body #editTitle').val(title); // Set the value of the title input field in the modal
                modal.find('.modal-body #editDescription').val(description); // Set the value of the description input field
                modal.find('.modal-body #editPrice').val(price); // Set the value of the price input field
                modal.find('.modal-body #editQuantity').val(quantity); // Set the value of the quantity input field
                modal.find('.modal-body #editCategory').val(category); // Set the value of the category input field
            });
        }


            var table = $('#Table').DataTable();
            bindModalEvents();

            table.on('draw', function () {
                bindModalEvents(); // Re-bind the event handlers after each draw
            });
        });
    </script>
</body>

</html>
