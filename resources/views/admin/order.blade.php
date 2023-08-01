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
                        <h2 class="h2_font" style="padding-bottom:0px">Orders list</h2>

                        <div style="padding-bottom:20px;padding-top:20px">
                            <form method="post" action="/search">
                                @csrf
                                <input type="text" name="search" value="{{ old('search ') }}" />
                                <button class="btn bth-primary btn-success">Search</button>

                            </form>
                        </div>
                        <table class="table table-dark"
                            style="overflow-x:auto;white-space:nowrap;display:block;width:100%">
                            <tr>

                                <th width="30%">Name</th>

                                <th width="30%">Phone</th>
                                <th width="30%">Address</th>
                                <th width="30%">Quantity</th>
                                <th width="30%">Price</th>

                                <th width="30%">Image</th>
                                <th width="30%">Payment-status</th>
                                <th width="30%">Delivery-status</th>
                                <th width="30%">Action</th>


                            <tr>
                                @foreach ($orders as $key => $value)
                                    <td>{{ $value['name'] }}</td>

                                    <td>{{ $value['phone'] }}</td>
                                    <td>{{ $value['address'] }}</td>
                                    <td>{{ $value['quantity'] }}</td>
                                    <td>{{ $value['price'] }}</td>

                                    <td><img src="<?php echo url('images/' . $value->image); ?>" width="300"></td>
                                    <td>{{ $value['payment_status'] }}</td>
                                    <td>{{ $value['delivery_status'] }}</td>
                                    <?php if($value['payment_status']=='paid' &&  $value['delivery_status']=='delivered' ){ ?>
                                    <td><span style="color:blue"><?php echo 'Delivered'; ?></span><br><br>
                                        <a href="{{ url('/print_pdf', $value->id) }}" role="button"
                                            class="btn btn-primary">Print Pdf</a>
                                    </td>

                                    <?php   }else{ ?>
                                    <td> <a class="btn btn-success"
                                            href="{{ url('/delivered', $value->id) }}">Delivered</a>

                                    </td>
                                    <?php  } ?>

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
