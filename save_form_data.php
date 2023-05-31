<?php
// Retrieve the form data from the POST request
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$design = $_POST['design'];

// Validate and sanitize the data as needed

// Connect to the PostgreSQL database
$host = 'localhost';
$port = '5432';
$username = 'jasaim';
$password = 'jasaim7182';
$database = 'form_data';

$conn = pg_connect("host=$host port=$port dbname=$database user=$username password=$password");

// Check for any connection errors
if (!$conn) {
    die('Connection failed: ' . pg_last_error());
}

// Prepare the SQL statement to insert the form data into the table
$query = "INSERT INTO form_data (full_name, email, design) VALUES ($1, $2, $3)";
$params = array($fullName, $email, $design);

// Execute the SQL statement
$result = pg_query_params($conn, $query, $params);

if ($result) {
    // Data inserted successfully
    echo 'Form data saved successfully.';
} else {
    // Error occurred while inserting data
    echo 'Error: ' . pg_last_error($conn);
}

// Close the database connection
pg_close($conn);
?>