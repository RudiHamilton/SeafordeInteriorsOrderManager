<x-layout>
    <h1>Edit Product</h1>
    <form method="POST" action="{{ route('updateproduct',$product->product_id) }}">
        @csrf
        @method('PUT')
        <label class="form-label" for="product_name">Product name:</label><br>
        <input class="form-input" type="text" id="product_name" name="product_name" placeholder="Enter Product Name" required /><br>
        <br>
        <label class="form-label" for="product_price">Product price:</label><br>
        <input class="form-input" type="integer" id="product_price" name="product_price" placeholder="Enter Product Price" required /><br>
        <br>
        <label class="form-label" for="product_cost_to_make">Product Cost to Make:</label><br>
        <input class="form-input" type="integer" id="product_cost_to_make" name="product_cost_to_make" placeholder="Enter Cost to Make" required /><br>
        <br>
        <label class="form-label" for="product_current_stock">Customer current stock:</label><br>
        <input class="form-input" type="integer" id="product_current_stock" name="product_current_stock" placeholder="Enter current stock" required /><br>
        <br>
        <br>
        <button class="btn-submit" type="submit">Submit</button>
    </form>
</x-layout>