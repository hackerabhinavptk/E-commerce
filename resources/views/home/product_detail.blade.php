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
    <link rel="shortcut icon" href="/images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="/home/famms-1.0.0/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="/home/famms-1.0.0/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="/home/famms-1.0.0/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="/home/famms-1.0.0/css/responsive.css" rel="stylesheet" />
    <!-- Basic -->

</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <!-- Product Detail Start Here -->

        <div class="col-sm-4 col-md-4 col-lg-4" style="width:50%;margin:auto;padding:30px">
            <div class="box">

                @if ($detail->image != null)
                    <div class="img-box">
                        <img style="padding:20px" src="<?php echo url('images/' . $detail->image); ?>">
                        {{-- <img src="home/famms-1.0.0/images/p1.png" alt=""> --}}
                    </div>
                @endif
                <div class="detail-box">
                    @if ($detail->title != null)
                        <h5> Detail<br />
                            {{ $detail->title }}
                        </h5>
                    @endif

                    @if ($detail->price != null)
                        <h6 style="color:blue;text-decoration:line-through">Price :<br />
                            {{ $detail->price }}
                        </h6>
                    @endif
                    @if ($detail->discount_price != null)
                        <h6 style="color:red;">Discount Price:<br>
                            {{ $detail->discount_price }}
                        </h6>
                    @endif
                    @if ($category_name['category_name'] != null)
                        <h6 style="color:blueviolet">Category:
                            {{ $category_name['category_name'] }}
                        </h6>
                    @endif
                    @if ($detail->description != null)
                        <h6>Description:
                            {{ $detail->description }}
                        </h6>
                    @endif

                    @if ($detail->quantity != null)
                        <h6 style="color:blueviolet">Quantity:
                            {{ $detail->quantity }}
                        </h6>
                    @endif


                    <form method="post" action="{{ URL('add_cart', $detail->id) }}">

                        <div class="row">
                            @csrf
                            <div class="col-md-4">

                                <input type="number" min=1 value="1" class="form-control" name="quantity"
                                    style="width:100px" />
                            </div>
                            <div class="col-md-4">
                                <input type="submit" value="Add To Cart" />
                            </div>
                        </div>


                    </form>


                </div>




            </div>
        </div>

        <!-- Product Detail End Here -->

        <!-- footer start -->
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
        <script src="/home/famms-1.0.0/js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="/home/famms-1.0.0/js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="/home/famms-1.0.0/js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="/home/famms-1.0.0/js/custom.js"></script>
</body>

</html>
