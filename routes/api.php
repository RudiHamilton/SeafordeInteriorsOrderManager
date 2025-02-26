<?php
use Illuminate\Support\Facades\Route;

Route::get('/mapbox-token', function () {
    return response()([
        'accessToken' => config('autocomplete_api_key.AUTOCOMPLETE_API_KEY')
    ]);
});