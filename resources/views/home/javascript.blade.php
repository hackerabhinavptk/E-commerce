<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="home/images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <!-- slider section -->
        @include('home.slider')
        <!-- end slider section -->
    </div>
    <!-- why section -->
    @include('home.why')
    </section>
    <!-- end why section -->

    <!-- arrival section -->
    @include('home.new_arrival')
    <!-- end arrival section -->

    <!-- product section -->
    @include('home.product')
    <!-- end product section -->
    <!--Comments Section Start Here -->
    <style>
    body {
        background-color: #eee;

    }

    .bdge {
        height: 21px;
        background-color: orange;
        color: #fff;
        font-size: 11px;
        padding: 8px;
        border-radius: 4px;
        line-height: 3px;
    }

    .comments {
        text-decoration: underline;
        text-underline-position: under;
        cursor: pointer;
    }

    .dot {
        height: 7px;
        width: 7px;
        margin-top: 3px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
    }

    .hit-voting:hover {
        color: blue;
    }

    .hit-voting {
        cursor: pointer;
    }
    </style>
    <!-- <h1 style="text-align:center;padding-top:20px;padding-bottom:20px">Comment Section</h1> -->
    <div class="heading_container heading_center">
        <h2>
            Comment <span>Section</span>
        </h2>
    </div>
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="d-flex flex-column col-md-8">
                <div class="d-flex flex-row align-items-center text-left comment-top p-2 bg-white border-bottom px-4">


                    <div class="d-flex flex-column ml-3">


                        <div class="coment-bottom bg-white p-2 px-4">
                            <div class="d-flex flex-row add-comment-section mt-4 mb-4">
                                <form action="add_comment" method="POST">
                                    <input type="text" name="comment" class="form-control mr-3"
                                        placeholder="Add comment">
                                    <button type="submit" class="btn btn-primary">Comment</button>
                                    @csrf
                                </form>

                            </div>
                            @if($message=session('message'))
                            <div class="alert alert-success">
                                <p class="text-center">{{$message}}</p>
                            </div>
                            @endif
                            @foreach($comment as $value)
                            <div class="commented-section mt-2">
                                <div class="d-flex flex-row align-items-center commented-user">

                                    <h5 style="color:blue" class="mr-2">{{$value->name}}</h5><span
                                        class="dot mb-1"></span><span class="mb-1 ml-2">{{$value->created_at}} Hours
                                        ago</span>
                                </div>
                                <div class="comment-text-sm"><span>{{$value->comment}}</span>
                                </div>
                                <div class="reply-section">
                                    <!-- <div class="d-flex flex-row align-items-center voting-icons">
                                        <a href="" class="ml-2 mt-1">Show Replies</a>

                                    </div> -->
                                    <div style="padding-bottom:20px;padding-left:3%">
                                        @foreach($value->getReplies as $value2)
                                       
                                        <!-- <div>
                                            <b>{{$value2->name}}</b>
                                            <p>{{$value2->reply}}</p>

                                        </div> -->
                                        <div class="col-md-12">

                                            <div class="wcp-comment">

                                                <p><span class="wcp-user-name"></span>
                                                </p>
                                                <b>{{$value2->name}}</b>
                                                <p>{{$value2->reply}}</p>
                                                <p><a data-token="{{ csrf_token() }}" data-comment-id="{{ $value2->id }}" class="wcp-comment-reply">Reply</a></p>
                                                
                                            </div>


                                        </div>
                                        @endforeach()



                                    </div>
                                    <div class="panel-body">
                                        <!-- <form method="POST" action="{{URL('add_reply',$value->id)}}">
                                            <input type="text" name="reply" class="form-control mr-3"
                                                placeholder="Reply..."> -->
                                            <!-- <text class="form-control" placeholder="Reply..." rows="3"></text> -->

                                            <!-- <input type="hidden" name="comment_id" value="{{$value->id}}"> -->
                                            <!-- <button type="submit" class="btn btn-info pull-right">Post</button> -->
                                         
                                        </form>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Comments Section End Here  -->

    <!-- subscribe section -->
    @include('home.subscribe')
    <!-- end subscribe section -->
    <!-- client section -->
    @include('home.client')
    <!-- end client section -->
    <!-- footer start -->
    @include('home.footer')
    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html
                Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
    $(document).ready(function() {
        $('.wcp-comment-reply').click(function() {

            let token = jQuery(this).data('token');
            let comment_id = jQuery(this).data('comment-id');
            let html = "<div class='reply-section'>\
                        <form method='post' action='add_reply/"+comment_id+"'>\
                        <input type='hidden' name='_token' value='"+token+"' class='wcp_csrf_token'>\
                        <textarea name='reply' class='form-control reply-area'></textarea>\
                        <br/>\
                        <button type='submit' class='btn btn-primary reply-process'>Reply</button>\
                        <button class='btn btn-danger reply-cancel'>Cancel</button>\
                        </form>\
                     </div>";
            let parent_container = $(this).parent().parent();
            $(html).insertAfter(parent_container);
        });

        $(document).on('click', '.reply-cancel', function() {
            $(this).parent().remove();
        });

        // You can add more event handlers here if needed.
    });
    </script>



    <!-- jQery -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/js/custom.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>

</html>