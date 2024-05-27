<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- Custom CSS -->
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.3em 1em;
            margin-left: 2px;
            display: inline-block;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            color: #fff;
            background-color: #4e73df;
            border-color: #4e73df;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            color: #fff !important;
            border: 1px #4e73df;color: #fff;
            background-color: #4e73df;
            border-color: #4e73df;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #ffffff !important;
            background: #4e73df;
            border: 1px solid #4e73df;
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
                    <h1 class="h3 mb-2 text-gray-800">Order List Food & Drink</h1>
                    <p class="mb-4">Dashboard for overseeing and managing all food and drink orders in your store.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex align-items-center justify-content-between">
                            <h5 class="m-0 font-weight-bold text-primary">Order List Food & Drink Tabel</h5>
                            <a href="{{ url('addorderproduct') }}" class="btn btn-primary">Add Order Product</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="Table" class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Product Title</th>
                                            <th>Category</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Payment Method</th>
                                            <th>Payment Proof</th>
                                            <th>Status</th>
                                            <th>Created</th>
                                            <th>Updated</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Product Title</th>
                                            <th>Category</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Payment Method</th>
                                            <th>Payment Proof</th>
                                            <th>Status</th>
                                            <th>Created</th>
                                            <th>Updated</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($orderproduct as $orderproducts)
                                        <tr>
                                            <td>{{ $orderproducts->customer_name }}</td>
                                            <td>{{ $orderproducts->product_name }}</td>
                                            <td>{{ $orderproducts->category }}</td>
                                            <td>{{ $orderproducts->quantity}}</td>
                                            <td>{{ $orderproducts->price }}</td>
                                            <td>{{ $orderproducts->payment_method}}</td>
                                            <td>
                                                <img height="120" width="120" src="/invoice/{{$orderproducts->payment_proof}}">
                                            </td>

                                            <td>{{ $orderproducts->status}}</td>
                                            <td>{{ $orderproducts->created_at }}</td>
                                            <td>{{ $orderproducts->updated_at }}</td>
                                            <td>
                                                <a href="{{url('editorderproduct', $orderproducts->id)}}" class="btn btn-info btn-circle btn-sm edit-btn">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <a href="{{ url('deleteorderproduct', $orderproducts->id) }}" class="btn btn-danger btn-circle btn-sm" title="Delete" onclick="confirmation(event)">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
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

    <!-- SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
