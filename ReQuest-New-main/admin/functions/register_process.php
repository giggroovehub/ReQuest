<?php
// Include the database configuration file
require 'config.php';

// Set the response header to JSON
header('Content-Type: application/json');

$response = [
    'success' => false,
    'message' => 'An error occurred. Please try again.',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $firstName = trim($_POST['first_name'] ?? '');
    $lastName = trim($_POST['last_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['cpassword'] ?? '';

    // Validate required fields
    if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($confirmPassword)) {
        $response['message'] = 'All fields are required.';
        echo json_encode($response);
        exit;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['message'] = 'Invalid email address.';
        echo json_encode($response);
        exit;
    }

    // Check if passwords match
    if ($password !== $confirmPassword) {
        $response['message'] = 'Passwords do not match.';
        echo json_encode($response);
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    try {
        // Prepare and execute the SQL query
        $sql = "INSERT INTO admin_users (first_name, last_name, email, password) 
                VALUES (:first_name, :last_name, :email, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':first_name' => $firstName,
            ':last_name' => $lastName,
            ':email' => $email,
            ':password' => $hashedPassword,
        ]);

        // Check if the insert was successful
        if ($stmt->rowCount()) {
            $response['success'] = true;
            $response['message'] = 'Registration successful!';
        } else {
            $response['message'] = 'Failed to register. Please try again.';
        }
    } catch (PDOException $e) {
        // Handle duplicate email error
        if ($e->getCode() === '23000') { // Integrity constraint violation (e.g., unique email)
            $response['message'] = 'This email address is already registered.';
        } else {
            $response['message'] = 'Database error: ' . $e->getMessage();
        }
    }
} else {
    $response['message'] = 'Invalid request method.';
}

// Return the JSON response
echo json_encode($response);
exit;
