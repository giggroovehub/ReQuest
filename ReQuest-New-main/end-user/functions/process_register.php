<?php
// Include database connection file
require_once 'config.php'; // Adjust path if necessary

// Set the response header to JSON
header('Content-Type: application/json');

// Get POST data from the form
$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$confirm_password = $_POST['cpassword']; // For confirm password field
$remember_me = isset($_POST['remember']) ? 1 : 0; // Checkbox value, default to 0 if not checked

// Initialize response
$response = array('success' => false, 'message' => '');

// Basic validation (could be expanded)
if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
    $response['message'] = 'All fields are required.';
    echo json_encode($response);
    exit();
}

// Check if passwords match
if ($password !== $confirm_password) {
    $response['message'] = 'Passwords do not match.';
    echo json_encode($response);
    exit();
}

// Check if the email already exists in the database
$sql_check_email = "SELECT * FROM end_users WHERE email = :email";
$stmt = $pdo->prepare($sql_check_email);
$stmt->execute(['email' => $email]);

if ($stmt->rowCount() > 0) {
    $response['message'] = 'Email already exists.';
    echo json_encode($response);
    exit();
}

// Hash the password using bcrypt
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Prepare SQL to insert the new user into the database
$sql_insert = "INSERT INTO end_users (first_name, last_name, email, password, remember_me) 
               VALUES (:first_name, :last_name, :email, :password, :remember_me)";
$stmt = $pdo->prepare($sql_insert);

// Execute the query with user data
try {
    $stmt->execute([
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'password' => $hashed_password,
        'remember_me' => $remember_me
    ]);
    
    // If the insert is successful, return success response
    $response['success'] = true;
    $response['message'] = 'User registered successfully!';
    
} catch (PDOException $e) {
    // If there's an error with the query, return an error response
    $response['message'] = 'Database error: ' . $e->getMessage();
}

// Return the response as JSON
echo json_encode($response);
?>
