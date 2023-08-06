<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/famms-1.0.0/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/famms-1.0.0/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/famms-1.0.0/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/famms-1.0.0/css/responsive.css" rel="stylesheet" />
    <!-- Basic -->

</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <!-- slider section -->
        <table class="table table-bordered">
            <tr>
                <th width="30%">Name</th>
                <th width="30%">Email</th>
                <th width="30%">Phone</th>
                <th width="30%">Address</th>
                <th width="30%">Price</th>
                <th width="30%">Delivery</th>
                <th width="30%">Quantity</th>
                <th width="30%">Image</th>
                <th width="30%">Action</th>


            <tr>
                @foreach ($orders as $key => $value)
                    <td>{{ $value['name'] }}</td>
                    <td>{{ $value['email'] }}</td>
                    <td>{{ $value['phone'] }}</td>
                    <td>{{ $value['address'] }}</td>
                    <td>{{ $value['price'] }}</td>

                    <td>{{ $value['delivery_status'] }}</td>
                    <td>{{ $value['quantity'] }}</td>

                    <td><img src="<?php echo url('images/' . $value->image); ?>" width="40"></td>
                    <?php   if($value['delivery_status']=='delivered' || $value['delivery_status']=='order cancelled'  ){ ?>
                    <td>
                        <p>Not allowed</p>
                    </td>
                    <?php } ?>
                    <?php   if( $value['delivery_status']=='cash on delevery' ){ ?>
                    <td><a class="btn btn-danger" href="{{ url('cancel_order', $value->id) }}">Cancel</a>


                    </td>
                    <?php }?>

            </tr>
            @endforeach
        </table>
        <div class="pagination"
        style="margin-top:45px;padding-top:20px;text-align:center;display:flex;justify-content:center;align-items:center">
        {{ $orders->links('pagination::bootstrap-4') }}
    </div>
        <footer>
            @include('home.footer')
        </footer>
        <!-- footer end -->
        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

            </p>
        </div>
        <!-- jQery -->
        <script src="home/famms-1.0.0/js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="home/famms-1.0.0/js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="home/famms-1.0.0/js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="home/famms-1.0.0/js/custom.js"></script>
</body>

</html>
