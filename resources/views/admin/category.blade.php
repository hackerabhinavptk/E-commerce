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
                        <h2 class="h2_font">Add category</h2>

                        <form action="add/category" method="POST">


                            <input type="text" class="input_color" name="category_name" aria-describedby="emailHelp"
                                placeholder="Enter catagory">


                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                        <table class="table table-dark">
                            <tr>
                                <th width="30%">Category</th>
                                <th>Action</th>

                            <tr>
                                @foreach ($category_list as $key => $value)
                                    <td>{{ $value['category_name'] }}</td>
                                    <td><a onclick="return confirm('Are you sure to delete this record!')"
                                        class="btn btn-danger"
                                        href="{{ url('category_delete',$value->id) }}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </table>


                        <div class="pagination">
                            {{ $category_list->links()}}
                                  </div>
   
   
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
