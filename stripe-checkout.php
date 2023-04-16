<?php 

// Set your API secret key
$api_key = 'test key';

Set the endpoint URL
$url = 'https://api.stripe.com/v1/tax_rates';

// Set the request headers
$headers = [
    'Authorization: Bearer ' . $api_key,
    'Content-Type: application/x-www-form-urlencoded',
];

// Set the request data
$data = http_build_query([
    'display_name' => 'Sales Tax',
    'description' => 'Sales tax for example state',
    'jurisdiction' => 'IN',
    'percentage' => 18.0,
    'inclusive' => 'false', // set the parameter to a valid boolean value
]);

// Set the cURL options
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// Execute the request
$response = curl_exec($ch);

// Close the cURL session
curl_close($ch);

// Parse the response as JSON
$tax_rate = json_decode($response, true);


echo "<pre>"; print_r($tax_rate);
// die;
////////////////////////////////////////////////////////////////////////
// Set your API secret key

// Set the endpoint URL
$url = 'https://api.stripe.com/v1/checkout/sessions';

// Set the request headers
$headers = [
    'Authorization: Bearer ' . $api_key,
    'Content-Type: application/x-www-form-urlencoded',
];

// Set the request data
$data = http_build_query([
    'line_items' => [[
        'price_data' => [
            'currency' => 'usd',
            'unit_amount' => 2000, // the price in cents
            'product_data' => [
                'name' => 'Example Product',
                'description' => 'This is an example product.',
            ],
            
        ],
        'tax_rates' => ['txr_1MxWgHSA60QYrOUtM75VHKFo'],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => 'https://example.com/success',
    'cancel_url' => 'https://example.com/cancel',
]);

// Set the cURL options
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// Execute the request
$response = curl_exec($ch);

// Close the cURL session
curl_close($ch);

// Parse the response as JSON
$checkout_session = json_decode($response, true);
echo "<pre>"; print_r($checkout_session);
?>