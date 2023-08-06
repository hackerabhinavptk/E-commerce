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

    <style>
             body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
       
        .comment-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
        }

        .comment {
            display: flex;
            align-items: flex-start;
            justify-content: space-between; 
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .comment-content {
            flex: 1;
        }

        .comment b {
            font-size: 16px;
            color: #007bff;
            margin-bottom: 5px;
        }

        .comment p {
            font-size: 14px;
            margin-top: 0;
            color: #333;
        }

        .reply-btn {
            display: inline-block;
            padding: 6px 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 12px;
            transition: background-color 0.3s ease;
        }

        .reply-btn:hover {
            background-color: #0056b3;
        }
    </style>
   

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
    <!-- end why section -->

    <!-- arrival section -->
    @include('home.new_arrival')
    <!-- end arrival section -->

    <!-- product section -->
    @include('home.product')
    <!-- end product section -->

    <!--Comments Section Start Here -->
 

    <h1 style="text-align:center">All Comments</h1>
   
    <div class="comment-container">
        @if(!empty($comments))
      @foreach($comments as $key=>$val)
      <div class="comment">
          <div>
              <div class="user-avatar"></div>
          </div>
          <div class="comment-content">
              <div>
                  <b>{{ $val->name }}</b>
              </div>
              <div>
                  <p>{{ $val->comment }}</p>
              </div>
          </div>
          
          <div>
            
            <p><a data-token="{{ csrf_token() }}" data-comment-id="{{ $val->id }}" class="wcp-comment-reply">Reply</a></p>
            {{-- <button class="wcp-comment-reply">Show Replies</button> --}}
        
          
  
            <div>
               
              
@foreach($val->reply as $value)

 <p>{{$value['reply']}}</p>
@endforeach
        

            </div>
              {{-- <a class="reply-btn">Reply</a> --}}
          </div>
          
      </div>
      
      @endforeach
      <div class="pagination" style="margin-top:45px;padding-top:20px;text-align:center;display:flex;justify-content:center;align-items:center">
        {{ $products->links('pagination::bootstrap-4') }}
    </div>
      @endif
    
  </div>
 
    <!-- Comments Section End Here -->


    <!-- subscribe section -->
    @include('home.subscribe')
    <!-- end subscribe section -->
    <!-- client section -->
    @include('home.client')
    <!-- end client section -->
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
          jQuery(document).ready(function (e) {
    
    jQuery('.wcp-comment-reply').click(function (e) {
        alert('hi');
        let token = jQuery(this).data('token');
            let comment_id = jQuery(this).data('comment-id');
        let html = "<div class='reply-section'>\
            <form method='post' action='/reply/"+comment_id+"'>\
        <input class='reply-textarea' name='reply' placeholder='Enter your reply'/>\
        <input type='hidden' name='comment_id' value='{{$val->id}}' />\
        <input type='hidden' name='_token' value='"+token+"' class='wcp_csrf_token'>\
        <button class='btn btn-primary reply-process'>Reply</button>\
                    <button class='btn btn-danger reply-cancel'>Cancel</button>\
    </form>\
                    </div>";
                    
        let parent_container = jQuery(this).parent().parent();
        jQuery(html).insertAfter(parent_container);
       
    })/

    jQuery(document).on('click', '.reply-cancel', function () {

        jQuery(this).parent().remove();

    })

})


        </script>
    {{-- <script src="home/famms-1.0.0/js/wcp-script.js"></script> --}}
   
    
    <script src="home/famms-1.0.0/js/jquery-3.4.1.min.js"></script>
    
    <!-- popper js -->
    <script src="home/famms-1.0.0/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/famms-1.0.0/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/famms-1.0.0/js/custom.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}
   
</body>

</html>
