<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .info-table{
            border:none;
        }
        .info-table th{
            text-align: left;
            border:none;
            
        }
        .order-info{
            border:1px solid black;
            border-collapse: collapse;
            width:100%;
            margin-top:30px;
        }
        .order-info td, th{
           border:1px solid black;
           text-align: center;
        }

    </style>
</head>
<body>
    <h1 style="text-align:center;">Order Details</h1>
    <table class="info-table">
        <tbody>
            <tr>
                <th>Name</th>
                <th>:</th>
                <th>{{$order->name}}</th>  
            </tr>
            <tr>
                <th>Address</th>
                <th>:</th>
                <th>{{$order->address}}</th>  
            </tr>
            <tr>
                <th>Phone</th>
                <th>:</th>
                <th>{{$order->phone}}</th>  
            </tr>
            <tr>
                <th>Email</th>
                <th>:</th>
                <th>{{$order->email}}</th>  
            </tr>
        </tbody>
        
    </table>

    <table class="order-info">
        <thead>
            <tr>
                <th>Sl No.</th>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Product Quantity</th>
                <th>Price</th>
    
            </tr>
        </thead>
        <tbody>


            <tr>
                <td>1</td>
                <td>{{$order->product_title}}</td>
                <td>{{$order->image}}</td>
                <td>{{$order->quantity}}</td> 
                <td>{{$order->price}}</td>


            </tr>

        </tbody>
    </table>
    
</body>
</html>