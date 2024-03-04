<?php
// Everything works, but it seems as though the limit for users posting is 100. 
//Its giving id 101, but it cannot be called


// URL to send the POST request to
$url = "https://jsonplaceholder.typicode.com/posts";

// Data to be sent in the request body
$data = array(
    'userId' => 1,
    'title' => 'CLP test',
    'body' => 'Reeeeeee pee pee poo poo code'
);

// Initialize cURL session
$curl = curl_init();

// Set cURL options
curl_setopt($curl, CURLOPT_URL, $url); // Set the URL
curl_setopt($curl, CURLOPT_POST, true); // Set to POST method
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data)); // Set the POST data
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Return response as a string
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
    echo "Response:<br>";
    echo "ID of the new post: " . $data['id'] . "<br>";
}

// Close cURL session
curl_close($curl);
?>
