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
                        <h2 class="h2_font">Edit Product</h2>

                        <form action="/products_edit" method="POST" enctype="multipart/form-data">


                            <input type="text" class="input_color" value="{{ $details['title'] }}" name="title"
                                aria-describedby="emailHelp" placeholder="title"><br><br>
                            <input type="text" class="input_color" value="{{ $details['description'] }}"
                                name="description" aria-describedby="emailHelp" placeholder="description"><br><br>


                            <select name="category" id="cars">
                                @if ($details)
                                    <option value="{{ $details['id'] }}" selected>{{ $details['category'] }}</option>
                                @endif

                                @foreach ($category as $value)
                                    <option value="{{ $value['id'] }}">{{ $value['category_name'] }}</option>
                                @endforeach
                            </select>

                            <input type="text" class="input_color" value="{{ $details['quantity'] }}"
                                name="quantity" aria-describedby="emailHelp" placeholder="quantity"><br><br>
                            <input type="text" class="input_color" value="{{ $details['price'] }}" name="price"
                                aria-describedby="emailHelp" placeholder="price"><br><br>
                            <input type="text" class="input_color" value="{{ $details['discount_price'] }}"

                                name="discount_price" aria-describedby="emailHelp" placeholder="discount_price"><br><br>

                            <img src="<?php echo url('images/' . $details->image); ?>" width="300"></td>

                            <input type="file" class="input_color"  name="image"
                                aria-describedby="emailHelp" placeholder="image"><br><br>
                            <input type="hidden" name="image" value="{{ $details->image }}">

                            <input type="hidden" value="{{ $details['id'] }}" name="id">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>



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
