<x-layout>
    <h1>Add Customer</h1>
    <div class="inputform">
    <form method="POST" action="{{ route('addcustomer') }}">
        @csrf
        <label class="form-label" for="customer_first_name">Customer First name:</label><br>
        <input class="form-input" type="text" id="customer_first_name" name="customer_first_name" placeholder="Enter Customer First Name" required /><br>
        <br>
        <label class="form-label" for="customer_second_name">Customer Second name:</label><br>
        <input class="form-input" type="text" id="customer_second_name" name="customer_second_name" placeholder="Enter Customer Second Name" required /><br>
        <br>
        <label class="form-label" for="customer_email">Customer Email:</label><br>
        <input class="form-input" type="email" id="customer_email" name="customer_email" placeholder="Enter Customer Email" required /><br>
        <br>
        <label class="form-label" for="customer_phone">Customer Phone Number:</label><br>
        <input class="form-input" type="string" id="customer_phone" name="customer_phone" placeholder="Enter Phone No." required /><br>
        <br>
        <label class="form-label" for="customer_firstline_address">Customer First Line Address:</label><br>
        <input class="form-input" type="text" id="customer_firstline_address" name="customer_firstline_address" placeholder="Enter First Line Address" required /><br>
        <br>
        <label class="form-label" for="customer_secondline_address">Customer Second Line Address (optional):</label><br>
        <input class="form-input" type="text" id="customer_secondline_address" name="customer_secondline_address" placeholder="Enter Second Line Address"/><br>
        <br>
        <label class="form-label" for="customer_postcode">Customer Postcode:</label><br>
        <input class="form-input" type="text" id="customer_postcode" name="customer_postcode" placeholder="Enter Postcode"/><br>
        <br>
        <button class="btn-submit" type="submit">Submit</button>
    </form>
    </div>
</x-layout>