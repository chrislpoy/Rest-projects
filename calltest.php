<?php
// URL to send the GET request to
$url = "https://jsonplaceholder.typicode.com/posts/100";

// Initialize cURL session
$curl = curl_init();

// Set cURL options
curl_setopt($curl, CURLOPT_URL, $url); // Set the URL
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Return response as a string
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // Follow redirects, if any
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL certificate verification

// Execute cURL session and store the response
$response = curl_exec($curl);

// Check if cURL request was successful
if ($response === false) {
    $error = curl_error($curl);
    echo "cURL Error: " . $error;
} else {
    // Decode the JSON response
    $data = json_decode($response, true);
    
    // Display the response
    echo "Response: \n";
    echo "User ID: " . $data['userId'] ."\n";
    echo "Title: " . $data['title'] . "\n";
    echo "Body: " . $data['body'] . "\n";
}

// Close cURL session
curl_close($curl);
?>
