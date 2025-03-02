<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Autofill suggestions</title>
<!-- Default styling. Feel free to remove! -->
<link href="https://api.mapbox.com/mapbox-assembly/v1.3.0/assembly.min.css" rel="stylesheet">
<script id="search-js" defer="" src="https://api.mapbox.com/search-js/v1.0.0/web.js"></script>
</head>
<body>
<form class="prose flex flex--column">
    <h3>Shipping</h3>
    <input class="input mb12" name="address" autocomplete="shipping address-line1" placeholder="Address">
    <input class="input mb12" name="apartment" autocomplete="shipping address-line2" placeholder="Apartment">
    <div class="flex">
        <input class="input mb12" name="city" autocomplete="shipping address-level2" placeholder="City">
        <input class="input mb12 ml6" name="state" autocomplete="shipping address-level1" placeholder="State">
        <input class="input mb12 ml6" autocomplete="shipping postal-code" placeholder="ZIP / Postcode">
    </div>

    <h3>Billing</h3>
    <input class="input mb12" name="address" autocomplete="billing address-line1" placeholder="Address">
    <input class="input mb12" name="apartment" autocomplete="billing address-line2" placeholder="Apartment">
    <div class="flex">
        <input class="input mb12" name="city" autocomplete="billing address-level2" placeholder="City">
        <input class="input mb12 ml6" name="state" autocomplete="billing address-level1" placeholder="State">
        <input class="input mb12 ml6" name="postcode" autocomplete="billing postal-code" placeholder="ZIP / Postcode">
    </div>
</form>
<script>

const ACCESS_TOKEN = 'pk.eyJ1IjoicnVkaWhhbWlsdG9uIiwiYSI6ImNtN2trdmc5azAxeGwyd3F4dWdob2d6YWcifQ.A7Yf1gfZ7U--PCTQBewAJg';
window.addEventListener('load', () => {

    const collection = mapboxsearch.autofill({
        accessToken: ACCESS_TOKEN
    });
});
</script>

</body>
</html>