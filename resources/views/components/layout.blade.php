<html lang="en">
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <ul>
        <li><h1><a href="/">Seaforde Interiors Order Management System</a></h1></li>
        <li><a href="/usedpages/viewproducts">View Products Table</a></li>
        <li><a href="/usedpages/viewcustomers">View Customers Table</a></li>
        <li><a href="/usedpages/vieworders">View Orders Table</a></li>
        <li><a href="/usedpages/addproduct">Add Product</a></li>
        <li><a href="/usedpages/addcustomer">Add Customer</a></li>
        <li><a href="/usedpages/createorder">Create Order</a></li>
        <li><a href="/usedpages/dashboard">Dashboard</a></li>
    </ul>
    <main>
        {{$slot}}
    </main>
</body>
</html>