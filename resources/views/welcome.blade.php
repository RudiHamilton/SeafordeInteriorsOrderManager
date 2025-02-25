<x-layout>
    <h1>Welcome</h1>
    <h3>Welcome to Seaforde Interiors Order Management System!</h3>
    <h5>Here you can manage orders for customers by adding, viewing, updating and deleting records.</h5>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header"><h5>Operations that can be performed</h5></div>
            <div class="card-body"style="text-align:center">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <form action="/usedpages/viewproducts">
                                        <button>View Products</button>
                                    </form>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <form action="/usedpages/viewcustomers">
                                        <button>View Customers</button></h5>
                                    </form>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <form action="/usedpages/vieworders">
                                        <button>View Orders</button></h5>
                                    </form>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <form action="/usedpages/addproduct">
                                        <button>Add Product</button></h5>
                                    </form>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                <form action="/usedpages/addcustomer">
                                    <button>Add Customers</button></h5>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                <form action="/usedpages/createorder">
                                    <button>Add Order</button></h5>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="row-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 style="text-align: center" class="card-title">
                                    <form action="/usedpages/dashboard">
                                        <button>View Dashboard</button>
                                    </form>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-layout>