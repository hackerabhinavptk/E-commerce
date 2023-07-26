<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>

        <div class="row">
            @foreach ($products as $key => $val)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                @if ($val->title != null)
                                    <a href="{{url('product_details',$val->id)}}" class="option1">
                                        
                                       Product Details
                                    </a>
                                @endif

                                <form method="post" action="{{ URL('add_cart',$val->id) }}">
                                    <div class="row">
                                       @csrf
                                       <div class="col-md-4">
                     
                                          <input type="number" min=1 value="1" class="form-control" name="quantity" style="width:100px"/>
                                       </div>
                                       <div class="col-md-4">
                                          <input type="submit" value="Add To Cart"/>
                                       </div>
                                    </div>
                                 </form>

                                <a href="" class="option2">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                        @if ($val->image != null)
                            <div class="img-box">
                                <img src="<?php echo url('images/' . $val->image); ?>">
                                {{-- <img src="home/famms-1.0.0/images/p1.png" alt=""> --}}
                            </div>
                        @endif
                        <div class="detail-box">
                            @if ($val->title != null)
                                <h5>
                                    {{ $val->title }}
                                </h5>
                            @endif

                            @if ($val->price != null)
                                <h6 style="color:blue">
                                    {{ $val->price }}
                                </h6>
                            @endif
                            @if ($val->discount_price != null)
                            <h6 style="color:red">
                                {{ $val->discount_price }}
                            </h6>
                        @endif
                        </div>
                        
                         
                       

                    </div>
                </div>
            @endforeach
        </div>
        <div class="pagination" style="margin-top:45px;padding-top:20px;text-align:center;display:flex;justify-content:center;align-items:center">
            {{ $products->links('pagination::bootstrap-4') }}
        </div>
       
    </div>
</section>
     