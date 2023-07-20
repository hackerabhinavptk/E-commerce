<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .input_color {
            color column: black;
        }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    @include('admin.css')
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/template/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/template/assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.header')
            <!-- partial -->

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="div_center">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('Error') }}
                            </div>
                        @endif


                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('data_dlt'))
                            <div class="alert alert-success">
                                {{ session('data_dlt') }}
                            </div>
                        @endif
                        @if ($errors->any())

                            <div class="alert alert-danger">

                                @foreach ($errors->all() as $key => $value)
                                    <p class="text-align-center">{{ $value }}</p>
                                @endforeach
                            </div>

                        @endif
                        <h2 class="h2_font">Product list</h2>

                        <table class="table table-dark">
                            <tr>
                                <th width="30%">Title</th>
                                <th width="30%">Description</th>
                                <th width="30%">Category</th>
                                <th width="30%">Quantity</th>
                                <th width="30%">Price</th>
                                <th width="30%">Discount_price</th>
                                <th width="30%">Image</th>
                                <th width="30%">Action</th>
                              

                            <tr>
                                @foreach ($list as $key => $value)
                                    <td>{{ $value['title'] }}</td>
                                    <td>{{ $value['description'] }}</td>
                                    <td>{{ $value['category'] }}</td>
                                    <td>{{ $value['quantity'] }}</td>
                                    <td>{{ $value['price'] }}</td>
                                    <td>{{ $value['discount_price'] }}</td>
                                    <td><img src="<?php echo url('images/' . $value->image); ?>" width="300"></td>
                                    <td><a onclick="return confirm('Are you sure to delete this record!')"
                                        class="btn btn-danger"
                                        href="{{ url('product_delete', $value->id) }}">Delete</a>

                                        <a onclick="return confirm('Are you sure to edit this record!')"
                                        class="btn btn"
                                        href="{{ url('/', $value->id) }}">Edit</a>
                                </td>
                                    
                            </tr>
                            @endforeach
                        </table>

                    </div>

                    
                </div>
            </div>

            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            @include('admin.footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
</body>

</html>