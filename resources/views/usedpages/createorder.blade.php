<x-layout>
    <h1>Create Order</h1>

    <form method="POST" action="{{ route('orderstore') }}">
        @csrf
        <label class="form-label" for="product_id">Customer Name:</label>
        <br>
        <select name="customer_id" id="customer">
            @foreach ($customers as $customer)
                <option value="{{ $customer->customer_id }}">
                    {{ $customer->customer_first_name ." ". $customer->customer_second_name }}</option>
            @endforeach
        </select>
        <br>
        <br>
        <label class="form-label" for="product_id">Product:</label>
        <br>
        <select name="product_id" id="product_id">
            @foreach ($products as $product)
                <option value="{{ $product->product_id }}">{{ $product->product_name }}</option>
            @endforeach
        </select>
        <br>
        <br>
        <label class="form-label" for="product_id">Quantity:</label>
        <br>
        <br>
        <div class="quantity-counter">
            <button id="counter-decrement" class="decrement" type="button">-</button>
            <input id="order_quantity" name="order_quantity"class="value" type="number" value="1">
            <button id="counter-increment" class="increment"type="button">+</button>
        </div>
        <br>
        <br>
        <label for="buttons">Payment Choice:</label>
        <br>
        <br>
        <input type="radio" id="order_payment_type" name="order_payment_type" value="Cash">
        <label for="cash">Cash</label>
        <input type="radio" id="order_payment_type" name="order_payment_type" value="Card">
        <label for="card">Card</label>
        <br>
        <br>
        <label for="order_complete">Is this an already completed order?</label>
        <br>
        <br>
        <input type="radio" id="order_complete" name="order_complete" value="1">
        <label for="cash">Yes</label>
        <input type="radio" id="order_complete" name="order_complete" value="0">
        <label for="card">No</label>
        <br>
        <br>
        <button class="btn-submit" type="submit">Submit</button>
    </form>
    <script>
        var counterValue = document.querySelector("#order_quantity");
        var counterIncrement = document.querySelector("#counter-increment");
        var counterDecrement = document.querySelector("#counter-decrement");
        var count = 1;
        counterIncrement.addEventListener('click', () => {
            count++; // Increment count
            counterValue.setAttribute("value", count); // Update the input value
        });

        counterDecrement.addEventListener('click', () => {
            if (count > 1) { // Ensure count does not go below 1
                count--; // Decrement count
                counterValue.setAttribute("value", count);
            }
        });
    </script>
</x-layout>
