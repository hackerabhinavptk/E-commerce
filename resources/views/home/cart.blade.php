
<?php

if (!empty($cart_details)) {
    $sum = [];
    foreach ($cart_details as $key => $value) {
        $sum[] = $value['price'] * $value['quantity'];
    }
}

if (!empty($cart_details)) {
    $totaldiscount = 0;

    foreach ($cart_details as $key => $val) {
        foreach ($products as $value) {
            if ($val->product_id == $value->id) {
                $discount = $value->price - $val->price;
                $totaldiscount = $totaldiscount + $discount;
                
            }

        }
       
    }
    foreach ($cart_details as $key => $val) {
    $totaldiscount=$totaldiscount*$val->quantity;
    }
}

?>

<?php if(!empty($cart_details)&& !empty($products)){?>
<html>

<head>
    <style>
        .center {
            margin: auto;
            width: 50%;
            border: 3px solid green;
            padding: 10px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<?php if($cart_details){ ?>
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">image</th>
                <th scope="col">Remove</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart_details as $key => $val)
                <tr>
                    <th scope="row" style="color: #666666;">{{ $val['name'] }}</th>
                    <td>{{ $val['email'] }}</td>
                    <td>{{ $val['phone'] }}</td>
                    <td>{{ $val['address'] }}</td>
                    <td>{{ $val['product_title'] }}</td>
                    <td>{{ $val['price'] }}</td>
                    <td>{{ $val['quantity'] }}</td>
                    <td><img src="<?php echo url('images/' . $val->image); ?>" width="30"></td>

                    <td>

                        <a href="/delete/{{ $val->id }}" class="btn btn-danger" role="button">Remove</a>
                      

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<?php }?>

    @if($totaldiscount)
    <div class="center">

        <h4>Total Price :<?php
        //             $val=null;
        //             foreach($sum as $key=>$vale){
        // $val=$val+$vale;
        
        //             }
        // echo $val;
        echo array_sum($sum)." "."Rs";
        
        ?></h4>
        <h4><span>Total Discount :</span><?php echo $totaldiscount." "." Rs";  ?><h4>
        <h3>Proceed To Order</h3>
        <a href="cash_order" class="btn btn-default btn-primary">Cash On Delivery</a>
        <a href="payments" class="btn btn-default btn-success">Via Card</a>

    <div>
    @endif

</body>

</html>

<?php }else{ ?>
   

    <div class="alert alert-success">
  <p> Successfully ordered!! </p>
    </div>
  <?php   }  ?>