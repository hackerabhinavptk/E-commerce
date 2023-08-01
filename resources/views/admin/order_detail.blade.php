

<html>
<head>

    
    <!------ Include the above in your HEAD tag ---------->
    
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> --}}
<style>
/* heading */

h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

/* table */

table { font-size: 75%; table-layout: fixed; width: 100%; }
table { border-collapse: separate; border-spacing: 2px; }
th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
th, td { border-radius: 0.25em; border-style: solid; }
th { background: #EEE; border-color: #BBB; }
td { border-color: #DDD; }

body { box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 7.5in; }
body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

/* header */

header { margin: 0 0 3em; }
header:after { clear: both; content: ""; display: table; }

header h1 { background: #e40101; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
header address { float: left; font-size: 95%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
article address.norm h4 {
	font-size: 125%;
	font-weight: bold;
}
article address.norm { float: left; font-size: 95%; font-style: normal; font-weight: normal; line-height: 1.25; margin: 0 1em 1em 0; }
header address p { margin: 0 0 0.25em; }
header span, header img { display: block; float: right; }
header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
header img { max-height: 100%; max-width: 100%; }
header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

/* article */

article, article address, table.meta, table.inventory { margin: 0 0 3em; }
article:after { clear: both; content: ""; display: table; }
article h1 { clip: rect(0 0 0 0); position: absolute; }

article address { float: left; font-size: 125%; font-weight: bold; }

/* table meta & balance */

table.meta, table.balance { float: right; width: 36%; }
table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

/* table meta */

table.meta th { width: 40%; }
table.meta td { width: 60%; }

/* table items */

table.inventory { clear: both; width: 100%; }
table.inventory th:first-child {
	width:50px;
}
table.inventory th:nth-child(2) {
	width:300px;
}
table.inventory th { font-weight: bold; text-align: center; }

table.inventory td:nth-child(1) { width: 26%; }
table.inventory td:nth-child(2) { width: 38%; }
table.inventory td:nth-child(3) { text-align: right; width: 12%; }
table.inventory td:nth-child(4) { text-align: right; width: 12%; }
table.inventory td:nth-child(5) { text-align: right; width: 12%; }

/* table balance */

table.balance th, table.balance td { width: 50%; }
table.balance td { text-align: right; }

/* aside */

aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
aside h1 { border-color: #999; border-bottom-style: solid; }

table.sign {
	float: left;
	width: 220px;
}
table.sign img {
	width: 100%;
}
table.sign tr td {
	border-color: transparent;
}
@media print {
	* { -webkit-print-color-adjust: exact; }
	html { background: none; padding: 0; }
	body { box-shadow: none; margin: 0; }
	span:empty { display: none; }
	.add, .cut { display: none; }
}

@page { margin: 0; }
    </style>
</head>


<body>

    
		<header>
			<h1>Invoice</h1>
			<address >
				<p> {{$order->email}} </p>
				<p> 45189, Research Place, Suite 150A </p>
				<p>{{$order->address}}<br>
			    <p>{{$order->phone}}</p>
			</address>
			
		</header>
		<article>
			<h1>Recipient</h1>
			<address class="norm">
				<h4>{{$order->name}}</h4>
				<p> {{$order->email}} <br>
				<p> 1613 bethany church road,belton,South <br>
				<p>{{$order->address}}<br>
				<p>{{$order->phone}}</p>
			</address>
			
			<table class="meta">
				<tr>
					<th><span >Invoice #</span></th>
					<td><span >{{$order->id}}</span></td>
				</tr>
				<tr>
					<th><span >Date</span></th>
					<td><span >{{$order->updated_at}}</span></td>
				</tr>
				<tr>
					<th><span >Amount paid</span></th>
					<td><span id="prefix" >$</span><span>{{$order->amount}}</span></td>
				</tr>
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span >S. No</span></th>
						<th><span >Description</span></th>
						<th><span >Qty</span></th>
						<th><span >Rate Per Qty</span></th>
						<th><span >Price</span></th>
					</tr>
				</thead>
				<tbody>
					
					<tr>
						
						<td><span >{{$order->id}}</span></td>
						<td><span >Experience Review</span></td>
						<td><span data-prefix>$</span><span >{{$order->name}}</span></td>
						<td><span >{{$order->price}}</span></td>
						<td><span data-prefix>$</span><span>{{$order->price}}</span></td>
					
					</tr>
				</tbody>
			</table>
			<table class="sign">
				<tr>
					<!-- Display the image path -->


					<td><!-- Use asset() helper to generate correct URL -->
						<img src="{{public_path('images/' . $order->image) }}" alt="Order Image" width="100">
						</td>
				</tr>
			</table>

			<table class="balance">
				<tr>
					<th><span >Total</span></th>
					<td><span data-prefix>$</span><span>{{$order->amount}}</span></td>
				</tr>
			</table>
		</article>
		<aside>
			<h1><span >Additional Notes</span></h1>
			<div >
				<p>We offer limited 10 days refund policy and 30 days workmanship warranty on all of our services. For more details, please read our refund policy below.</p>
			</div>
		</aside>



</body>

</html>