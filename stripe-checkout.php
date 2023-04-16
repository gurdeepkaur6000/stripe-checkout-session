<?php 

// Set your API secret key
$api_key = 'sk_test_51MxVmBSA60QYrOUtW5IqfGnXBCF22OvJbgkTNqXT3SyQ0pjw7TXynVx4x90MzqzQvIyw0TpWFbajpvGUimUD2cOw00P9wHTJgq';

// Set your API secret key

// Set the endpoint URL
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
    'jurisdiction' => 'US-CA',
    'percentage' => 7.25,
    'inclusive' => false, // set the parameter to a valid boolean value
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
die;
////////////////////////////////////////////////////////////////////////
// Set your API secret key
$api_key = 'sk_test_51MxVmBSA60QYrOUtW5IqfGnXBCF22OvJbgkTNqXT3SyQ0pjw7TXynVx4x90MzqzQvIyw0TpWFbajpvGUimUD2cOw00P9wHTJgq';

// Set the endpoint URL
$url1 = 'https://api.stripe.com/v1/tax_rates';

// Set the request headers
$headers1 = [
    'Authorization: Bearer ' . $api_key,
    'Content-Type: application/x-www-form-urlencoded',
];

// Set the request data
$data1 = http_build_query([
    'display_name' => 'Sales Tax',
    'description' => 'Sales tax for example state',
    'jurisdiction' => 'US-CA',
    'percentage' => 7.25,
    'inclusive' => boolval(false)
]);

// Set the cURL options
$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_URL, $url1);
curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers1);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch1, CURLOPT_POST, true);
curl_setopt($ch1, CURLOPT_POSTFIELDS, $data1);

// Execute the request
$response1 = curl_exec($ch1);

// Close the cURL session
curl_close($ch1);

// Parse the response as JSON
$tax_rate = json_decode($response1, true);

echo "<pre>"; print_r($tax_rate);
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
            'tax_rates' => [$tax_rate_id],
        ],
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